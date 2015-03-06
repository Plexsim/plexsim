<section id="footer-defoult" class="padding-60">
		<div class="container">
			<div class="row">
				<!--div class="col-md-3 margin-btm20">
					<div class="footer-column">
						
						<p class="margin-btm20">
							No portion of this website may be reproduced, or otherwise used without the express written permission of Orack Software Solution Sdn Bhd.
						</p>

					</div>
				</div-->
				
				<div class="col-md-4 margin-btm20">
					<div class="footer-column">												
						<a href="<?php echo base_url()?>"><img src="<?php echo theme_url('assets/img/logo.png') ?>"></a>
					</div>
				</div>
				
				<div class="col-lg-8 margin-btm20">
					<div class="footer-column">						
						<h3><?php echo lang('get_in_touch')?></h3>
						<ul class="list-unstyled contact-list margin-btm20">
							<li><i class="ion-home"></i> <strong><?php echo lang('address')?>:</strong> 27D Taman Miharja Jalan Palong 55200 Cheras Kuala Lumpur</li>
							<li><i class="ion-ios7-telephone"></i> <strong><?php echo lang('address_phone')?>:</strong> 012-2361159</li>
							<li><i class="ion-ios7-telephone"></i> <strong><?php echo lang('office_no')?>:</strong> 1700-81-5563</li>
							<li><i class="ion-ios7-telephone"></i> <strong><?php echo lang('contact_person')?>:</strong> William Lim</li>
							<li><i class="ion-ios7-email"></i> <strong><?php echo lang('account_email')?>:</strong> support@plexsimsoftware.com</li>
							<li><i class="ion-ios7-world"></i> <strong><?php echo lang('website')?>:</strong> http://www.plexsimsoftware.com/</li>
						</ul>
						<!--ul class="list-unstyled list-inline social">
							<li><a href="#"><i class="ion-social-facebook-outline"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Like On Facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow On twitter"></i></a></li>
							<li><a href="#"><i class="ion-social-googleplus-outline"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow On googleplus"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"  data-toggle="tooltip" data-placement="top" title="" data-original-title="pinterest"></i></a></li>
							<li><a href="#"><i class="ion-social-skype-outline"  data-toggle="tooltip" data-placement="top" title="" data-original-title="skype"></i></a></li>
						</ul-->
					</div><!--footer columns end-->
				</div>
			</div><!--row end -->
			
			<div class="row">
				<div class="col-md-12 text-center">
					<span>&copy; copyright Since 2014, <?php echo $this->config->item('company_name');?> Software Solution All right reserved.</span>
				</div>
			</div>
		</div><!--container-->
	</section><!--footer default end-->
	<!--scripts-->
	
	<?php echo theme_js('jquery-1.10.2.min.js', true);?>
	<?php echo theme_js('jquery.easing.1.3.min.js', true);?>
	<?php echo theme_js('bootstrap.min.js', true);?>
	<?php echo theme_js('bootstrap-hover-dropdown.min.js', true);?>	 
	<script src="<?php echo theme_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>		
	<?php echo theme_js('jquery.flexslider-min.js', true);?>
	<?php echo theme_js('jquery.mixitup.min.js', true);?>
	<?php echo theme_js('app.js', true);?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

	 <script type="text/javascript">
      var myLatlng;
      var map;
      var marker;

      function initialize() {
        myLatlng = new google.maps.LatLng(3.126843,101.723878);

        var mapOptions = {
          zoom: 13,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: false,
          draggable: false
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var contentString = '<p style="line-height: 20px;"><strong>Banzhow Template</strong></p><p>123 My Street, Banzhow City, CA 4567</p>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Marker'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
       
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-48130566-2', 'auto');
	  ga('send', 'pageview');
	</script>
         
	
</body>
</html>