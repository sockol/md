<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!--> <html class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <script> 

/*jQuery( document ).ready(function() { 
  console.log(jQuery('.view-locations .gm-style').html());//  > div:first-child > div:first-child > div:eq(2)
    jQuery('.view-locations .gm-style > div:first-child > div:first-child > div > div').each(function(){

            var $el = jQuery(this);
console.log($el);
            var address = $el.find('.street-address');
            var zip = $el.find('.postal-code');
            var city = $el.find('.locality');

         
            city.remove();   zip.remove();
            address.remove();

             $el.find('.country-name').hide();
            $el.find('.vcard').prepend(address);
            $el.find('.vcard').prepend(city);
            $el.find('.vcard').prepend(zip);
            console.log($el);
    }); 
  });*/
  </script>
</body> 
</html>