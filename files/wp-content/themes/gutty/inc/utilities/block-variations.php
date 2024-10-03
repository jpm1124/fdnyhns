<?php
add_action( 'init', __NAMESPACE__ . '\gutty_register_block_style_variations' );

function gutty_register_block_style_variations() {
	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	$block_style_variations = [
		'core/code' => [
			[
				'name' => 'light',
				'label' => __( 'Light', 'gutty' ),
			],
		],
		'core/details' => [
			[
				'name' => 'warning',
				'label' => __( 'Warning', 'gutty' ),
			],
			[
				'name' => 'success',
				'label' => __( 'Success', 'gutty' ),
			],
			[
				'name' => 'error',
				'label' => __( 'Error', 'gutty' ),
			],
		],
	];

	foreach ( $block_style_variations as $block => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style(
				$block,
				[
					'name'  => $style['name'],
					'label' => $style['label'],
				]
			);
		}
	}
}