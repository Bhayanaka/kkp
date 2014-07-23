<!DOCTYPE html>

<html class="no-js" lang="en">

	<head>
        
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Direktorat Tata Ruang Laut dan Pulau-Pulau Kecil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
       
       <?php 
		if ($DATA['default']['page']==$CONFIG['default']['default_view']){
			?>
		<!-- CSS BERANDA -->
		
		<!--SLIDE-->
		<link rel="stylesheet" href="<?=$basedomain?>assets/css/slide-index.css" type="text/css"/>
		<script src="<?=$basedomain?>assets/js/slide/fastclick.js"></script>
		
		<script src="<?=$basedomain?>assets/js/jquery.js"></script>
		<script src="<?=$basedomain?>assets/js/slide/jquery.easyfader.js"></script>
		<script src="<?=$basedomain?>assets/js/slide/jquery.easyfader.slide.js"></script>
		<script src="<?=$basedomain?>assets/js/slide/jquery.easyfader.carousel.js"></script>
		<script src="<?=$basedomain?>assets/js/slide/jquery.easyfader.swipe.js"></script>
		
		<script>
			$(function(){
				FastClick.attach(document.body);
				
				$('#Carousel').easyFader({
					effect: 'carousel',
					effectDur: 400
				});
				$('#Fader').easyFader({
					autoCycle: true,
				});
				$('#Slider').easyFader({
					effect: 'slide',
					autoCycle: true
				});
			});
		</script>
		
		
		
		
		
		<!-- end CSS BERANDA -->	
			<?php
		}else{
		?>
		
		<script type="text/javascript" src="<?=$basedomain?>assets/js/jquery-1.10.1.min.js"></script>
		<?php
		}
		?>
		
		<script src="<?=$basedomain?>assets/js/bootstrap-dropdown.js"></script>
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>assets/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>assets/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="<?=$basedomain?>assets/css/kkp_byr.css" />
        <link rel="stylesheet" type="text/css" href="<?=$basedomain?>assets/css/drop.css" />
		
		<link rel="stylesheet" href="<?=$basedomain?>assets/css/table_byr.css" type="text/css" media="screen" />
		
		<!-- Add jQuery library -->
		<script type="text/javascript" src="<?=$basedomain?>assets/js/helper.js"></script>
		
		<!--FancyBox-->
		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="<?=$basedomain?>assets/js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		<!-- Add fancyBox -->
		<link rel="stylesheet" href="<?=$basedomain?>assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=$basedomain?>assets/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel="stylesheet" href="<?=$basedomain?>assets/js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=$basedomain?>assets/js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<script type="text/javascript" src="<?=$basedomain?>assets/js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
		<link rel="stylesheet" href="<?=$basedomain?>assets/js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=$basedomain?>assets/js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
		<!--end fancybox-->
		<!--google map-->
		<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
		<script>
			var myCenter=new google.maps.LatLng(-6.179139,106.832657);

			function initialize()
			{
			var mapProp = {
			  center:myCenter,
			  zoom:18,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			  };

			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker=new google.maps.Marker({
			  position:myCenter,
			  });

			marker.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>-->
		
		
		<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'elastic',
					closeEffect : 'elastic',
					prevEffect : 'elastic',
					nextEffect : 'elastic',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});
		});
		</script>
    </head>
