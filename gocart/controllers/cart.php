<?php

class Cart extends Front_Controller {

	function index()
	{
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		$data['homepage']			= true;
		$data['base_url'] = 'homepage';		
		$this->view('homepage', $data);
	}
	
	function change_lang($type){		
		$this->session->set_userdata("lang", $type);
		$this->lang->load('common', $type);
		redirect($_SERVER['HTTP_REFERER']);
	}
	

	private function generate_ticket_no(){
		$ticketNo = '';
		//2k number
		for($i=0; $i< 2000; $i++){
			$has_ticket = false;
			while(!$has_ticket){
				$ticketNo = 'GTM-'. rand(1000,9999) . '-' . rand(1000,9999);
				$db_ticket_no =  $this->Ticket_model->get_ticket($ticketNo);																			
			
				if(empty($db_ticket_no)){
					$has_ticket = true;
				}				
			}
			
			$ticket['id'] = false;
			$ticket['code']	= $ticketNo;
			$ticket['date_add']	= date('Y-m-d H:i:s');
			$this->Ticket_model->save($ticket);									
		}											
	}
	
	function ticket()
	{
		$this->generate_ticket_no();		
		$data['page_title'] = 'Ticket';
		$data['base_url'] = 'ticket';
		$this->view('tickets', $data);
	}
	
	function about()
	{		
		$data['page_title'] = lang('about_us');
		$data['base_url'] = 'about';
		$this->view('about', $data);
	}
	
	function services()
	{		
		$data['base_url'] = 'services';
		$this->view('services', $data);
	}	
	
	function contact()
	{		
		
		$data['page_title'] = lang('contact_us');
		$data['seo_title']	= 'Contact';
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		$submitted 	= $this->input->post('submitted');
		$data['error'] = '';
		$data['base_url'] = 'contact';
		
		if ($submitted){
		
			$this->form_validation->set_rules('name', 'Name', 'required|max_length[100]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_check_email');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
				
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}else{
				$name	  	= $this->input->post('name');
				$email		= $this->input->post('email');
				$subject   	= $this->input->post('subject');
				$message  	= $this->input->post('message');
					
				$this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from($email, $name);				
				$this->email->to($this->config->item('email'));
				$this->email->bcc($this->config->item('email'));
				$this->email->subject($subject);
				$this->email->message(html_entity_decode($message));
				$this->email->send();
		
				$this->session->set_flashdata('message', 'Hi '. $name. '. Thank you! We will response you as soon as possible.');
				redirect(current_url());
			}
		}
		
		$this->view('contact', $data);
	}
	

	function order()
	{
	
		$data['page_title'] = lang('order_form');
		$data['seo_title']	= 'WeChat Official Account Order Form';
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		$submitted 	= $this->input->post('submitted');
		$data['error'] = '';
		$data['base_url'] = 'order';
	
		if ($submitted){
	
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_check_email');
			$this->form_validation->set_rules('wechat_id', 'Wechat ID', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required|max_length[100]');
			$this->form_validation->set_rules('business', 'Business', 'required|max_length[100]');
			$this->form_validation->set_rules('handphone', 'Handphone', 'required');			
			$this->form_validation->set_rules('account_type', 'Public Account Type', 'required');
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}else{
				$email	  			= $this->input->post('email');
				$wechat_id	  		= $this->input->post('wechat_id');
				$name	  			= $this->input->post('name');
				$business	  		= $this->input->post('business');
				$handphone	= $this->input->post('handphone');
				$account_type		= $this->input->post('account_type');
				
				$order['email'] = $email;
				$order['wechat_id'] = $wechat_id;
				$order['name'] = $name;
				$order['business'] = $business;
				$order['phone'] = $handphone;
				$order['account_type'] = $account_type;								
				$order['status'] = 'Pending';
				$order['ordered_on'] = date("Y-m-d H:i:s");
				
				$this->Order_model->save_order_service($order);			

				$this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from($email, $name);
				$this->email->to($this->config->item('email'));
				$this->email->bcc($this->config->item('email'));
				$this->email->subject('New Order');
				$this->email->message(html_entity_decode('at '.$order['ordered_on'] . ' '.$name. ' has ordered an service with '. $account_type .'. His contact number is '.$handphone));
				$this->email->send();
				
				
				$this->session->set_flashdata('message', 'Hi '. $name. '. We will contact you as soon to meet up to open an official WeChat account.');
				
								
				redirect(current_url());
			}
		}
	
		$this->view('order', $data);
	}
	
	function page($id = false)
	{
		//if there is no page id provided redirect to the homepage.
		$data['page']	= $this->Page_model->get_page($id);
		if(!$data['page'])
		{
			show_404();
		}
		$this->load->model('Page_model');
		$data['base_url']			= $this->uri->segment_array();
		
		$data['fb_like']			= true;

		$data['page_title']			= $data['page']->title;
		
		$data['meta']				= $data['page']->meta;
		$data['seo_title']			= (!empty($data['page']->seo_title))?$data['page']->seo_title:$data['page']->title;
		
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		
		$this->view('page', $data);
	}
	
	
	function search($code=false, $page = 0)
	{
		$this->load->model('Search_model');
		
		//check to see if we have a search term
		if(!$code)
		{
			//if the term is in post, save it to the db and give me a reference
			$term		= $this->input->post('term', true);
			$code		= $this->Search_model->record_term($term);
			
			// no code? redirect so we can have the code in place for the sorting.
			// I know this isn't the best way...
			redirect('cart/search/'.$code.'/'.$page);
		}
		else
		{
			//if we have the md5 string, get the term
			$term	= $this->Search_model->get_term($code);
		}
		
		if(empty($term))
		{
			//if there is still no search term throw an error
			$this->session->set_flashdata('error', lang('search_error'));
			redirect('cart');
		}

		$data['page_title']			= lang('search');
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;
		
		//fix for the category view page.
		$data['base_url']			= array();
		
		$sort_array = array(
							'name/asc' => array('by' => 'name', 'sort'=>'ASC'),
							'name/desc' => array('by' => 'name', 'sort'=>'DESC'),
							'price/asc' => array('by' => 'sort_price', 'sort'=>'ASC'),
							'price/desc' => array('by' => 'sort_price', 'sort'=>'DESC'),
							);
		$sort_by	= array('by'=>false, 'sort'=>false);
	
		if(isset($_GET['by']))
		{
			if(isset($sort_array[$_GET['by']]))
			{
				$sort_by	= $sort_array[$_GET['by']];
			}
		}
		
			$data['page_title']	= lang('search');
			$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		
			//set up pagination
			$this->load->library('pagination');
			$config['base_url']		= base_url().'cart/search/'.$code.'/';
			$config['uri_segment']	= 4;
			$config['per_page']		= 20;
			
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['full_tag_open'] = '<div class="pagination"><ul>';
			$config['full_tag_close'] = '</ul></div>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['next_link'] = '&raquo;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$result					= $this->Product_model->search_products($term, $config['per_page'], $page, $sort_by['by'], $sort_by['sort']);
			$config['total_rows']	= $result['count'];
			$this->pagination->initialize($config);
	
			$data['products']		= $result['products'];
			foreach ($data['products'] as &$p)
			{
				$p->images	= (array)json_decode($p->images);
				$p->options	= $this->Option_model->get_product_options($p->id);
			}
			$this->view('category', $data);
	}
	

	
	function category($id)
	{
		
		//get the category
		$data['category'] = $this->Category_model->get_category($id);
				
		if (!$data['category'] || $data['category']->enabled==0)
		{
			show_404();
		}
				
		$product_count = $this->Product_model->count_products($data['category']->id);
		
		//set up pagination
		$segments	= $this->uri->total_segments();
		$base_url	= $this->uri->segment_array();
		
		if($data['category']->slug == $base_url[count($base_url)])
		{
			$page	= 0;
			$segments++;
		}
		else
		{
			$page	= array_splice($base_url, -1, 1);
			$page	= $page[0];
		}
		
		$data['base_url']	= $base_url;
		$base_url			= implode('/', $base_url);
		
		$data['product_columns']	= $this->config->item('product_columns');
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		
		$data['meta']		= $data['category']->meta;
		$data['seo_title']	= (!empty($data['category']->seo_title))?$data['category']->seo_title:$data['category']->name;
		$data['page_title']	= $data['category']->name;
		
		$sort_array = array(
							'name/asc' => array('by' => 'products.name', 'sort'=>'ASC'),
							'name/desc' => array('by' => 'products.name', 'sort'=>'DESC'),
							'price/asc' => array('by' => 'sort_price', 'sort'=>'ASC'),
							'price/desc' => array('by' => 'sort_price', 'sort'=>'DESC'),
							);
		$sort_by	= array('by'=>'sequence', 'sort'=>'ASC');
	
		if(isset($_GET['by']))
		{
			if(isset($sort_array[$_GET['by']]))
			{
				$sort_by	= $sort_array[$_GET['by']];
			}
		}
		
		//set up pagination
		$this->load->library('pagination');
		$config['base_url']		= site_url($base_url);
		
		$config['uri_segment']	= $segments;
		$config['per_page']		= 24;
		$config['total_rows']	= $product_count;
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
				
		$this->pagination->initialize($config);
		
		
		$data['products']	= $this->Product_model->get_products($data['category']->id, $config['per_page'], $page, $sort_by['by'], $sort_by['sort']);
		
		
		foreach ($data['products'] as &$p)
		{
			$p->images	= (array)json_decode($p->images);
			$p->options	= $this->Option_model->get_product_options($p->id);
		}
		
		$this->view('category', $data);
	}
	
	function product($id)
	{
		//get the product
		$data['product']	= $this->Product_model->get_product($id);
		
		
		if(!$data['product'] || $data['product']->enabled==0)
		{
			show_404();
		}
		
		$data['base_url']			= $this->uri->segment_array();
		
		// load the digital language stuff
		$this->lang->load('digital_product');
		
		$data['options']	= $this->Option_model->get_product_options($data['product']->id);
		
		$related			= $data['product']->related_products;
		$data['related']	= array();
		

				
		$data['posted_options']	= $this->session->flashdata('option_values');

		$data['page_title']			= $data['product']->name;
		$data['meta']				= $data['product']->meta;
		$data['seo_title']			= (!empty($data['product']->seo_title))?$data['product']->seo_title:$data['product']->name;
			
		if($data['product']->images == 'false')
		{
			$data['product']->images = array();
		}
		else
		{
			$data['product']->images	= array_values((array)json_decode($data['product']->images));
		}

		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
					
		$this->view('product', $data);
	}
	
	
	function add_to_cart()
	{
		// Get our inputs
		$product_id		= $this->input->post('id');
		$quantity 		= $this->input->post('quantity');
		$post_options 	= $this->input->post('option');
		
		// Get a cart-ready product array
		$product = $this->Product_model->get_cart_ready_product($product_id, $quantity);
		
		//if out of stock purchase is disabled, check to make sure there is inventory to support the cart.
		if(!$this->config->item('allow_os_purchase') && (bool)$product['track_stock'])
		{
			$stock	= $this->Product_model->get_product($product_id);
			
			//loop through the products in the cart and make sure we don't have this in there already. If we do get those quantities as well
			$items		= $this->go_cart->contents();
			$qty_count	= $quantity;
			foreach($items as $item)
			{
				if(intval($item['id']) == intval($product_id))
				{
					$qty_count = $qty_count + $item['quantity'];
				}
			}
			
			if($stock->quantity < $qty_count)
			{
				//we don't have this much in stock
				$this->session->set_flashdata('error', sprintf(lang('not_enough_stock'), $stock->name, $stock->quantity));
				$this->session->set_flashdata('quantity', $quantity);
				$this->session->set_flashdata('option_values', $post_options);

				redirect($this->Product_model->get_slug($product_id));
			}
		}

		// Validate Options 
		// this returns a status array, with product item array automatically modified and options added
		//  Warning: this method receives the product by reference
		$status = $this->Option_model->validate_product_options($product, $post_options);
		
		// don't add the product if we are missing required option values
		if( ! $status['validated'])
		{
			$this->session->set_flashdata('quantity', $quantity);
			$this->session->set_flashdata('error', $status['message']);
			$this->session->set_flashdata('option_values', $post_options);
		
			redirect($this->Product_model->get_slug($product_id));
		
		} else {
		
			//Add the original option vars to the array so we can edit it later
			$product['post_options']	= $post_options;
			
			//is giftcard
			$product['is_gc']			= false;
			
			// Add the product item to the cart, also updates coupon discounts automatically
			$this->go_cart->insert($product);
		
			// go go gadget cart!
			redirect('cart/view_cart');
		}
	}
	
	function view_cart()
	{
		
		$data['page_title']	= 'View Cart';
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		
		$this->view('view_cart', $data);
	}
	
	function remove_item($key)
	{
		//drop quantity to 0
		$this->go_cart->update_cart(array($key=>0));
		
		redirect('cart/view_cart');
	}
	
	function update_cart($redirect = false)
	{
		//if redirect isn't provided in the URL check for it in a form field
		if(!$redirect)
		{
			$redirect = $this->input->post('redirect');
		}
		
		// see if we have an update for the cart
		$item_keys		= $this->input->post('cartkey');
		$coupon_code	= $this->input->post('coupon_code');
		$gc_code		= $this->input->post('gc_code');
		
		if($coupon_code)
		{
			$coupon_code = strtolower($coupon_code);
		}
			
		//get the items in the cart and test their quantities
		$items			= $this->go_cart->contents();
		$new_key_list	= array();
		//first find out if we're deleting any products
		foreach($item_keys as $key=>$quantity)
		{
			if(intval($quantity) === 0)
			{
				//this item is being removed we can remove it before processing quantities.
				//this will ensure that any items out of order will not throw errors based on the incorrect values of another item in the cart
				$this->go_cart->update_cart(array($key=>$quantity));
			}
			else
			{
				//create a new list of relevant items
				$new_key_list[$key]	= $quantity;
			}
		}
		$response	= array();
		foreach($new_key_list as $key=>$quantity)
		{
			$product	= $this->go_cart->item($key);
			//if out of stock purchase is disabled, check to make sure there is inventory to support the cart.
			if(!$this->config->item('allow_os_purchase') && (bool)$product['track_stock'])
			{
				$stock	= $this->Product_model->get_product($product['id']);
			
				//loop through the new quantities and tabluate any products with the same product id
				$qty_count	= $quantity;
				foreach($new_key_list as $item_key=>$item_quantity)
				{
					if($key != $item_key)
					{
						$item	= $this->go_cart->item($item_key);
						//look for other instances of the same product (this can occur if they have different options) and tabulate the total quantity
						if($item['id'] == $stock->id)
						{
							$qty_count = $qty_count + $item_quantity;
						}
					}
				}
				if($stock->quantity < $qty_count)
				{
					if(isset($response['error']))
					{
						$response['error'] .= '<p>'.sprintf(lang('not_enough_stock'), $stock->name, $stock->quantity).'</p>';
					}
					else
					{
						$response['error'] = '<p>'.sprintf(lang('not_enough_stock'), $stock->name, $stock->quantity).'</p>';
					}
				}
				else
				{
					//this one works, we can update it!
					//don't update the coupons yet
					$this->go_cart->update_cart(array($key=>$quantity));
				}
			}
			else
			{
				$this->go_cart->update_cart(array($key=>$quantity));
			}
		}
		
		//if we don't have a quantity error, run the update
		if(!isset($response['error']))
		{
			//update the coupons and gift card code
			$response = $this->go_cart->update_cart(false, $coupon_code, $gc_code);
			// set any messages that need to be displayed
		}
		else
		{
			$response['error'] = '<p>'.lang('error_updating_cart').'</p>'.$response['error'];
		}
		
		
		//check for errors again, there could have been a new error from the update cart function
		if(isset($response['error']))
		{
			$this->session->set_flashdata('error', $response['error']);
		}
		if(isset($response['message']))
		{
			$this->session->set_flashdata('message', $response['message']);
		}
		
		if($redirect)
		{
			redirect($redirect);
		}
		else
		{
			redirect('cart/view_cart');
		}
	}

	
	/***********************************************************
			Gift Cards
			 - this function handles adding gift cards to the cart
	***********************************************************/
	
	function giftcard()
	{
		if(!$this->gift_cards_enabled) redirect('/');
		
		// Load giftcard settings
		$gc_settings = $this->Settings_model->get_settings("gift_cards");
				
		$this->load->library('form_validation');
		
		$data['allow_custom_amount']	= (bool) $gc_settings['allow_custom_amount'];
		$data['preset_values']			= explode(",",$gc_settings['predefined_card_amounts']);
		
		if($data['allow_custom_amount'])
		{
			$this->form_validation->set_rules('custom_amount', 'lang:custom_amount', 'numeric');
		}
		
		$this->form_validation->set_rules('amount', 'lang:amount', 'required');
		$this->form_validation->set_rules('preset_amount', 'lang:preset_amount', 'numeric');
		$this->form_validation->set_rules('gc_to_name', 'lang:recipient_name', 'trim|required');
		$this->form_validation->set_rules('gc_to_email', 'lang:recipient_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('gc_from', 'lang:sender_email', 'trim|required');
		$this->form_validation->set_rules('message', 'lang:custom_greeting', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['error']				= validation_errors();
			$data['page_title']			= lang('giftcard');
			$data['gift_cards_enabled']	= $this->gift_cards_enabled;
			$this->view('giftcards', $data);
		}
		else
		{
			
			// add to cart
			
			$card['price'] = set_value(set_value('amount'));
			
			$card['id']				= -1; // just a placeholder
			$card['sku']			= lang('giftcard');
			$card['base_price']		= $card['price']; // price gets modified by options, show the baseline still...
			$card['name']			= lang('giftcard');
			$card['code']			= generate_code(); // from the string helper
			$card['excerpt']		= sprintf(lang('giftcard_excerpt'), set_value('gc_to_name'));
			$card['weight']			= 0;
			$card['quantity']		= 1;
			$card['shippable']		= false;
			$card['taxable']		= 0;
			$card['fixed_quantity'] = true;
			$card['is_gc']			= true; // !Important
			$card['track_stock']	= false; // !Imporortant
			
			$card['gc_info'] = array("to_name"	=> set_value('gc_to_name'),
									 "to_email"	=> set_value('gc_to_email'),
									 "from"		=> set_value('gc_from'),
									 "personal_message"	=> set_value('message')
									 );
			
			// add the card data like a product
			$this->go_cart->insert($card);
			
			redirect('cart/view_cart');
		}
	}
	
	function intro(){
		$data['page_title']	= 'Social Media Intro';
		$data['seo_title']	= 'Social Media Intro';
		$this->view('intro', $data);
	}
	
	function breakthrough(){
		$data['page_title']	= 'WeChat Breakthrough';
		$data['seo_title']	= 'Wechat Breakthrough';
		$this->view('breakthrough', $data);
	}
	
	function wechat_type(){
		$data['page_title']	= 'WeChat Service Account and WeChat Subscription Account';
		$data['seo_title']	= 'WeChat Service Account and WeChat Subscription Account';
		$this->view('wechat_type', $data);
	}
	
	function advantages(){
		$data['page_title']	= 'WeChat Advantages';
		$data['seo_title']	= 'WeChat Advantages';
		$this->view('advantages', $data);
	}
	
	function service_oriented_marketing(){
		$data['page_title']	= 'WeChat Marketing + Service = Sales';
		$data['seo_title']	= 'Service-oriented Marketing';		
		$this->view('service_oriented_marketing', $data);
	}
	
	function business_suitable(){
		$data['page_title']	= 'Business Suitable for WeChat';
		$data['seo_title']	= 'Business Suitable for WeChat';
		$this->view('business_suitable_for_wechat', $data);
	}
	
	
	
	
	
	
}