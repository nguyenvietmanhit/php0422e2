<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
    public function insertDetail($details) {
        $sql_insert = "INSERT INTO 
order_details(order_id,product_name,product_price,quantity)
VALUES(:order_id,:product_name,:product_price,:quantity)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':order_id' => $details['order_id'],
            ':product_name' => $details['product_name'],
            ':product_price' => $details['product_price'],
            ':quantity' => $details['quantity'],
        ];
        return $obj_insert->execute($inserts);
    }
}