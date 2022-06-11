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

    // index.php?controller=category&action=index
    public function index() {
        // - Controller gọi Model nhờ truy vấn CSDL lấy ra danh
        //sách các bản ghi để hiển thị ra View
        $category_model = new Category();
        $categories = $category_model->listData();
//        echo '<pre>';
//        print_r($categories);
//        echo '</pre>';
        // - Controller gọi View để hiển thị giao diện:
        // + Gán các nội dung động cho chức năng này:
        $this->page_title = 'Trang danh sách';
        $this->content =
            $this->render('views/categories/index.php', [
                'categories' => $categories
            ]);
        // + Gọi layout để hiển thị các nội dung trên:
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=category&action=update&id=3
    public function update() {
        // - Validate tham số id:
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số id ko hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        // - Lấy id từ url
        $id = $_GET['id'];
        // - Controller gọi Model để truy vấn lấy ra bản ghi
        //tương ứng theo id
        $category_model = new Category();
        $category = $category_model->getById($id);

        // - Controller xử lý submit form, copy code của Thêm mới:
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
                // - Controller gọi Model để cập nhật CSDL:
                $is_update = $category_model->updateData($name, $id);
                var_dump($is_update);
                if ($is_update) {
                    $_SESSION['success'] = 'Cập nhật thành công';
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
                $this->error = 'Cập nhật thất bại';
            }
            //B7: Hiển thị error ra form
        }

        // - Controler gọi View để hiển thị giao diện:
        $this->page_title = 'Trang cập nhật';
        $this->content =
            $this->render('views/categories/update.php', [
                'category' => $category
            ]);
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=category&action=delete&id=6
    public function delete() {
        // Validate tham số id từ url:
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số id ko hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        // - Controller gọi Model để truy vấn xóa:
        $category_model = new Category();
        $is_delete = $category_model->deleteData($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location:index.php?controller=category&action=index');
        exit();
    }
}