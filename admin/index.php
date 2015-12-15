<?
/**
 * Start point
 */
//session_set_cookie_params('', APP_ROOT_URL, $_SERVER['SERVER_NAME'], false, true);
session_start();

// define controller and action
$controller = isset($_GET['controller']) ? $_GET['controller'] : "main";
$action     = isset($_GET['action']) ? $_GET['action'] : "main";

require( __DIR__ . '/core/init.php' );