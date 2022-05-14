<!--
login.php
demo_login /
           /login.php: đăng nhập
           /admin.php: user đã đăng nhập
           /logout.php: đăng xuất
-->
<?php
session_start();
// - Check nếu tồn tại cookie username thì đã kích chức hoạt
//Ghi nhớ đăng nhập
if (isset($_COOKIE['username'])) {
    // Phải tạo session để đánh dấu user đã đăng nhập thành công
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    header('Location: admin.php');
    exit();
}

// - Cần check nếu đăng nhập rồi thì chuyển hướng đến
//trang admin, ko cho truy cập lại trang login nữa
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi, ko thể truy
    cập lại trang login nữa';
    header('Location: admin.php');
    exit();
}

// XỬ LÝ FORM
// - B1: Debug
echo '<pre>';
print_r($_POST);
echo '</pre>';
// - B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// - B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_POST['login'])) {
    // - B4: LẤy giá trị từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    // - B5: Validate form:
    // + Phải nhập username và password: empty
    // + Password phải lớn hơn 3 ký tự: strlen
    if (empty($username) || empty($password)) {
        $error = 'Phải nhập username và password';
    } elseif (strlen($password) < 3) {
        $error = 'Password phải lớn hơn 3 ký tự';
    }
    // - B6: Xử lý login bài toán chỉ khi ko có lỗi nào xảy ra
    if (empty($error)) {
        // Xử lý đăng nhập: giả sử đăng nhập thành công khi
        //password = 123
        if ($password == 123) {
            // - Xử lý Ghi nhớ đăng nhập chỉ khi đăng nhập
            //thành công và có check vào checkbox
            // Logic: Tạo 1 cookie lưu username,
            // mỗi khi truy cập trang login check cookie này
            //trước, nếu tồn tại thì cho đăng nhập
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 3600);
            }

            // - Đăng nhập thành công, chuyển hướng sang trang
            //admin (admin.php)
            // Ở file hiện tại cần lưu lại thông tin của user
            //vừa đăng nhập thành công để sử dụng ở file khác
            //là file admin.php
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Đăng nhập thành công';
            // Chuyển hướng:
            header('Location: admin.php');
            // Kết thúc chuyển hướng luôn dùng hàm exit
            exit();
//            echo '<pre>';
//            print_r($_SESSION);
//            echo '</pre>';
        } else {
            $error = 'Sai username hoặc password';
        }
    }
}
// - B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>

<h3 style="color: red">
    <?php
    // Session dạng flash: hiển thị 1 lần duy nhất
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>

<h3 style="color: green">
    <?php
    // Session dạng flash: hiển thị 1 lần duy nhất
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>



<form action="" method="post">
    Nhập username:
    <input type="text" name="username" value="" />
    <br />
    Nhập password:
    <input type="password" name="password" />
    <br />
<!--  Nếu chỉ có 1 checkbox duy nhất, thì name ko cần ở
  dạng mảng-->
    <input type="checkbox" name="remember" value="0" />
    Ghi nhớ đăng nhập
    <br />
    <input type="submit" name="login" value="Đăng nhập" />
</form>
