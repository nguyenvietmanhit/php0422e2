<?php
/**
 * note.php
 * - Chức năng giỏ hàng:
 * + Lưu giỏ hàng bằng cơ chế gì ? session, cookie,
 * database ... -> sử dugnj session
 * + Cấu trúc giỏ hàng sẽ xây dựng
 * + Kết hợp với thư viện jQuery khi thêm sản phẩm
 * vào giỏ hàng -> gọi ajax
 */
$_SESSION['cart'] = [
    3 => [
        'name' => 'Iphone X',
        'price' => 3200,
        'avatar' => 'iphonex.png',
        'quantity' => 4
    ],
    4 => [
        'name' => 'Iphone 4',
        'price' => 4,
        'avatar' => '4.png',
        'quantity' => 1
    ],
];

// gio-hang-cua-ban.html
// - Rewrite URL: là tính năng viết lại đường dẫn thân thiện
//với user thay vì dùng đường dẫn của MVC
// Sử dụng file .htaccess để rewrite url

//https://vnexpress.net/sau-nam-hoat-dong-cua-tuyen-brt-ha-noi-4481362.html
#xoa-san-pham/7.html
// - Chức năng thanh toán:
// + Lưu vào 2 bảng theo đúng thứ tự sau:
// Bảng orders
// Bảng order_details