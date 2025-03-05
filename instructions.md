# Instruction for installing wp-test-lib

## Modification to bin/install-wp-tests.sh
 Set the installation path
TMPDIR="/home/deep/projects/WP_Test_Setup"

## Modification fo the tests/bootstrap.php
 Set the path to the directory where wordpress-tests-lib resides (Inside the path set to the TMPDIR)
$_tests_dir = '/home/deep/projects/WP_Test_Setup/wordpress-tests-lib';
