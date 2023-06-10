<?php

class Fomantic_Walker_Nav_Menu extends Walker_Nav_Menu {

	// Add custom classes to menu items
	function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
		$classes   = empty( $item->classes ) ? [] : (array) $item->classes;
		$classes[] = 'item';              // Add Fomantic-UI class to each menu item

		$output .= '<a class="' . esc_attr( implode( ' ', $classes ) ) . '" href="' . esc_attr( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
	}
}
