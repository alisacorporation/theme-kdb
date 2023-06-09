<?php
get_header();
?>
    <div class="ui main text container">
        <div class="ui grid">
            <div class="thirteen wide column custom-x-grid-padding-table-posts">
				<?php if ( have_posts() ) : ?>
					<?php
					$post = get_queried_object();
					try {
						$taxonomy    = kdb_render_archive_taxonomy( $post );
						$title       = kdb_render_archive_title( $post );
						$description = kdb_render_archive_description( $post );
						$css_slug    = kdb_css_class_exists( $post->slug ) ? $post->slug : kdb_get_random_category_with_parent()->slug;

						if ( $description ) { ?>
                            <div class="ui <?= $css_slug . ' ' ?? '' ?>segment desc-bg fc-imp"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
							<?php
							printf( "<span class='ui medium text'>%s: <span class='%s'>%s</span>, results: %d</span>\n", $taxonomy, $css_slug, $title, $wp_query->found_posts );
						}
					} catch ( Exception $e ) {
						exit( $e->getMessage() );
					}
					?>
                    <table class="ui table striped black inverted very compact border-radius-0 border-1 selectable celled unstackable">
                        <thead>
                        <tr>
                            <th class="center aligned">Date</th>
                            <th>Name</th>
                            <th class="center aligned">Author</th>
                            <th class="center aligned">Views</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<?php get_template_part( 'template-parts/content', 'post' ); ?>
						<?php endwhile; ?>

                        </tbody>
                    </table>
					<?php kdb_the_posts_navigation(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content/content-none' ); ?>
				<?php endif; ?>
            </div>
            <div class="three wide column custom-x-grid-padding-side-menu">
				<?php kdb_side_menu_render() ?>
            </div>
        </div>
    </div>
<?php
get_footer();
