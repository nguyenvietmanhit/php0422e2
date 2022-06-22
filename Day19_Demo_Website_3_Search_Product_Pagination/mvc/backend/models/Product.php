<?php
//models/Product.php
require_once 'models/Model.php';
class Product extends Model {
    public function getAll($keyword) {
        //B1:
        $sql_select_all = "SELECT * FROM products";
        if (!empty($keyword)) {
            $sql_select_all =
            "SELECT * FROM products WHERE title LIKE :title";
        }
        //B2:
        $obj_select_all =
            $this->connection->prepare($sql_select_all);
        //B3:
        $selects = [];
        if (!empty($keyword)) {
            $selects = [
                ':title' => "%$keyword%"
            ];
        }
        //B4:
        $obj_select_all->execute($selects);
        //B5:
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }
}