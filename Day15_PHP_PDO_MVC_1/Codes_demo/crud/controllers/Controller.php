<?php
//controllers/Controller.php
// - Controller cha chứa các TT/PT dùng chung cho các controller
//con mà kế thừa từ nó
class Controller {
    //Tiêu đề trang
    public $page_title;
    //Thông tin lỗi
    public $error;
    // Nội dung của từng chức năng
    public $content;

    // Đọc nội dung file theo đường dẫn $view_path theo cơ chế
    //truyền biến từ mảng $variables vào 1 cách tường minh
    public function render($view_path, $variables = []) {
        extract($variables);
        ob_start();
        require_once $view_path;
        $content = ob_get_clean();
        return $content;
    }
}