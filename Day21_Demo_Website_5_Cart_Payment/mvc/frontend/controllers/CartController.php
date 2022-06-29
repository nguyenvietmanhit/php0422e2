<?php
//controllers/CartController.ph
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class CartController extends Controller
{
    public function add() {
        // - Lấy id của sp gửi lên từ ajax
        $product_id = $_GET['product_id'];
        // - Controller gọi Model để lấy sp theo id
        $product_model = new Product();
        $product = $product_model->getById($product_id);
//        echo '<pre>';
//        print_r($product);
//        echo '</pre>';
        // - Tạo mảng lưu thông tin của item sẽ thêm vào giỏ:
        $cart_item = [
            'name' => $product['title'],
            'avatar' => $product['avatar'],
            'price' => $product['price'],
            'quantity' => 1 //mặc định chỉ thêm 1 sp
        ];
        // - Logic chính:
        // + Nếu giỏ hàng chưa tồn tại, thì phải khởi tạo và thêm
        //item đầu tiên vào giỏ
        // + Nếu giỏ hàng đã tồn tại, thì có 2 trường hợp sau:
        // Th1: SP đang thêm tồn tại trong giỏ hảng r, thì update
        //số lượng lên 1
        // Th2: sp đang thêm mà chưa tồn tại, thì thêm mới
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
        echo '<pre>';
        print_r($_SESSION['cart']);
        echo '</pre>';
    }

    public function index() {
        // - Controller xử lý submit form - cập nhật giỏ hàng:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            // Cập nhật số lượng mới cho các sp trong giỏ:
            foreach ($_SESSION['cart'] AS $product_id => $cart_item) {
                // Xử lý số lượng là số âm:
                if ($_POST[$product_id] < 0) {
                    $_SESSION['error'] = "Số lượng ko thể âm";
                    header('Location: gio-hang-cua-ban.html');
                    exit();
                }
                $_SESSION['cart'][$product_id]['quantity']
                    = $_POST[$product_id];
            }
            $_SESSION['success'] = 'Cập nhật giỏ thành công';
        }

        // - Controller gọi View:
        $this->page_title = 'Giỏ hàng của bạn';
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['success'] = 'Xóa sp khỏi giỏ thành công';
        header('Location: gio-hang-cua-ban.html');
        exit();
        // thanh-toan.html
        //san-pham/abc/5.html
    }
}