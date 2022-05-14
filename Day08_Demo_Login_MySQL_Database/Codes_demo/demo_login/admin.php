<?php
session_start();
//admin.php
// - Cần ktra nếu user chưa đăng nhập thì ko cho truy cập,
//chuyển hướng ngược lại về trang login
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Bạn chưa đăng nhập, ko thể truy cập
    trang này';
    header('Location: login.php');
    exit();
}
// Dành cho user đã đăng nhập thành công
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// Chỉ hiển thị message Đăng nhập thành công 1 lần duy nhất,
//từ lần thứ 2 phải mất
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
echo "<br />Chào bạn, " . $_SESSION['username'];
echo "<a href='logout.php'>Đăng xuất</a>";