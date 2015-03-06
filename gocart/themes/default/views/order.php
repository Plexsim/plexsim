<section id="page-tree">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-5">
				<h1><?php echo lang('wechat_official_account_order_form')?></h1>
			</div>
		</div><!--row-->
	</div><!--container-->
</section><!--page-tree-->
	
	<?php if ($this->session->flashdata('message')):?>
	<div class="alert alert-info">
			<a class="close" data-dismiss="alert">X</a>
			<?php echo $this->session->flashdata('message');?>
		</div>
	<?php endif;?>

	<?php if ($this->session->flashdata('error')):?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert">X</a>
			<?php echo $this->session->flashdata('error');?>
		</div>
	<?php endif;?>

	<?php if (!empty($error)):?>
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert">X</a>
			<?php echo $error;?>
		</div>
	<?php endif;?>	
   
	
    <div class="divied-60"></div>
	<div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3><?php echo lang('apply_wechat_official_account')?></h3>
                   
					<?php echo form_open('cart/order'); ?>                    
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                        <label><?php echo lang('wechat_id')?>*</label>
                                        <input name="wechat_id" id="wechat_id" type="text" required class="form-control" value="<?php echo set_value('wechat_id')?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang('name')?>*</label>
                                        <input name="name" id="name" type="text" required class="form-control" value="<?php echo set_value('name')?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php Echo lang('email')?>*</label>
                                        <input name="email" id="email" type="email" required class="form-control" value="<?php echo set_value('email')?>">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang('business')?></label>
                                        <input name="business" id="business" type="text" required class="form-control" value="<?php echo set_value('business')?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang('handphone')?>*</label>
                                        <input name="handphone" id="handphone" type="text" required class="form-control" value="<?php echo set_value('handphone')?>">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang('public_account_type')?>*</label> <button type="button" class="btn-primary" data-toggle="tooltip" data-placement="top" title="<?php echo lang('wechat_type')?>" data-original-title="<?php echo lang('wechat_type')?>"><i class="ion-information"></i> </button>  
                                        <input name="account_type" id="account_type" type="text" required class="form-control" value="<?php echo set_value('account_type')?>">                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-dark btn-lg"><?php echo lang('order')?></button>
									<input type="hidden" value="submitted" name="submitted"/>	
                                </div>
                            </div>
                        </form><!--Contact form-->
                </div>
                
                <div class="col-md-4">
                    <h3><?php echo lang('order_info')?></h3>                   
                    <p><?php echo lang('order_content_1')?></p>
                    <p><?php echo lang('order_content_2')?></p>
                    <p><?php echo lang('order_content_3')?></p>
                    
                    
                    <ul>                    	
                    	<li>RM1200 (Malaysia)</li>                    	                    	                    	
                    </ul>                    
                    <p><?php echo lang('order_content_5')?> </p>                    
                    <p><?php echo lang('order_content_6')?></p>
                    <p><?php echo lang('order_content_7')?></p>
                    
                    
                    <!--h3>Social Connect</h3>
                    <ul class="list-unstyled list-inline social">
                        <li><a href="#"><i class="ion-social-facebook-outline" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like On Facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter-outline" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow On twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus-outline" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow On googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline" data-toggle="tooltip" data-placement="top" title="" data-original-title="pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-skype-outline" data-toggle="tooltip" data-placement="top" title="" data-original-title="skype"></i></a></li>

                    </ul-->
                </div>

            </div>
        </div><!--Contact container end-->
        <div class="divied-60"></div>
	

