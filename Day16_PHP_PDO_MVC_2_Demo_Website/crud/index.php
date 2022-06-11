<?php
// crud/index.php
// File index gốc của ứng dụng
// - Cần phải quy định 1 số chuẩn như cách đặt tên file, cách
//đặt url:
// + Nếu file mà chứa 1 class thì bắt buộc tên file phải trùng
//tên class
// + Mọi url phải có định dạng như sau:
// http://localhost/crud/index.php
// ?controller=<tên-controller>&action=<tên-hành-động>
// VD: http://localhost/crud/index.php
//  ?controller=category&action=create
// VD: http://localhost/crud/index.php
////  ?controller=category&action=update&id=3
// - controller=category -> file CategoryController.php
// - action=create -> lấy tên phương thức trong
// class CategoryController
// - Chức năng chính: phân tích url để lấy ra đc class controller,
// đi gọi phương thức tương ứng của controller đó
// - Mọi request từ user đều phải chạy qua file index gốc này
//đầu tiên
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d-m-Y H:i:s');
// index.php?controller=category&action=create
// - Phân tích url:
$controller = isset($_GET['controller'])
    ? $_GET['controller'] : 'home' ; //category
$action = isset($_GET['action'])
    ? $_GET['action'] : 'index';//create
// - Chuyển đổi controller thành tên file để chuẩn bị nhúng
//file controller: category -> CategoryController
$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
// - Nhúng file controller có ktra tồn tại:
$controller_path = "controllers/$controller.php";
if (!file_exists($controller_path)) {
    die("Trang bạn tìm ko tồn tại");
}
require_once $controller_path;
// - Sau khi nhúng file, tạo obj từ class controler
// tương ứng trong file:
$obj = new $controller(); //$obj = new CategoryController();
// - Dùng obj sinh ra truy cập phương thức trong class controller
if (!method_exists($obj, $action)) {
    die("Class $controller ko tồn tại phương thức $action");
}
$obj->$action();
//index.php?controller=category&action=create
