<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'category';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = ucfirst($controller);
$controller .= "Controller";
$controller_path = "controllers/$controller.php";
if (!file_exists($controller_path)){
    die("Trang bạn tìm không tồn tại");
}
require_once "$controller_path";
$obj = new $controller();
if (!method_exists($obj,$action)){
    die("Phương thức $action không tồn tại trong class $controller");
}
$obj->$action();
?>