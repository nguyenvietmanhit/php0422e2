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

     public function listData() {
         //B1:
         $sql_select_all = "SELECT * FROM categories";
         //B2:
         $obj_select_all = $this->connection->prepare($sql_select_all);
         //B3: Bỏ qua vì câu truy vấn ko có tham số
         //B4:
         $obj_select_all->execute();
         //B5:
         $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
         return $categories;
     }

     public function getById($id) {
         //B1
         $sql_select_one = "SELECT * FROM categories WHERE id=:id";
         //B2:
         $obj_select_one = $this->connection->prepare($sql_select_one);
         //B3:
         $selects = [
             ':id' => $id
         ];
         //B4:
         $obj_select_one->execute($selects);
         //B5:
         $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
         return $category;
     }

     public function updateData($name, $id) {
         //B1:
         $sql_update = "UPDATE categories SET name=:name
                        WHERE id=:id";
         //B2:
         $obj_update = $this->connection->prepare($sql_update);
         //B3:
         $updates = [
             ':name' => $name,
             ':id' => $id
         ];
         //B4:
         return $obj_update->execute($updates);
     }

     public function deleteData($id) {
         //B1:
         $sql_delete = "DELETE FROM categories WHERE id=:id";
         //B2:
         $obj_delete = $this->connection->prepare($sql_delete);
         //B3:
         $deletes = [
             ':id' => $id
         ];
         //B4:
         return $obj_delete->execute($deletes);
     }
 }