<?php
$kdb_uid        = wp_unique_id( 'search-form-' );
$kdb_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form class="ui transparent inverted icon input" role="search" <?php echo $kdb_aria_label; ?> method="get"
      action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <i class="search icon"></i>
    <label for="<?php echo esc_attr( $kdb_uid ); ?>"></label>
    <input type="search" id="<?php echo esc_attr( $kdb_uid ); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
</form>
