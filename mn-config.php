<?php
/**
 * Base configuration for menu.
 *
 * This file contains following configuration(s):
 *		MySQL - databse username and password etc.
 *		Database table prefix used when creating tables
 *
 * This file will be loaded by mn-load.php
 * 
 * @package  menu
 * @author  horvo
 */

/** MySQL settings */
/** Database name used for menu */
define('DB_NAME', 'menu');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Deatabase hostname */
define('DB_HOST', 'localhost');

/** Database charset */
define('DB_CHARSET', 'utf8');

/** Restaurant and User Tables*/
define('REST_TABLE', 'restaurant');
define('USER_TABLE', 'user');
define('MENU_TABLE', 'menu');
define('ITEM_TABLE', 'menu_item');

/** Website root */
define('SITE_ROOT', '/Applications/XAMPP/xamppfiles/htdocs/open-menu/menu/');

/** Directory for images uploaded by user */
define('DIR_UPLOAD', SITE_ROOT.'image/upload/');
define('DIR_AVATAR', SITE_ROOT.'image/avatar/');
?>