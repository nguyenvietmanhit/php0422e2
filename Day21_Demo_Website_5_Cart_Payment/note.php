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