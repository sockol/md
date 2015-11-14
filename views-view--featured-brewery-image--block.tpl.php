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

$view=views_get_view_result('featured_brewery_image');
//print_r($view);

$title = $view['0']->_field_data['nid']['entity']->title;
 
$body = $view['0']->_field_data['nid']['entity']->body['und']['0']['value'];

$body_str = "";
$body = explode(' ',$body);
$counter = 0;
foreach($body as $row){
  $body_str = $body_str.' '.$row;
  if($counter==50)
    break;
  $counter++;
}
$body = $body_str.'...';

$address = $view['0']->_field_data['nid']['entity']->field_address['und']['0']['value'];
 
$image = $view['0']->_field_data['nid']['entity']->field_image['und']['0']['uri'];
 
$url = image_style_url(
  'large',
  $image
);  
$link = drupal_lookup_path('alias',"node/".$view['0']->nid) ;
?>
<div class="<?php print $classes; ?>">  
  <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
    <div class="views-field views-field-field-image">        
      <div class="field-content featured-brewery-image">
        <a href="/preview/<?php echo $link; ?>">
          <img typeof="foaf:Image" src="<?php print $url; ?>" width="256" height="169" alt="<?php print $title; ?>">
        </a>
      </div>  
      <div class="views-field views-field-body"> 
        <div class="field-content featured-brewery-description">
          <span class="field-content"><a href="/preview/<?php echo $link; ?>"><?php print $title; ?></a></span>    
          <span class="views-label views-label-field-address">Address: <?php print $address; ?></span> 
          <p><?php print $body; ?> <a href="<?php echo $link; ?>">read more</a></p>

        </div>
      </div> 
    </div> 
  </div>  
</div><?php /* class view */ ?>