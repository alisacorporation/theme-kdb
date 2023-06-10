<?php

defined( 'KDB_VERSION' ) || define( 'KDB_VERSION', wp_get_theme()->get( 'Version' ) );
defined( 'KDB_DOMAIN' ) || define( 'KDB_DOMAIN', 'kdb' );

/**
 * KDB Theme setup
 *
 * @return void
 */
function kdb_setup(): void {

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'automatic-feed-links' );

	$menus = [
		'primary'   => __( 'Top navigation menu', KDB_DOMAIN ),
		'secondary' => __( 'Footer links', KDB_DOMAIN ),
		'footer_1'  => __( 'Footer #1 menu', KDB_DOMAIN ),
		'footer_2'  => __( 'Footer #2 menu', KDB_DOMAIN ),
		'footer_3'  => __( 'Footer #3 menu', KDB_DOMAIN ),
	];

	register_nav_menus( $menus );
}

function kdb_register_styles(): void {
	global $version;
	wp_enqueue_style( 'kdb-style', get_template_directory_uri() . '/assets/css/style.css', [ 'kdb-style-semantic' ], KDB_VERSION );
	wp_enqueue_style( 'kdb-style-category-slug-colors', get_template_directory_uri() . '/assets/css/category-slug-colors.css', [ 'kdb-style' ], KDB_VERSION );
	wp_enqueue_style( 'kdb-style-semantic', 'https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css', [], '2.9.2' );
}

function kdb_register_scripts(): void {
	wp_enqueue_script( 'kdb-script', get_template_directory_uri() . '/assets/js/main.js', [], KDB_VERSION, TRUE );
}

if ( ! function_exists( 'kdb_the_posts_navigation' ) ) {
	function kdb_the_posts_navigation(): void {
		the_posts_pagination(
			[
				'before_page_number' => esc_html__( 'Page', KDB_DOMAIN ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? '>>' : '<<',
					wp_kses(
						__( 'Newer <span class="nav-short">posts</span>', KDB_DOMAIN ),
						[
							'span' => [
								'class' => [],
							],
						]
					)
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					wp_kses(
						__( 'Older <span class="nav-short">posts</span>', KDB_DOMAIN ),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					is_rtl() ? '<<' : '>>'
				),
			]
		);
	}
}

if ( ! function_exists( 'kdb_side_menu_render' ) ) {
	function kdb_side_menu_render(): void {
		$parents = $childrens = [];
		foreach ( get_categories() as $category ) {
			! $category->parent ? $parents[] = $category : $childrens[] = $category;
		}
		if ( $parents ) {
			echo '<div class="ui vertical menu border-radius-0 border-1 inverted">';
			foreach ( $parents as $parent ) { ?>
                <div class="ui item">
                    <div class="header title-op-70"><?= $parent->name ?></div>
                    <div class="menu">
						<?php foreach ( $childrens as $children ) {
							if ( $children->parent === $parent->cat_ID ) { ?>
                                <a class="ui item"
                                   href="<?= get_category_link( $children->cat_ID ) ?>"><?= $children->name ?>
                                    <span class="ui <?= $children->slug ?> mini label"><?= $children->count ?></span>
                                </a>
							<?php }
						} ?>
                    </div>
                </div>
			<?php } ?>
            </div>
			<?php
		} else {
			echo 'No categories';
		}
	}
}

if ( ! function_exists( 'kdb_render_archive_taxonomy' ) ) {
	/**
	 * @throws \Exception
	 */
	function kdb_render_archive_taxonomy( WP_Term $post ): ?string {
		return match ( $post->taxonomy ) {
			'post_tag' => 'Tag',
			'category' => 'Category',
			default => throw new Exception( 'Taxonomy: Not implemented: ' . $post->taxonomy )
		};
	}
}

if ( ! function_exists( 'kdb_render_archive_title' ) ) {
	function kdb_render_archive_title( WP_Term $post ): ?string {
		return $post->name ?? NULL;
	}
}

if ( ! function_exists( 'kdb_render_archive_description' ) ) {
	function kdb_render_archive_description( WP_Term $post ): ?string {
		if ( ! empty( $post->description ) ) {
			return $post->description;
		} else {
			if ( $post->taxonomy === 'post_tag' ) {
				$get_category_by_slug = get_category_by_slug( $post->slug );

				return $get_category_by_slug->description ?? NULL;
			}
		}

		return NULL;
	}
}

if ( ! function_exists( 'kdb_css_class_exists' ) ) {
	function kdb_css_class_exists( $class, $path = __DIR__ . '/assets/css/', $file = 'category-slug-colors.css' ): bool|int {
		$filePath     = $path . $file;
		$fileContents = file_get_contents( $filePath );
		$pattern      = '/' . preg_quote( $class, '/' ) . '/';

		return preg_match( $pattern, $fileContents );
	}
}

if ( ! function_exists( 'kdb_get_random_category_with_parent' ) ) {
	function kdb_get_random_category_with_parent() {
		$random_categories = get_categories();
		$filteredObjects   = array_values( array_filter( $random_categories, function ( $obj ) {
			return $obj->parent !== 0;
		} ) );

//        $class_exists = kdb_css_class_exists('.ui.' . $)

		return $filteredObjects[ rand( 0, sizeof( $filteredObjects ) - 1 ) ];
	}
}

add_action( 'after_setup_theme', 'kdb_setup' );
add_action( 'wp_enqueue_scripts', 'kdb_register_styles' );
add_action( 'wp_enqueue_scripts', 'kdb_register_scripts' );