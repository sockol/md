<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
//kpr($content);
 
$query = new EntityFieldQuery;
$query->entityCondition('entity_type', 'taxonomy_term')
	->propertyCondition('vid', $term->vid)
	->propertyOrderBy('weight');
$result = $query->execute();
$arr = array(
		"/products/dirty-blonde-ale",
		"/products/puma-kola",
		"/products/hacienda-de-chihuahua-sotol-reposado",
		"/products/hacienda-de-chihuahua-sotol-reposado");
$arr_assoc = array();
if ($terms = taxonomy_term_load_multiple(array_keys($result['taxonomy_term']))) : 
	$counter = 0;
	foreach ($terms as $_term) : $uri = entity_uri('taxonomy_term', $_term);  
		
		$arr_assoc[drupal_get_path_alias($uri['path'] )] = $arr[$counter];
		
		$counter++;
	endforeach;  
 
endif  ; 
 ?>
 
<div class="view-product-types slider drop-shadow curved curved-hz-2">
	<ul class="bjqs">
		<a href="<?php global $base_url; echo $base_url.$arr_assoc[request_path()]; ?>">
		<li class="bjqs-slide">
			<?php echo render($content['field_image']) ?>
			<div class="bjqs-caption">
				<!--<strong><?php echo $term_name ?></strong>-->
				<strong><?php echo render($content['field_title']) ?></strong>
				<?php echo render($content['description']) ?>
			</div>
		</li>
		</a>
	</ul>
	<?php
	$query = new EntityFieldQuery;
	$query->entityCondition('entity_type', 'taxonomy_term')
		->propertyCondition('vid', $term->vid)
		->propertyOrderBy('weight');
	$result = $query->execute();
	 
	if ($terms = taxonomy_term_load_multiple(array_keys($result['taxonomy_term']))) : 
 
		?>
	<ol class="bjqs-markers h-centered">
		<?php foreach ($terms as $_term) : $uri = entity_uri('taxonomy_term', $_term); ?>
			<li><?php echo l($_term->name, $uri['path'], $uri['options']) ?></li>
		<?php endforeach ?>
	</ol>
	<?php endif ?>
</div>
