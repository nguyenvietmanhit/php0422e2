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
// Bảng categories: id, name, status, created_at
//2 - Truy vấn INSERT:
// B1: Viết truy vấn: cần phải chống luôn cái lỗi bảo mật
//SQL Injection bằng kỹ thuật bind param: thay vi truyền thẳng
//giá trị vào câu truy vấn, sẽ để ở dạng tham số
$sql_insert = "INSERT INTO categories(name, status)
VALUES(:name,:status)";
// B2: Chuẩn bị đối tượng truy vấn:
$obj_insert = $connection->prepare($sql_insert);
// B3: Tạo mảng để truyền giá trị thật cho tham số trong câu
//truy vấn, số phần tử mảng = số lượng tham số đang có
// Nếu câu truy vấn ko có tham số nào thì ko có B3 này
$inserts = [
    ':name' => 'Thể thao',
    ':status' => 1
];
// B4: Thực thi obj truy vấn: INSERT trả về boolean
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
// 3 - Truy vấn UPDATE: các bước giống INSERT
// B1: Viết truy vấn: dạng tham số
$sql_update = "UPDATE categories 
SET name=:name, status=:status WHERE id=:id";
// B2: Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// B3: Tạo mảng
$updates = [
    ':name' => 'abcdef',
    ':status' => 0,
    ':id' => 2
];
// B4: Thực thi:
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 4 - Truy vấn DELETE: các bước giống INSERT UPDATE
// B1: Viết truy vấn:
$sql_delete = "DELETE FROM categories WHERE id > :id";
// B2: Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// B3: Tạo mảng
$deletes = [
    ':id' => 10
];
// B4: Thực thi: DELETE trả về boolean
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// 5 - Truy vấn SELECT:
// + SELECT 1 bản ghi
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM categories WHERE id = :id";
// B2: Cbj obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// B3: Tạo mảng:
$selects = [
    ':id' => 2
];
// B4: Thực thi obj truy vấn: với SELECT ko cần quan tâm đến giá
//trị trả về sau bước thực thi này:
$obj_select_one->execute($selects);
// B5: Trả về mảng kết hợp 1 chiều:
$category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($category);
echo '</pre>';
// + SELECT nhiều bản ghi:
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM categories";
// B2: Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// B3: Tạo mảng: bỏ qua do câu truy vấn ko có tham số nào
// B4: Thực thi:
$obj_select_all->execute();
// B5: Trả về mảng kết hợp 2 chiều:
$categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($categories);
echo '</pre>';



