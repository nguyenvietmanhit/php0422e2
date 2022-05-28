<?php
require_once 'connection.php';
//crud/sql_injection.php
// - Lỗi bảo mật SQL Injection: là kỹ thuật tấn công
//vào CSDL thông qua thay đổi câu truy vấn, thường
//xảy ra từ form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    // - Cách phòng chống SQL Injection, cần lọc dữ liệu từ form
//    bằng hàm sau:
    // Thực tế luôn cần hàm này
    $name = mysqli_real_escape_string($connection, $name);
    // - Tương tác với CSDL:
    // + Viết truy vấn:
    $sql_select_all =
    "SELECT * FROM categories WHERE name LIKE '%$name%'";
    var_dump($sql_select_all);
    // + Thực thi truy vấn: SELECT trả về obj trung gian
    $result_all = mysqli_query($connection, $sql_select_all);
    // + Trả về mảng 2 chiều chứa thông tin các bản ghi:
    $categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    echo '<pre>';
    print_r($categories);
    echo '</pre>';
    // 123456' OR name != '
}
?>
<form action="" method="post">
    Nhập tên danh mục:
    <input type="text" name="name" value="" />
    <input type="submit" name="submit" value="Tìm kiếm" />
</form>