<?php
/*
 * Please don't edit this file.  Constants in this file that are set with getenv() or getenv_default() can
 * be overridden by setting the appropriate values in your environment.  This means that you can set these values
 * in a number of different ways:
 *
 * 	1) Export the variable in *nix using your .bash_profile file
 * 	2) Set the variables in your httpd-vhosts.conf
 * 	3) Set the variables in your .htaccess file, which would ideally reside one level above the project repo.
 *
 * The last two methods above assume that you are using Apache, but each system should have its own way of allowing
 * you to set environmental variables (e.g. php-fpm.conf in nginx ).  To set variables in Apache's virtual hosts
 * config or in an .htaccess file, use this syntax: SetEnv ENV_NAME env_value
 */

/**
 * Fetches an environment variable and returns the provided default value if not set.
 *
 * @param string $name
 * @param mixed $default
 * @return mixed
 */
function getenv_default ( $name, $default ) {
	$value = getenv( $name );
	return $value ? $value : $default;
}

/*
 * Optionally allow a custom wp-config.php file just outside of this directory to be loaded. This option is for
 * users who are more comfortable with a typical php configuration file.
 */
if( file_exists( dirname( dirname( __FILE__ ) ) . '/wp-config.php' ) ) {
	include( dirname( dirname( __FILE__ ) ) . '/wp-config.php' );
}

// Set the current directory as the site root
define( 'SITE_ROOT', dirname( __FILE__ ) );

// Directory Names
define( 'WP_ROOT_DIRNAME', 'cms' );
define( 'WP_CONTENT_DIRNAME', 'content' );

// Database Credentials (required)
if( ! defined('DB_NAME') )
	define( 'DB_NAME', getenv( 'DB_NAME' ) );
if( ! defined('DB_USER') )
	define( 'DB_USER', getenv( 'DB_USER' ) );
if( ! defined('DB_PASSWORD') )
	define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );

// Database Info (defaults - can be overridden)
if( ! defined('DB_HOST') )
	define( 'DB_HOST', getenv_default( 'DB_HOST', 'localhost' ) );
if( ! defined('DB_CHARSET') )
	define( 'DB_CHARSET', getenv_default( 'DB_CHARSET', 'utf8' ) );
if( ! defined( 'DB_COLLATE' ) )
	define( 'DB_COLLATE', (string) getenv( 'DB_COLLATE' ) );
if( ! defined( 'DB_TABLE_PREFIX' ) )
	define( 'DB_TABLE_PREFIX', getenv_default('DB_TABLE_PREFIX', 'wp_') );

// Security Keys (highly recommended)
if( ! defined( 'AUTH_KEY' ) )
	define( 'AUTH_KEY', getenv( 'AUTH_KEY' ) );
if( ! defined( 'SECURE_AUTH_KEY' ) )
	define( 'SECURE_AUTH_KEY', getenv( 'SECURE_AUTH_KEY' ) );
if( ! defined( 'LOGGED_IN_KEY' ) )
	define( 'LOGGED_IN_KEY', getenv( 'LOGGED_IN_KEY' ) );
if( ! defined( 'NONCE_KEY' ) )
	define( 'NONCE_KEY', getenv( 'NONCE_KEY' ) );
if( ! defined( 'AUTH_SALT' ) )
	define( 'AUTH_SALT', getenv( 'AUTH_SALT' ) );
if( ! defined( 'SECURE_AUTH_SALT' ) )
	define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
if( ! defined( 'LOGGED_IN_SALT' ) )
	define( 'LOGGED_IN_SALT', getenv( 'LOGGED_IN_SALT' ) );
if( ! defined( 'NONCE_SALT' ) )
	define( 'NONCE_SALT', getenv( 'NONCE_SALT' ) );

// Debugging (don't change for a production site)
if( ! defined( 'WP_DEBUG' ) )
	define( 'WP_DEBUG', getenv( 'WP_DEBUG' ) );
if( ! defined( 'SCRIPT_DEBUG' ) )
	define( 'SCRIPT_DEBUG', getenv( 'SCRIPT_DEBUG' ) );
if( ! defined( 'SAVEQUERIES' ) )
	define( 'SAVEQUERIES', getenv( 'SAVEQUERIES' ) );

// Set the domain name
if( ! defined( 'DOMAIN_NAME' ) )
	define( 'DOMAIN_NAME', getenv( 'HTTP_HOST' ) );

// Determine HTTP protocol
if( ! defined( 'IS_SSL' ) )
	define( 'IS_SSL', getenv( 'HTTPS' ) || '443' == getenv( 'SERVER_PORT' ) );
define( 'URI_SCHEME', IS_SSL ? 'https://' : 'http://' );

// Set front end URL
define( 'WP_HOME', URI_SCHEME . DOMAIN_NAME );

// Set URL where WordPress files are located
define( 'WP_SITEURL', WP_HOME . '/' . WP_ROOT_DIRNAME );

// Custom content directory
define( 'WP_CONTENT_DIR', SITE_ROOT . '/' . WP_CONTENT_DIRNAME );
define( 'WP_CONTENT_URL', WP_HOME . '/' . WP_CONTENT_DIRNAME );

// Language Translation
if( ! defined( 'WPLANG' ) )
	define( 'WPLANG', (string) getenv( 'WPLANG' ) );

// Enable/Disable the WordPress theme and plugin editors
if( ! defined( 'DISALLOW_FILE_EDIT' ) )
	define( 'DISALLOW_FILE_EDIT', getenv_default( 'DISALLOW_FILE_EDIT', true ) );

// Set the database table prefix
$table_prefix = DB_TABLE_PREFIX;

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', SITE_ROOT . '/' . WP_ROOT_DIRNAME . '/' );
}

require_once( ABSPATH . 'wp-settings.php' );