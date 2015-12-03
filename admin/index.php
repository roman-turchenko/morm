<?
define('APP_ROOT_URL', '/admin');

/**
 * Start point
 */
//session_set_cookie_params('', APP_ROOT_URL, $_SERVER['SERVER_NAME'], false, true);
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : "auth";
$action = isset($_GET['action']) ? $_GET['action'] : "main";

if (!isset($_SESSION['login']) || (bool)$_SESSION['login'] !== true){

    $_SESSION['login']  = false;
    $_SESSION['id_user'] = null;

    $controller = "auth";
    $action = "main";
}

require( __DIR__ . '/core/init.php' );
