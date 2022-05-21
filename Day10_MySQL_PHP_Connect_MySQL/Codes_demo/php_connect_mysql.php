<!--php_connect_mysql.php-->
<?php
// Cách PHP kết nối tới CSDL MySQL
// - Cần sử dụng thư viện bên thứ 3 để có thể kết nối, vì PHP
// và MySQL hoàn toàn độc lập
// - 2 thư viện phổ biến nhất:
// + MySQLi
// + PDO
// 1 - Kết nối sử dụng thư viện MySQLi:
// + Hỗ trợ kết nối từ PHP tới MySQL
// + Hỗ trợ cả 2 cách code: PHP thuần và OOP -> dễ tiếp cận
// + Chỉ hỗ trợ kết nối tới CSDL MySQL
// + Cài thư viện ? XAMPP cài sẵn và enable sẵn
// 2 - Các bước kết nối CSDL MySQL:
// - Khởi tạo kết nối:
// + Máy chủ đang lưu trữ CSDL
const DB_HOST = 'localhost';
// + Username đăng nhập vào CSDL:
const DB_USERNAME = 'root'; // username mặc định XAMPP tạo sẵn
// + Password tương ứng với username
const DB_PASSWORD = ''; //XAMPP tạo sẵn
// + Tên CSDL sẽ kết nối:
const DB_NAME = 'php0422e2';
// + Cổng CSDL:
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST,DB_USERNAME,
    DB_PASSWORD,DB_NAME, DB_PORT);
if (!$connection) {
    die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo "Kết nối CSDL thành công";
// 3 - Demo 4 truy vấn INSERT, UPDATE, DELETE, SELECT
// - INSERT:
// products(id, category_id, name, price, description, created_at)
// + B1: Viết truy vấn INSERT:
$sql_insert = "INSERT INTO 
products(category_id, name, price, description)
VALUES(1, 'Tivi Manhnv', 1234, 'Mô tả tivi manhnv')";
// + B2: Thực thi truy vấn: với INSERT thì kết quả trả về là
// boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// Cách debug khi false: copy câu truy vấn , chạy trực tiếp trên
// PHPMyadmin
// - UPDATE: cập nhật tên sp = abc, giá = 123 cho sp có id = 7
// B1: Viết truy vấn:
$sql_update = "UPDATE products 
SET name = 'abc', price = 123
WHERE id = 7";
// B2: Thực thi truy vấn: trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);

// - DELETE: xóa các sp có id > 10
// B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > 10";
// B2: Thực thi truy vấn: trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
// -> INSERT, UPDATE, DELETE cơ chế giống hệt nhau

// - SELECT: chia làm 2 dạng SELECT:
// + Lấy 1 bản ghi duy nhất: lấy sp có id = 1
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// B2: Thực thi truy vấn: trả về 1 đối tượng trung gian nào đó,
//chưa phải kết quả cuối cùng
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Lấy mảng 1 chiều chứa thông tin bản ghi:
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';
// + Lấy nhiều bản ghi đồng thời: lấy tất cả sp
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products";
// B2: Thực thi truy vấn: trả về 1 obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng 2 chiều chứa thông tin các bản ghi:
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';
// Hiển thị
foreach ($products AS $product) {
    echo "<br />Tên sp: " . $product['name'];
}
?>
