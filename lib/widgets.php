<?php
/**
 * Declaring widgets
 *
 * @package _themename
 */



if ( ! function_exists( '_themename_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function _themename_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', '_themename' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', '_themename' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Left Sidebar', '_themename' ),
				'id'            => 'left-sidebar',
				'description'   => __( 'Left sidebar widget area', '_themename' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		/**
		 * Generate dynamic sidebars for footers from user input
		 */
		$footer_layout = '3,3,3,3';
		$columns = explode(',', $footer_layout);
		

		foreach( $columns as $index => $column) {
			register_sidebar(
				array(
					'name'          => sprintf( __( 'Footer Sidebars Column %s', '_themename' ), $index+1 ),
					'id'            => 'footer-sidebar-' . ($index + 1),
					'description'   => __( 'Footer widgets area', '_themename' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}//foreach

		/**
		 * see /inc/helpers to get the function _themename_any_widget_active()
		 */

	}
}
add_action( 'widgets_init', '_themename_widgets_init' );