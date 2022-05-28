<?php
session_start();
require_once 'connection.php';
//update.php
// crud/update.php?id=1
// - Cần check id hợp lệ thì mới cho phép truy cập:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID ko hợp lệ';
    header('Location: index.php');
    exit();
}
// - Lấy id từ url:
$id = $_GET['id'];
// - Lấy bản ghi dựa theo id để đổ ra form
// + Viết truy vấn:
$sql_select_one = "SELECT * FROM categories WHERE id = $id";
// + Thực thi truy vấn: SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// + Trả về mảng kết hợp 1 chiều chứa thông tin bản ghi:
$category = mysqli_fetch_assoc($result_one);

// - Xử lý submit form, tận dụng lại code ở form thêm mới
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
        //+ Update dữ liệu từ form vào bảng categories, cần kết
        //nối CSDL
        // + Nhúng file connection.php vào để sử dụng đc luôn
        // biến kết nối, vị trí nhúng: đầu file
        // -  Viết truy vấn:
        $sql_update =
            "UPDATE categories 
             SET name = '$name', description = '$description' 
             WHERE id = $id";
        // - Thực thi truy vấn: UPDATE trả về boolean
        $is_update = mysqli_query($connection, $sql_update);
        if ($is_update) {
            // Chuyển hướng về trang danh sách
            $_SESSION['success'] = 'Cập nhật thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
    }
}
// B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<h2>Form cập nhật danh mục</h2>
<form action="" method="post">
    Sửa tên:
    <input type="text" name="name"
           value="<?php echo $category['name']?>" />
    <br />
    Sửa chi tiết:
    <textarea name="description"><?php echo $category['description']?></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php">Về trang danh sách</a>
</form>
