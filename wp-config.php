<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_HOME', 'http://instituto-junguiano.local' );

define( 'WP_SITEURL', 'http://instituto-junguiano.local' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GvfYuKzQbemiZTIVsc1mIUBsxxtYDhWeWSHL2ZQDowL+khEYStmPywxfh9ICGm51rJHc+4eBoxv7YJ0Nw9u2vw==');
define('SECURE_AUTH_KEY',  '6XhLnKaNNwyDox6rbQhQvRRmfUKJH+SNTTevYPh4qnLcZlVvWY9Jt31mW8pIO0lLAVjYXK5cNrvlwfasiOnE9Q==');
define('LOGGED_IN_KEY',    'dtfgCSGjDWgewzmiel/DglnyTR1tHGfe6jZshaw+Rttkh3AFQyJGeiAF2cF/s2VrmoyusLdvAapk1ED5eKVYAQ==');
define('NONCE_KEY',        'g3PKbAk/AnvPG5qEE4ZfYEDx4w3PqYxNiksWroxPLAjhJk9Bd9WOyq1p6/rmOZmNoOktxFvOjnnuNYCV5pad1Q==');
define('AUTH_SALT',        'sJ8QWqCHnrHPl1YQxgASCCl8XFKsH6mkmqqx0bv6jemIUqyHv9B3sJjwLWU6cizWIS2dKWh0jifmg6SUlbfmZg==');
define('SECURE_AUTH_SALT', 'gVnf8RGQrpgeVYoJrXqmtZWmkmUv6rq8/iP1qClLOEyrzsc31HjWhbkOuTJP9p56G+0RqLzVwfOAypQyKtfJfQ==');
define('LOGGED_IN_SALT',   'xaWnsrXWdwI+sv1mypZynY6L6LWoSekhhJaEnCBziyuw8hRqZP0nZDdcdA9SVa+klH934ZcuD5+IIEsK/RP9zA==');
define('NONCE_SALT',       'ho/DSCMQgDvN49CJpnkz3N2/OZahj1iohIXwk276whO4WY1VP2RWkcLxk765MXpKKR8RAETWey+7PTCW+NBj+g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
