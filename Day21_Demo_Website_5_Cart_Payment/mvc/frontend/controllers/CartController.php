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
}