<?php get_header(); ?>
    <div class="ui grid">
		<?php
		if ( have_posts() ) : ?>
            <div class="thirteen wide column custom-x-grid-padding-table-posts">
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
					} ?>
                    </tbody>
                </table>
            </div>
		<?php endif; ?>
        <div class="five column custom-x-grid-padding-side-menu">
            <div class="ui vertical menu border-radius-0 border-1 inverted">
                <div class="item">
                    <div class="header">OS</div>
                    <div class="menu">
                        <a class="item">Linux</a>
                        <a class="item">MacOS</a>
                        <a class="item">Windows</a>
                    </div>
                </div>
                <div class="item">
                    <div class="header">CMS</div>
                    <div class="menu">
                        <a class="item">Wordpress</a>
                    </div>
                </div>
                <div class="item">
                    <div class="header">Community dashboard</div>
                    <div class="menu">
                        <a class="item">IPB</a>
                        <a class="item">phpBB</a>
                        <a class="item">SMF</a>
                    </div>
                </div>
                <div class="item">
                    <div class="header">Hosting</div>
                    <div class="menu">
                        <a class="item">VPS</a>
                        <a class="item">VDS</a>
                        <a class="item">Dedicated</a>
                    </div>
                </div>
                <div class="item">
                    <div class="header">Support</div>
                    <div class="menu">
                        <a class="item">E-mail Support</a>
                        <a class="item">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
