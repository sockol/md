<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$rown = 0;  
?> 
<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="allcompany">
	<?php foreach ($rows as $id => $row): $rown++; 
	 
	?>
		<?php if ($rown%3 == 1 && $rown != 1) : ?>
</div>
<div class="allcompany">
	<?php if (count($rows) - $rown < 2) : ?>
    	<div class="company-centered-div"> 
        <!-- If you want 3 div in blog just delate this div --> 
        </div>
		<?php endif ?>
		<?php endif ?>
		<div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
			<?php print $row; ?>
		</div>
	<?php endforeach; ?>
</div>
