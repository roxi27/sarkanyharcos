<?php
require_once('common/debugger.php');
	
function start_routing() {
    $request_method = $_SERVER['REQUEST_METHOD'];
    $query_string = $_SERVER['QUERY_STRING'];

    $qsarr = explode('&', $query_string);
    $page = trim(array_shift($qsarr), '=');
    if ($page) {
        unset($_GET[$page]);
    } else {
		$page = 'index';
	}

    $method = strtolower($request_method);
    $page_with_method = "{$page}_{$method}";

    $controller_path = __DIR__ . '/controllers/' . $page_with_method . '.php';
    if (file_exists($controller_path)) {
        require $controller_path;
    } else {
        $controller_path = __DIR__ . '/controllers/' . $page . '.php';
        if (file_exists($controller_path)) {
            require $controller_path;
        } else {
            die('Az oldal nem található!');
        }   
    }
}

session_start();

start_routing();
