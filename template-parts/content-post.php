<tr>
    <td class="collapsing"><?php echo get_the_date(); ?> :: <?php echo get_the_time(); ?></td>
    <td style="display: block">
        <a href="<?= get_permalink() ?>" class="inversed" style="display: block">
			<?php
			foreach ( get_the_category( get_the_ID() ) as $category ) {
				if ( $category->parent ) {
					echo '<span class="ui ' . $category->slug . ' text"> [' . $category->slug . '] </span>';
				}
			}
			?> <?= the_title() ?>
        </a>
    </td>
    <td class="collapsing center aligned"><?= get_the_author() ?></td>
    <td class="collapsing right aligned"><?php try {
			if ( ! function_exists( 'upv_get_post_view_count' ) ) {
				throw new Exception( 'Function does not exist' );
			}

			echo upv_get_post_view_count();
		} catch ( Exception $e ) {
			echo 0;
		} ?></td>
</tr>
