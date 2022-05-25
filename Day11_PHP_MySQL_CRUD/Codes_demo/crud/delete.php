<?php
session_start();
require_once 'connection.php';
//delete.php
// crud/delete.php?id=1
// - Lấy id từ url, cần check id hợp lệ , copy logic update.php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'ID ko hợp lệ';
    header('Location: index.php');
    exit();
}
// - Lấy id từ url:
$id = $_GET['id'];
// - Xử lý truy vấn xóa:
// + Viết truy vấn:
$sql_delete = "DELETE FROM categories WHERE id = $id";
// + Thực thi truy vấn: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    $_SESSION['success'] = 'Xóa thành công';
} else {
    $_SESSION['error'] = 'Xóa thất bại';
}
header('Location: index.php');
exit();