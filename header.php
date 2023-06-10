<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
	<?php
	require_once get_template_directory() . '/fomantic-walker-nav-menu.php';
	wp_head();
	?>
</head>
<body>

<!-- Start top menu -->
<div class="ui inverted menu border-bottom custom-height-mod">
    <div class="ui container" id="top_menu">
        <a href="<?= get_bloginfo( 'url' ) ?>" class="header item">
			<?php
			if ( function_exists( 'the_custom_logo' ) ) { ?>
                <img class="logo" src="<?= wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) )[0] ?>" alt="">
			<?php }
			echo strtoupper( get_bloginfo( 'name' ) )
			?>
        </a>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( [
				             'menu'           => 'primary',
				             'theme_location' => 'primary',
				             'items_wrap'     => '%3$s',
				             'container'      => 'ul',
				             'menu_class'     => 'ui menu',
				             'walker'         => new Fomantic_Walker_Nav_Menu()
			             ] );
		}
		?>
        <div class="right menu">
            <div class="item">
				<?= get_search_form() ?>
            </div>
        </div>
    </div>
</div>
<!-- End Top menu -->
