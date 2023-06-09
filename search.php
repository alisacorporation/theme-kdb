<?php get_header(); ?>
    <div class="ui main text container wide-container">
        <div class="ui grid">
            <div class="thirteen wide column custom-x-grid-padding-table-posts">
				<?php
				if ( have_posts() ) {
					?>

                    <div class="ui medium header inverted">
						<?php
						printf(
						/* translators: %s: Search term. */
							esc_html__( 'Results for "%s"', KDB_DOMAIN ),
							'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
						);
						?>
                    </div><!-- .page-header -->

                    <span class="ui medium text">
		<?php
		printf(
			esc_html(
			/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					$wp_query->found_posts,
					KDB_DOMAIN
				)
			),
			$wp_query->found_posts
		);
		?>
    </span><!-- .search-result-count -->

					<?php
					if ( have_posts() ) : ?>
                        <table class="ui table striped black inverted very compact border-radius-0 border-1 selectable celled unstackable search-result-padding">
                            <thead>
                            <tr>
                                <th class="center aligned">Date</th>
                                <th>Name</th>
                                <th class="center aligned">Author</th>
                                <th class="center aligned">Views</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							while ( have_posts() ) {
								the_post();
								get_template_part( 'template-parts/content', 'post' );
							} ?>
                            </tbody>
                        </table>
					<?php endif;
					// Previous/next page navigation.
					kdb_the_posts_navigation();
					// If no content, include the "No posts found" template.
				} else { ?>
                    <header class="page-header alignwide">
                        <div class="ui large header inverted">
							<?php
							printf(
							/* translators: %s: Search term. */
								esc_html__( 'Results for "%s"', KDB_DOMAIN ),
								'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
							);
							?>
                        </div>
                    </header><!-- .page-header -->

                    <span class="ui medium text">
		<?php
		printf(
			esc_html(
			/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					0,
					KDB_DOMAIN
				)
			),
			0
		);
		?>
    </span><!-- .search-result-count -->
				<?php } ?>
            </div>
            <div class="three column custom-x-grid-padding-side-menu">
				<?php kdb_side_menu_render() ?>
            </div>
        </div>
    </div>
<?php
get_footer();
