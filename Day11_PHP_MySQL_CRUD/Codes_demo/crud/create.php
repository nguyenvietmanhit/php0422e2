<!--create.php-->
<!--Bảng categories: id, name, description, created_at-->
<?php
session_start();
require_once 'connection.php';
// XỬ LÝ FORM:
// B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_POST['submit'])) {
    // B4: Lấy giá trị từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    // B5: Validate form: phải nhập tất cả trường
    if (empty($name) || empty($description)) {
        $error = 'Phải nhập tất cả trường';
    }
    // B6: Xử lý logic chính chỉ khi ko có lỗi xảy ra:
    if (empty($error)) {
        //+ Thêm dữ liệu từ form vào bảng categories, cần kết
        //nối CSDL
        // + Nhúng file connection.php vào để sử dụng đc luôn
        // biến kết nối, vị trí nhúng: đầu file
        // -  Viết truy vấn:
        $sql_insert = "INSERT INTO categories(name, description)
        VALUES('$name', '$description')";
        // - Thực thi truy vấn: INSERT trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        if ($is_insert) {
            // Chuyển hướng về trang danh sách
            $_SESSION['success'] = 'Thêm mới thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Thêm mới thất bại';
    }
}
// B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<h2>Form thêm mới danh mục</h2>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="name" value="" />
    <br />
    Chi tiết:
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php">Về trang danh sách</a>
</form>