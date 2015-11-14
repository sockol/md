<?php
/**
 * @var array $page
 * @var string $title
 * @var array $main_menu
 * @var string $front_page
 * @var string $site_name
 */
?> 

 
<header id="header" role="banner">
	<div id="header-inner" class="header-inner">
		<div id="block-system-main-menu" class="block block-system block-menu">
			<div class="content">
				<?php print theme('links', array('links' => $main_menu, 'attributes' => array('class' => array('menu')))); ?>
			</div>
		</div>
		<div id="block-block-1" class="block block-block logo-block">
			<div class="content">
				<h2><a href="<?php print $front_page ?>" title="<?php print $site_name ?>"><?php print $site_name ?></a></h2>
			</div>
		</div> 
	</div> 
</header>
<script>jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"","ajaxPageState":{"theme":"mayandist","theme_token":"KfSJLPuw60Cn6xS488mW9b2HDewIXV1In8QP6OALWAM","css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"sites\/all\/modules\/date\/date_api\/date.css":1,"sites\/all\/modules\/date\/date_popup\/themes\/datepicker.1.7.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/views\/css\/views.css":1,"sites\/all\/modules\/absolute_messages\/absolute_messages.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/responsive_menus\/styles\/meanMenu\/meanmenu.min.css":1,"sites\/all\/themes\/mayandist\/stylesheets\/style.css":1,"sites\/all\/themes\/mayandist\/stylesheets\/print.css":1},"js":{"0":1,"sites\/all\/libraries\/modernizr\/modernizr.min.js":1,"sites\/all\/modules\/jquery_update\/replace\/jquery\/1.8\/jquery.min.js":1,"misc\/jquery.once.js":1,"misc\/drupal.js":1,"sites\/all\/modules\/admin_menu\/admin_devel\/admin_devel.js":1,"sites\/all\/modules\/absolute_messages\/absolute_messages.js":1,"1":1,"sites\/all\/modules\/responsive_menus\/styles\/meanMenu\/jquery.meanmenu.min.js":1,"sites\/all\/modules\/responsive_menus\/styles\/meanMenu\/responsive_menus_mean_menu.js":1,"2":1}},"responsive_menus":[{"selectors":"#block-system-main-menu","trigger_txt":"\u003Cspan \/\u003E\u003Cspan \/\u003E\u003Cspan \/\u003E","close_txt":"X","close_size":"28px","position":"right","media_size":"768","show_children":"0","expand_children":"0","expand_txt":"+","contract_txt":"-","remove_attrs":"0","responsive_menus_style":"mean_menu"}]});</script>
<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
<article>
    <?php print render($page['content']); ?>
</article>
<div class="clear"></div>
<footer>
	<div class="footer">
		<?php print render($page['footer']); ?>
	</div>
</footer>