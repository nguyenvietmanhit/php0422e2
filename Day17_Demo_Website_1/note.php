<?php
/**
 * Các bước xây dựng Website:
 * - B1: Chuẩn bị giao diện tĩnh (HTML CSS Javascript):
 * Backend: giao diện trang quản trị/admin
 * Frontend: giao diện người dùng
 * - B2: Phân tích CSDL từ giao diện đã có:
 * Chủ yếu dựa vào frontend để phân tích
 * Chạy toàn bộ các file giao diện frontend lên, phân tích từng
 * trang theo hướng giao diện từ trên xuống
 * + Cách phân tích: tự đánh giá xem các thông tin có hay thay
 * đổi hay ko, nếu ít khi thay đổi ko cần tạo bảng (việc tạo bảng
 * sẽ cần code CRUD backend và truy vấn lấy dữ liệu ra ở frontend
 * -> tốn thao tác hơn)
 * + Bảng menus: quản lý thông tin về menu
 * id
 * title: tên menu con, VARCHAR
 * link: link gắn với menu con, VARCHAR
 * status: trạng thái menu con, TINYINT, 0: ẩn, 1: hiển thị
 * created_at
 * updated_at: thời gian cập nhật cuối của bản ghi
 * + Bảng products: quản lý thông tin các sản phẩm
 * id
 * avatar: tên file, VARCHAR
 * title: tên sp, VARCHAR
 * price: giá sp, INT
 * summary: mô tả ngắn của sp TEXT
 * description: mô tả chi tiết của sp TEXT
 * amount: tồn kho của sp INT
 * seo_title: SEO tiêu đề sp VARCHAR
 * seo_description: SEO mô tả sp TEXT
 * seo_keywords: SEO từ khóa sp TEXT
 * status: trạng thái sp, TINYINT: 0: ẩn, 1: hiển thị
 * created_at
 * updated_at
 * - Dùng PHPMyadmin tạo CSDL: php0422e2_project
 * - Sau khi tạo CSDL, tạo các bảng bằng copy nội dung
 * trong file file_create_db.html
 * - B3: Code khung MVC: index gốc, controller cha, model cha,
 * file cấu hình CSDL ...
 * + Cấu trúc thư mục của web:
 * mvc /
 *     /backend: khung MVC đã học
 *     /frontend: khung MVC đã học
 * - Triển khai code chức năng của web dựa trên khung
 * MVC: code backend để sinh ra dữ liệu cho frontend
 * lấy ra hiển thị
 *
 */