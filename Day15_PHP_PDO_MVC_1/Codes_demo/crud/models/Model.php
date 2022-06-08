<?php
//models/Model.php
// Cần nhúng file Database.php vào, trong mô hình MVC khi nhúng
//file luôn cần phải tư duy là đứng ở file index gốc của ứng
//dụng để nhúng file
require_once 'configs/Database.php';

// - Là class model cha, chứa TT/PT dùng chung cho các model con
//kế thừa từ nó
// - Khai báo 1 thuộc tính kết nối dùng chung cho mọi model con
class Model {
    public $connection;
    public function __construct() {
        try {
            $this->connection = new PDO(Database::DB_DSN,
                Database::DB_USERNAME,
                Database::DB_PASSWORD);
        } catch (Exception $e) {
            die("Lỗi kết nối:" . $e->getMessage());
        }
    }
}