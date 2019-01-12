<?php
/**
 * Root related.
 *
 */
define('SB_DIR', plugin_dir_path(SB_ROOT_FILE));
define('SB_URL', plugin_dir_url(SB_ROOT_FILE));
define('DS', DIRECTORY_SEPARATOR);
define('SB_VIEWS_URL', SB_URL . 'resources/views/');
define('SB_VIEWS_DIR', SB_DIR . 'resources' . DS . 'views' . DS);
define('SB_VIEWS_EXT', '.view.php');
define('SB_INCL_EXT', '.inc.php');
define('SB_FW_DIR', SB_DIR . 'framework' . DS);
define('SB_FW_URL', SB_URL . 'framework' . DS);
define('SB_ASSETS_DIR', SB_FW_DIR . 'assets' . DS);
define('SB_ASSETS_URL', SB_FW_URL . 'assets' . DS);
define('SB_DB_DIR', SB_FW_DIR . 'db' . DS);

/**
 * Plugin related.
 *
 */
define('PLUGIN_LONG_NAME', 'Swap Board');
define('PLUGIN_SHORT_NAME', 'Swap');
define('PLUGIN_SLUG', 'sboard');
define('PLUGIN_PAGE_TITLE', PLUGIN_LONG_NAME . ' &mdash; ');
define('PLUGIN_SETTINGS_KEY', PLUGIN_SLUG . '_settings');
define('PLUGIN_ADMIN_LAND_PAGE', !empty(get_option(PLUGIN_SETTINGS_KEY)) ? get_option(PLUGIN_SETTINGS_KEY)['landing'] : '');
define('PLUGIN_ADMIN_DASH_PAGE', !empty(get_option(PLUGIN_SETTINGS_KEY)) ? get_option(PLUGIN_SETTINGS_KEY)['userDash'] : '');

/**
 * Form related.
 *
 */
define( 'SB_FORM_NONCE', PLUGIN_SLUG . '_nonce' );
define( 'SB_SESS_KEY', 'swapBoardSess' );

/**
 * Site related.
 */
define( 'SB_SITE_NAME', 'SwapBoard' );
define( 'SB_SITE_URL', 'localhost' );
