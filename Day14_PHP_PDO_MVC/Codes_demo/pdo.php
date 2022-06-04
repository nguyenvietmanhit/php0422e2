<?php
//pdo.php
// Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
// - PHP Data Object, là thư viện cho phép kết nối nhiều CSDL
//khác nhau từ PHP
// - Các website đều ưu tiên dùng PDO để kết nối CSDL
// - PDO hoàn toàn dựa trên cú pháp của OOP
// - MẶc định XAMPP cài sẵn và enable PDO
// + Code khởi tạo kết nối:
// CSDL: php0422e2
// Chuỗi kết nối: Data Source Name:
const DB_DSN = "mysql:host=localhost;dbname=php0422e2;port=3306";
// Username login vào CSDL
const DB_USERNAME = 'root';
//Password login vào CSDL
const DB_PASSWORD = '';
try {
    $connection = new PDO(DB_DSN,
        DB_USERNAME, DB_PASSWORD);
} catch (Exception $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo 'Kết nối CSDL thành công';