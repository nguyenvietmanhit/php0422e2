<?php
//mvc.php
// 1/ Mô hình MVC trong lập trình Web:
// + Giúp tổ chức code rành mạch và rõ ràng hơn, dễ mở rộng và
//bảo trì
// + Model View Controller
// + Là kiến trúc phần mềm, tách biệt Web thành 3 thành phần
//riêng biệt
// + Framework và CMS PHP đều dựa trên MVC
// + MVC dựa trên OOP
// 2/ Thành phần của MVC:
// - M - Model: tương tác với CSDL
// - V - View: hiển thị giao diện
// - C - Controller: trung gian, luân chuyển dữ liệu giữa
// Model và View
// 3 - Luồng xử lý dữ liệu trong MVC
// 4 - Triển khai mô hình MVC cho ứng dụng CRUD danh mục
// + Tạo cấu trúc thư mục MVC
/**
 * crud /
 *      /assets: lưu các file frontend: css, js, image, webfont ..
 *             /css: chứa các file css
 *                 /style.css
 *             /js: chứa các file js
 *                /script.js
 *             /images: chứa các ảnh tĩnh
 *      /configs: chứa class cấu hình như csdl, mail ...
 *              /Database.php: class chứa cấu hình CSDL
 *      /controllers: chứa class controller
 *                   /Controller.php: controller cha
 *                   /CategoryController.php: controller xử lý danh mục
 *      /models: chứa các class model
 *             /Model.php: model cha
 *             /Category.php: model xử lý danh mục
 *      /views: chứa các file view
 *            /layouts: chứa các file layout
 *                    /main.php: file layout chính
 *            /categories: chứa các file view của danh mục
 *                       /create.php: view thêm mới
 *                       /update.php: view sửa
 *                       /list.php: danh sách
 *      .htaccess: file nhạy cảm
 *      index.php: file index gốc của mô hình MVC, tên bắt buộc
 *                 phải là index.php
 */
