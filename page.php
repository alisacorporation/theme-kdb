<?php get_header(); ?>
    <!-- Start main container -->
    <div class="ui main text container">
        <div class="ui grid">
            <div class="thirteen wide column custom-x-grid-padding-table-posts">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						?>
                        <div class="ui medium header inverted">
							<?php the_title() ?>
                        </div>
                        <div class="ui label">
                            <i class="clock icon"></i>
							<?php
							the_date(); echo ' :: '; the_time();
							?>
                        </div>
                        <div class="ui label">
                            <i class="user icon"></i> <?= get_the_author() ?>
                        </div>
						<?php
						the_tags();
						?>
                        <div class="ui divider"></div>
						<?php
						get_template_part( 'template-parts/content', 'article' );
					}
				}
				?>
            </div>
            <div class="three wide column custom-x-grid-padding-side-menu">
				<?php kdb_side_menu_render() ?>
            </div>
        </div>
    </div>
<?php get_footer();
