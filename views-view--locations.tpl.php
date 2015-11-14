<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
<?php print render($title_prefix); ?>
<?php if ($title): ?>
	<?php print $title; ?>
<?php endif; ?>
<?php print render($title_suffix); ?>
<?php if ($header): ?>
	<div class="view-header">
		<?php print $header; ?>
	</div>
<?php endif; ?>

<?php if ($exposed): ?>
	<div class="view-filters">
		<?php print $exposed; ?>
	</div>
<?php endif; ?>

<?php if ($attachment_before): ?>
	<div class="attachment attachment-before">
		<?php print $attachment_before; ?>
	</div>
<?php endif; ?>

<?php if ($rows): ?>
	 
	 <div class="view-content" id="locations">
	  <?php print $rows; ?>




	 </div>
	<?php elseif ($empty): ?>



	<div class="view-content" id="locations"></div>
	 <div class="view-empty">
	  <?php print $empty; ?>
	 </div>
	 <?php else: ?>  
	    <div class="view-content" id="locations" >   
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12947831.742778076!2d-95.66499999999996!3d37.6!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2z0KHQvtC10LTQuNC90LXQvdC90YvQtSDQqNGC0LDRgtGLINCQ0LzQtdGA0LjQutC4!5e0!3m2!1sen!2sen!4v1402575260837" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
	 	</div> 
		<script> 
				jQuery(function($){
					$.fancybox({
						href: '#zip-form', 
					});
					 
				}); 
		</script>

<?php endif; ?>

<?php if ($pager): ?>
	<?php print $pager; ?>
<?php endif; ?>
<!--
<div class="view-header" style="margin-top: -13px;">
    <div class="ourbeers">
        <div class="pattern">
            <div class="restangle" style="width: 300px;">
                <h1>Product Availability</h1>
            </div>
        </div>
    </div>
</div>
-->
<?php if ($attachment_after): ?>
	<div class="attachment attachment-after">
		<?php print $attachment_after; ?>
	</div>
<?php endif; ?>

<?php if ($more): ?>
	<?php print $more; ?>
<?php endif; ?>

<?php if ($footer): ?>
	<div class="view-footer">
		<?php print $footer; ?>
	</div>
<?php endif; ?>

<?php if ($feed_icon): ?>
	<div class="feed-icon">
		<?php print $feed_icon; ?>
	</div>
<?php endif; ?>

</div><?php /* class view */ ?>

 
 		<style>



body {

/*background:blue;*/

}


.message
{
	background: #fff;
	border-radius: 4px;
	box-shadow: 0px 1px 15px #000;
	max-width: 500px;
	overflow: hidden;
}
.message h1
{
	background: #fe6800;
	color: #fff;
	font-family: tahoma;
	font-size: 45px;
	font-style: italic;
	letter-spacing: 2px;
	margin: 0px;
	padding: 15px 0px;
	text-align: center;
	text-transform: uppercase;
	width: 100%;
}
.fancybox-inner .pattern
{
	background: url(data:image/png;);
	height: 15px;
	position: relative;
	width: 100%;
}
.confirm
{
	margin: 20px 0px;
	text-align: center;
}
.confirm a
{
	background: #676767;
	border-radius: 6px;
	color: #fff;
	font-family: tahoma;
	font-size: 36px;
	font-weight: bold;
	margin: 0px 10px;
	padding: 5px 20px;
	text-decoration: none;
	text-transform: uppercase;
	width: 150px;
}
.confirm a:hover
{
	background: #e7e7e7;
	color: #2f2f2f;
}
</style>
<div class="container">
	<div id="zip-form" style="display: none" class="message">
		<h1>Error</h1>
	    <div class="pattern"></div>
		<div class="action-links confirm"> 
			<p>Invalid zip code, please try again</p>  
		</div> 
	</div>  
</div>	 

<script type="text/javascript">
	(function($){ 
		"use strict";
		var locations = [];
		$('#locations address').each(function(){ 
			var content = $(this).find('.vcard .adr');
			content.find('.country-name').css({'display':'none'});
			var street = content.find('.street-address').css({'display':'none'});;
			var code = content.find('.postal-code').css({'display':'none'});;
			var locality = content.find('.locality').css({'display':'none'});;
			content.append('<div>'+street.text()+'</div>');
			content.append('<div>'+locality.text()+", TX "+code.text()+'</div>');
			  
			locations.push({
				lat: $(this).data('lat'),
				lon: $(this).data('lon'),
				title: $(this).data('title'),
				content: $(this).html()
			});
		});
		var initialize = window['locations_initialize'] = function() {

			var bounds = new google.maps.LatLngBounds();
			var latlng = new google.maps.LatLng(locations[0].lat, locations[0].lon);
			var myOptions = {
				zoom: 16,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("locations"), myOptions);
			var markers = [];
			$.each(locations, function() {
				var latLng = new google.maps.LatLng(this.lat, this.lon);
				bounds.extend(latLng);
				var marker = new google.maps.Marker({
					position: latLng,
					map: map,
					title: this.title,
					optimized: true
				});
				marker.infoWindow = new google.maps.InfoWindow({
					content: this.content
				});
				google.maps.event.addListener(marker, 'click', function() {
					this.infoWindow.open(map,this);
				});
				markers.push(marker);

			});
			map.fitBounds(bounds);
			var markerCluster = new MarkerClusterer(map, markers);
		};

		var key = '';
		$.getScript('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js');
		if (typeof(google) == 'undefined' || typeof(google.maps) == 'undefined') {
			$.getScript('http://maps.googleapis.com/maps/api/js?&sensor=true&callback=locations_initialize'+(key?'&key='+key:''));
		}
		google.maps.event.addDomListener(window, 'load', initialize);

		$("#locations ").css({'height':$(window).height()-180});
	    
	    $(window).resize(function(){  
	        $("#locations").css({'height':$(window).height()-180});
	    });
	})(jQuery);
</script>