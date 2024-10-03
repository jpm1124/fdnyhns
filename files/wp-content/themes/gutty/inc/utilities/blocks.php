<?php
add_action( 'init', __NAMESPACE__ . '\gutty_register_block_styles' );
add_action( 'init', __NAMESPACE__ . '\gutty_enqueue_custom_block_css' );
add_filter( 'get_block_templates', __NAMESPACE__ . '\gutty_remove_templates', 10, 3 );

/**
 * Add block style variations.
 */
function gutty_register_block_styles() {
	$block_styles = [
		'core/button' => [
			'secondary-button' => __( 'Secondary', 'gutty' ),
		],
		'core/image' => [
			'box-shadow' => __( 'Box shadow', 'gutty' )
		],
		'core/video' => [
			'box-shadow' => __( 'Box shadow', 'gutty' ),
		],
	];

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				[
					'name'  => $style_name,
					'label' => $style_label,
				]
			);
		}
	}
}

/**
 * Load custom block styles only when the block is used.
 */
function gutty_enqueue_custom_block_css() {
	// Scan styles folder to locate block styles.
	$files = glob( GUTTY_DIR_PATH . '/assets/css/*.css' );

	foreach ( $files as $file ) {

		// Get the filename and core block name.
		$filename   = basename( $file, '.css' );
		$block_name = str_replace( 'core-', 'core/', $filename );

		wp_enqueue_block_style(
			$block_name,
			[
				'handle' => "gutty-block-{$filename}",
				'src'    => get_theme_file_uri( "assets/css/{$filename}.css" ),
				'path'   => get_theme_file_path( "assets/css/{$filename}.css" ),
			]
		);
	}
}

/**
 * Remove unused templates from editor.
 *
 * @param array|null $query_result
 * @return array
 */
function gutty_remove_templates( ? array $query_result ): array {
	$woocommerce = class_exists( 'WooCommerce' );

	foreach ( $query_result as $index => $wp_block_template ) {
		$slug = $wp_block_template->slug;

		if ( ! $woocommerce && str_contains( $slug, 'product' ) ) {
			unset( $query_result[ $index ] );
			continue;
		}
	}

	return $query_result;
}
