<?php 
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class ProductController extends Controller {
	//index.php?controller=product&action=index
	public function index() {
	    // - Controller xử lý submit form tìm kiếm:
        $keyword = '';
        if (isset($_GET['submit'])) {
            $keyword = $_GET['keyword'];
        }

	    // - Controller gọi Model truy vấn
        $product_model = new Product();
        $products = $product_model->getAll($keyword);


		// - Controller gọi View
		$this->page_title = 'Trang danh sách sp';
		$this->content = 
		$this->render('views/products/index.php', [
		    'products' => $products
        ]);
		require_once 'views/layouts/main.php';
	}
}