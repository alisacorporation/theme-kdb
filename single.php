<?php get_header(); ?>
    <div class="ui main text container">
        <div class="ui grid">
            <div class="thirteen wide column custom-x-grid-padding-table-posts">
				<?php
				if ( have_posts() ) { ?>

					<?php while ( have_posts() ) {
						the_post();
						?>
                        <div class="ui medium header inverted">
							<?php the_title() ?>
                        </div>
                        <div class="ui label">
                            <i class="clock icon"></i>
							<?php the_date();
							echo ' :: ';
							the_time(); ?>
                        </div>
                        <div class="ui label">
                            <i class="eye outline icon"></i> <?= upv_get_post_view_count() ?>
                        </div>
                        <div class="ui label">
                            <i class="user icon"></i> <?= get_the_author() ?>
                        </div>
                        <div class="ui divider"></div>
                        Categories: <?php the_category( ', ' ); ?>
                        <div class="ui divider"></div>
						<?php
						$tags = get_the_tags();
						if ( $tags ) {
							the_tags(); ?>
                            <div class="ui divider"></div>
						<?php }
						get_template_part( 'template-parts/content', 'article' );
					}
				}
				?>
            </div>
            <div class="three wide column custom-x-grid-padding-side-menu">
				<?php kdb_side_menu_render(); ?>
            </div>
        </div>
    </div>
<?php get_footer();
