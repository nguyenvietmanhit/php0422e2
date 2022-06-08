<?php
//controllers/CategoryController.php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';

class CategoryController extends Controller {
    //index.php?controller=category&action=create
    public function create() {
        // - Xử lý submit form:
        // B1: Debug
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // B2: bỏ qua
        // B3: Ktra submit form:
        if (isset($_POST['submit'])) {
            //B4:
            $name = $_POST['name'];
            //B5:
            if (empty($name)) {
                $this->error = 'Phải nhập tên';
            }
            // B6:
            if (empty($this->error)) {
                // - Controller gọi Model để nhờ Model insert
                // vào CSDL
                $category_model = new Category();
                $is_insert = $category_model->insertData($name);
                var_dump($is_insert);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location: index.php?controller=category&action=index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
            //B7: Hiển thị error ra form
        }

//        echo 'test create';
        // - Controller sẽ gọi View để hiển thị giao diện
        // + Set giá trị tương ứng cho thuộc tính tại class cha:
        $this->page_title = 'Form thêm mới danh mục';
        $this->content =
        $this->render('views/categories/create.php');
//        var_dump($this->content);
        // + Gọi layout để hiển thị các thuộc tính trên:
        require_once 'views/layouts/main.php';
    }

    public function index() {
        echo 'Chức năng danh sách danh mục';
    }
}