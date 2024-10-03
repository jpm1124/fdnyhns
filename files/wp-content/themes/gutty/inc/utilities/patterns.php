<?php
add_action( 'init', __NAMESPACE__ . '\gutty_register_pattern_categories', 9 );

/**
 * Register pattern categories.
 */
function gutty_register_pattern_categories() {
	if ( ! function_exists( 'register_block_pattern_category' ) ) {
		return;
	}

	$block_pattern_categories = [
		'gutty/header-navgiation' => [
			'label' => __( 'Header navigation', 'gutty' ),
		],
		'gutty/header-sections' => [
			'label' => __( 'Header sections', 'gutty' ),
		],
		'gutty/hero' => [
			'label' => __( 'Hero', 'gutty' ),
		],
		'gutty/careers' => [
			'label' => __( 'Careers', 'gutty' ),
		],
		'gutty/contact' => [
			'label' => __( 'Contact', 'gutty' ),
		],
		'gutty/cta' => [
			'label' => __( 'Call To Action (CTA)', 'gutty' ),
		],
		'gutty/faq' => [
			'label' => __( 'FAQ', 'gutty' ),
		],
		'gutty/forms' => [
			'label' => __( 'Forms', 'gutty' ),
		],
		'gutty/features' => [
			'label' => __( 'Features', 'gutty' ),
		],
		'gutty/metrics' => [
			'label' => __( 'Metrics', 'gutty' ),
		],
		'gutty/pages' => [
			'label' => __( 'Pages', 'gutty' ),
		],
		'gutty/pricing-table' => [
			'label' => __( 'Pricing table', 'gutty' ),
		],
		'gutty/quotes' => [
			'label' => __( 'Quotes', 'gutty' ),
		],
		'gutty/social-proofs' => [
			'label' => __( 'Social proofs', 'gutty' ),
		],
		'gutty/team' => [
			'label' => __( 'Team', 'gutty' ),
		],
		'gutty/testimonials' => [
			'label' => __( 'Testimonials', 'gutty' ),
		],
		'gutty/footer' => [
			'label' => __( 'Footer', 'gutty' ),
		],
	];

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
