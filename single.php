<?php get_header(); ?>
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>
        <div class="ui large header inverted">
			<?php the_title() ?>
        </div>
        <div class="ui label">
            <i class="clock icon"></i>
			<?php
			the_date();
			echo ' :: ';
			the_time();
			?>
        </div>
        <div class="ui label">
            <i class="eye outline icon"></i> 23
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
<?php get_footer();
