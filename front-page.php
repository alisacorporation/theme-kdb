<?php get_header(); ?>
    <!-- Start main container -->
    <div class="ui main text container">
        <div class="ui grid">
            <div class="thirteen wide column custom-x-grid-padding-table-posts">
				<?php
				if ( have_posts() ) { ?>
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
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', 'post' );
					}

					} else {
						get_template_part( 'template-parts/no', 'content' );
					} ?>
                    </tbody>
                </table>
            </div>
            <div class="three wide column custom-x-grid-padding-side-menu">
				<?php kdb_side_menu_render(); ?>
            </div>
        </div>
    </div>
<?php get_footer();
