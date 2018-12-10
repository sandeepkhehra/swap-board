<?php

define('SB_DIR', plugin_dir_path(SB_ROOT_FILE));
define('SB_URL', plugin_dir_url(SB_ROOT_FILE));
define('DS', DIRECTORY_SEPARATOR);
define('SB_VIEWS_URL', SB_URL . 'resources/views/');
define('SB_VIEWS_DIR', SB_DIR . 'resources' . DS . 'views' . DS);
define('SB_VIEWS_EXT', '.view.php');
define('SB_DB_DIR', SB_DIR . 'framework' . DS . 'db' . DS);
define('PLUGIN_LONG_NAME', 'Swap Board');
define('PLUGIN_SHORT_NAME', 'Swap');
define('PLUGIN_SLUG', 'sboard');
define('PLUGIN_PAGE_TITLE', PLUGIN_LONG_NAME . ' &mdash;');