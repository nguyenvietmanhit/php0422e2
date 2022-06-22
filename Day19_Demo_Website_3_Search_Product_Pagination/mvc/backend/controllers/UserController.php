<?php
//mvc/backend/controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {

    //index.php?controller=user&action=register
    public function register() {
        // - Controller xử lý submit form
        // B1:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        //B2:
        //B3:
        if (isset($_POST['submit'])) {
            //B4:
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            //B5:
            //B6:
            if (empty($this->error)) {
                // Cần mã hóa mật khẩu trước khi insert:
                $password = password_hash($password, PASSWORD_BCRYPT);
//                var_dump($password);
                // - Controller gọi Model để truy vấn insert
                $user_model = new User();
                $is_register =
                    $user_model->registerUser($username, $password);
                var_dump($is_register);

            }
        }

        // - Controller gọi View
        $this->page_title = 'Trang đăng ký user';
        $this->content =
            $this->render('views/users/register.php');
        // Chức năng đky dành cho user chưa có tài khoản, nên
        //sẽ ko dùng file layout chính - >tạo 1 file layout khác
        // - Copy file main.php -> main_login.php
//        require_once 'views/layouts/main.php';
        require_once 'views/layouts/main_login.php';
    }

    //index.php?controller=user&action=login
    public function login() {
        // - Controller xử lý submit form:
        // B1:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        //B2:
        //B3:
        if (isset($_POST['submit'])) {
            //B4:
            $username = $_POST['username'];
            $password = $_POST['password'];
            //B5:
            //B6:
            if (empty($this->error)) {
                // B1: Lấy user tương ứng với username để lấy
                //đc mật khẩu đã mã hóa của user đó
                // - Controller gọi Model để truy vấn lấy dữ liệu
                $user_model = new User();
                $user = $user_model->getUser($username);
//                echo '<pre>';
//                print_r($user);
//                echo '</pre>';
                if (empty($user)) {
                    $this->error = "Username $username ko tồn tại";
                } else {
                    // B2: So khớp mk đã mã hóa ở B1 với mk nhập từ
                    //form sử dụng hàm có sẵn của PHP
                    $password_hash = $user['password'];
                    $is_login = password_verify($password, $password_hash);
                    var_dump($is_login);
                    if ($is_login) {
                        // Đăng nhập thành công
                        // Tạo 1 session lưu lại phiên đăng nhập thành công
                        $_SESSION['user'] = $user;
                        //Chuyển hướng về trang quản trị
                        header('Location: index.php?controller=category&action=create');
                        exit();
                    } else {
                        $this->error = 'Sai username/password';
                    }
                }


            }
        }

        // - Controller gọi View
        $this->page_title = 'Trang đăng nhập';
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }

    //index.php?controller=user&action=logout
    public function logout() {
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Đăng xuất thành công';
        header('Location: index.php?controller=user&action=login');
        exit();
    }
}