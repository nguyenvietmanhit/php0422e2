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