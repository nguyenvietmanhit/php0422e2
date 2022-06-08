<?php
require_once 'models/Model.php';
//models/Category.php
 class Category extends Model {
     public function insertData($name) {
         // B1: Viết truy vấn:
         $sql_insert = "INSERT INTO categories(name)
            VALUES(:name)";
         // B2: Cbi obj truy vấn:
         $obj_insert = $this->connection->prepare($sql_insert);
         // B3: Tạo mảng:
         $inserts = [
             ':name' => $name
         ];
         // B4: Thực thi: INSERT trả về boolean
         $is_insert = $obj_insert->execute($inserts);
         return $is_insert;
     }
 }