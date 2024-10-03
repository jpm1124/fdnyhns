<?php
add_action( 'after_setup_theme', __NAMESPACE__ . '\gutty_init' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\gutty_enqueue_styles' );
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\gutty_enqueue_admin_styles' );

/**
 * Init Gutty theme.
 */
function gutty_init() {
	// Enqueue editor styles and fonts.
	add_editor_style( 'style.css' );

	// Remove core block patterns.
	remove_theme_support( 'core-block-patterns' );
}

/**
 * Enqueue styles.
 */
function gutty_enqueue_styles() {
	$handle = sanitize_title( __NAMESPACE__ );
	if ( ! wp_style_is( $handle, 'enqueued' ) ) {
		wp_enqueue_style(
			$handle,
			GUTTY_DIR_URL . '/style.css',
			[],
			defined( 'GUTTY_VERSION' ) ? GUTTY_VERSION : false
		);
	}
}

/**
 * Enqueue admin styles.
 */
function gutty_enqueue_admin_styles() {
	$screen = get_current_screen();
	if ( $screen && in_array( $screen->id, [ 'edit-post', 'edit-page' ], true ) ) {
		$handle = sanitize_title( __NAMESPACE__ . '-admin' );
		if ( ! wp_style_is( $handle, 'enqueued' ) ) {
			wp_enqueue_style(
				$handle,
				GUTTY_DIR_URL . '/assets/css/admin-style.css',
				[],
				defined( 'GUTTY_VERSION' ) ? GUTTY_VERSION : false
			);
		}
	}
}
