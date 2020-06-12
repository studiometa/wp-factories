<?php
/**
 * @package  studiometa/wp-factories
 */

defined( 'ABSPATH' ) || exit;

// Define STUDIOMETA_WP_FACTORIES_PACKAGE_FILE.
if ( ! defined( 'STUDIOMETA_WP_FACTORIES_PACKAGE_FILE' ) ) {
	define( 'STUDIOMETA_WP_FACTORIES_PACKAGE_FILE', __FILE__ );
}

/**
 * Currently package version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'STUDIOMETA_WP_FACTORIES_VERSION', '1.0.0' );

// Load factories files.
require plugin_dir_path( __FILE__ ) . 'src/class-post-type.php';
