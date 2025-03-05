<?php
/**
 * PHPUnit bootstrap file.
 *
 * @package As_Action_Scheduler
 */

 
define( 'ROOT', __DIR__ . DIRECTORY_SEPARATOR .".." );
require_once ROOT . "DIRECTORY_SEPARATOR" . "vendor/autoload.php";
// Set tests directory to the custom location we just set up
$_tests_dir = '/home/deep/projects/WP_Test_Setup/wordpress-tests-lib';

// Sets path to polyfill
define( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH', ROOT .'/vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php' );


// Forward custom PHPUnit Polyfills configuration to PHPUnit bootstrap file.
$_phpunit_polyfills_path = getenv( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH' );
if ( false !== $_phpunit_polyfills_path ) {
	define( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH', $_phpunit_polyfills_path );
}

if ( ! file_exists( "{$_tests_dir}/includes/functions.php" ) ) {
	echo "Could not find {$_tests_dir}/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL;
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once "{$_tests_dir}/includes/functions.php";

/**
 * Manually load the plugin being tested.
 */
function manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/as-action-scheduler.php';
}
tests_add_filter( 'muplugins_loaded', 'manually_load_plugin' );

// Start up the WP testing environment.
require "{$_tests_dir}/includes/bootstrap.php";