
<section id="page-tree">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5">
				<h1>
					<?php echo lang('advantages');?>
				</h1>
			</div>
			<div class="col-md-7 col-sm-7">
				<ol class="breadcrumb pull-right hidden-xs">
					<li><a href="<?php echo base_url()?>"><i class="ion-home"></i>Home</a>
					</li>
					<li><a><?php echo lang('advantages');?> </a></li>
				</ol>
			</div>
		</div>
		<!--row-->
	</div>
	<!--container-->
</section>
<!--page-tree-->

<div class="divied-60"></div>
<div class="container">
	<div class="row">
	
				<div class="col-sm-4 col-xs-12 margin-btm20">
					<a href="#" data-toggle="modal" data-target="#advantage1_modal">
						<div class="image-sec">
							<img class="img-responsive-adv"
								src="<?php echo theme_img('advantages1.png')?>" alt="Portfolio">
							<div class="image-overlay">
								<p>
									<?php echo lang('one_to_one_service');?>
								</p>
							</div>
						</div> <!--image-->
					</a>
					<div class="blog-desc">
						<h3>
							<a href="blog-post.html" class="hover-color"><?php echo lang('one_to_one_service');?>
							</a>
						</h3>
						<p>
							<?php echo lang('without_face_to_face');?>
						</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 margin-btm20">
					<a href="#" data-toggle="modal" data-target="#advantage2_modal">
						<div class="image-sec">
							<img class="img-responsive-adv"
								src="<?php echo theme_img('advantages2.png')?>" alt="Portfolio">
							<div class="image-overlay">
								<p>
									<?php echo lang('online_marketing');?>
								</p>
							</div>
						</div> <!--image-->
					</a>
					<div class="blog-desc">
						<h3>
							<a href="blog-post.html" class="hover-color"><?php echo lang('online_marketing');?>
							</a>
						</h3>
						<p>
							<?php echo lang('bulk_messaging_to_customer');?>
							<?php if($this->session->userdata('lang') == 'english'): ?>
							</br> </br> </br> </br> </br>
							<?php endif;?>
						</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 margin-btm20">
					<a href="#" data-toggle="modal" data-target="#advantage3_modal">
						<div class="image-sec">
							<img class="img-responsive-adv"
								src="<?php echo theme_img('advantages3.png')?>" alt="Portfolio">
							<div class="image-overlay">
								<p>
									<?php echo lang('reach_your_target_market');?>
									
								</p>
							</div>
						</div> <!--image-->
					</a>
					<div class="blog-desc">
						<h3>
							<a href="blog-post.html" class="hover-color"><?php echo lang('reach_your_target_market');?>
							</a>
						</h3>
						<p>
							<?php echo lang('bulk_messaging_to_selected');?>
						</p>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12 margin-btm20">
					<a href="#" data-toggle="modal" data-target="#advantage4_modal">
						<div class="image-sec">
							<img class="img-responsive-adv"
								src="<?php echo theme_img('advantages4.png')?>" alt="Portfolio">
							<div class="image-overlay">
								<p>
									<?php echo lang('24_hour_automated_service');?>
								</p>
							</div>
						</div> <!--image-->
					</a>
					<div class="blog-desc">
						<h3>
							<a href="blog-post.html" class="hover-color"><?php echo lang('24_hour_automated_service');?>
							</a>
						</h3>
						<p>
							<?php echo lang('at_any_point_of_time');?>
						</p>
					</div>
				</div>


	</div>
</div>
<!--blog full width-->


<!-- Modal -->
<div class="modal fade" id="advantage1_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo lang('close');?></span></button>
      </div>
      <div class="modal-body">
        	<img src="<?php echo theme_img('advantages1.png')?>" class="responsive-image">
      </div>      
    </div>
  </div>
</div>

<div class="modal fade" id="advantage2_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo lang('close');?></span></button>
      </div>
      <div class="modal-body">
        	<img src="<?php echo theme_img('advantages2.png')?>" class="responsive-image">
      </div>      
    </div>
  </div>
</div>

<div class="modal fade" id="advantage3_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo lang('close');?></span></button>
      </div>
      <div class="modal-body">
        	<img src="<?php echo theme_img('advantages3.png')?>" class="responsive-image">
      </div>      
    </div>
  </div>
</div>

<div class="modal fade" id="advantage4_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo lang('close');?></span></button>
      </div>
      <div class="modal-body">
        	<img src="<?php echo theme_img('advantages4.png')?>" class="responsive-image">
      </div>      
    </div>
  </div>
</div>

