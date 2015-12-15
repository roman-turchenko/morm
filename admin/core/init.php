<?
    include('constants.php'); // settings constants
    include('functions.php'); // functions

    // save computed controller an action names
    classModel::$controller = $controller;
	classModel::$action     = $action;

    // define executed class name and method
    $controller .= 'Controller';
	$action     .= 'Action';

    // if can't find controller file - go 404
    if( !file_exists(CONTEROLLERS_DIR.'/'.$controller.'.php') ) _404();

    //  init controller and execute action
	if( !method_exists($obj = new $controller(), $action) ) _404();
	else
		$obj->$action();
?>