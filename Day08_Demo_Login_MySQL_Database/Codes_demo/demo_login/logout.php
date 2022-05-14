<?php
session_start();
//logout.php
// Lúc đăng nhập thành công tạo ra session nào thì lúc đăng xuất
// sẽ xóa đi
unset($_SESSION['username']);
// Cần xóa cả cookie username:
setcookie('username', '', time() - 1);
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();