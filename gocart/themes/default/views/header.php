<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>


<?php if(isset($meta)):?>
	<?php echo $meta;?>
<?php else:?>
<meta name="Keywords" content="Shopping Cart, eCommerce, Orack, Software Service, SEO">
<meta name="Description" content="Orack Software Solution Sdn Bhd">
<?php endif;?>

<!--bootstrap3 css-->
<?php echo theme_css('bootstrap.min.css', true);?>
<!--ion icon fonts css-->
<?php echo theme_css('ionicons.css', true);?>
<!--custom css-->
<?php echo theme_css('style.css', true);?>
<!--google raleway font family-->
 <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,100,700,500' rel='stylesheet' type='text/css'>
<!--flex slider css-->
<?php echo theme_css('flexslider.css', true);?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo theme_img("icon2.png")?>">

<?php
//with this I can put header data in the header instead of in the body.
if(isset($additional_header_info))
{
	echo $additional_header_info;
}

?>
</head>

<body>
		
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo theme_url('assets/img/logo.png') ?>" class="img-responsive" alt="logo-white"></a>
		</div>
		<div class="navbar-collapse collapse">

			<ul class="nav navbar-nav navbar-right">
				<li class="<?php echo $this->uri->segment(1)=="index" || $this->uri->segment(1)=="" ? "active":"nonactive" ?>">
					<a href="<?php echo base_url()?>"><?php echo lang('home') ?></a>
				</li>
				
				<li class="dropdown">	
					<a class="dropdown-toggle js-activated"  data-toggle="dropdown" href="#"><?php echo lang('wechat') ?></a>				
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('intro')?>"><?php echo lang('social_media_intro') ?></a></li>
						<li><a href="<?php echo base_url('breakthrough')?>"><?php echo lang('wechat_breakthrough') ?></a></li>
						<li><a href="<?php echo base_url('wechat_type')?>"><?php echo lang('wechat_type')?></a></li>
						<li><a href="<?php echo base_url('advantages')?>"><?php echo lang('wechat_advantages')?></a></li>
						<li><a href="<?php echo base_url('service_oriented_marketing')?>"><?php echo lang('service_oriented_marketing')?></a></li>
						<li><a href="<?php echo base_url('business_suitable_for_wechat')?>"><?php echo lang('business_suitable_for_wechat')?></a></li>						
					</ul>
				</li>
				
				<!--li>
					<a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">About</a>					
				</li-->
				<!--li class="<?php echo (!isset($base_url) || $base_url == 'services') ? 'active': '-'?>">
					<a href="<?php echo base_url('services') ?>">Service</a>					
				</li-->				
				<li class="<?php echo $this->uri->segment(1)=="contact"? "active":"nonactive" ?>">
					<a href="<?php echo base_url('contact') ?>"><?php echo lang('contact') ?></a>
				</li>		
				
				<li class="<?php echo $this->uri->segment(1)=="order"? "active":"nonactive" ?>">
					<a href="<?php echo base_url('order') ?>"><?php echo lang('order') ?></a>
				</li>
				
				<li class="dropdown">	
					<a class="dropdown-toggle js-activated"  data-toggle="dropdown" href="#"><?php echo lang('language') ?></a>				
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('change_lang/english')?>">English</a></li>
						<li><a href="<?php echo base_url('change_lang/chinese')?>">&#21326;&#35821;</a></li>
					</ul>					
				</li>
				

			</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container-->
</div><!--navigation end-->
	
		

<?php
/*
End header.php file
*/