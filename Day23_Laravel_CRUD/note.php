<?php
/**
 * note.php
 * 1 - Composer
 * + Cài composer
 * + Là công cụ quản lý các thư viện 1 cách tự động bằng câu
 * lệnh
 * + Hầu hết các Framework: Laravel, Zend, Cake, Yii và CMS:
 * Wordpress, Zoomla, Magento ... đều sử dụng Composer để cài đặt
 * + Composer giống như npm(Node Package Manager) của NodeJS
 * 2 - Laravel
 * + Chạy file laravel_demo/public/index.php
 * + Là 1 framework viết bằng PHP dựa trên mô hình MVC
 * + Là framework thông dụng nhất hiện nay
 * + Dễ học hơn các FW khác
 * + https://laravel.com/docs
 * 3 - Cấu trúc file/thư mục Laravel
 * 4 - Code:
 * 5 - Chuẩn bị CSDL:
 * - Tạo CSDL php0422e2_laravel (dùng PHPMyadmin)
 * - CẦn cài đặt thông tin kết nối CSDL trong file môi trường .env
 * - Tạo bảng products:
 * id,name,price,avatar,created_at,updated_at
 * Tạo bảng bằng cơ chế migrate của LAravel: sử dụng command line
 * Artisan
 * php artisan make:migration create_table_products --create=products
 *
 * File migrate tạo ra trong database/migrations:
 * php artisan migrate
 *
 * php artisan make:controller ProductController
 * php artisan make:model Product
 */