<?php
/**
 * Gutty functions and definitions
 *
 * @link https://guttypress.com
 *
 * @package Gutty
 * @since Gutty 1.0
 */
namespace Gutty;

/**
 * Defines
 */
define( 'GUTTY_VERSION', '1.2' );
define( 'GUTTY_AUTHOR', 'The GuttyPress Team' );
define( 'GUTTY_DIR_PATH', get_template_directory() );
define( 'GUTTY_DIR_URL', get_template_directory_uri() );
define( 'GUTTY_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'GUTTY_ASSETS_DIR', GUTTY_DIR_URL . '/assets' );
define( 'GUTTY_UTILITIES_DIR', GUTTY_PLUGIN_DIR_PATH . 'inc/utilities' );
define( 'GUTTY_PATTERNS_DIR', GUTTY_PLUGIN_DIR_PATH . 'patterns' );
define( 'GUTTY_PARTS_DIR', GUTTY_PLUGIN_DIR_PATH . 'parts' );
define( 'GUTTY_STYLES_DIR', GUTTY_PLUGIN_DIR_PATH . 'styles' );
define( 'GUTTY_TEMPLATES_DIR', GUTTY_PLUGIN_DIR_PATH . 'templates' );

/**
 * Setup Gutty
 */
require_once 'inc/utilities/init.php';
require_once 'inc/utilities/blocks.php';
require_once 'inc/utilities/block-variations.php';
require_once 'inc/utilities/patterns.php';