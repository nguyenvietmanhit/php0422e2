<!--sql.php-->
1 - Ngôn ngữ truy vấn SQL
- Structure Query Language: là ngôn ngữ truy vấn có cấu trúc
- Dùng để tương tác với CSDL
- Sử dụng công cụ quản trị CSDL của MySQL là PHPMyadmin để
viết SQL (Navicat, MySQL Workbench ...)
- Cách học SQL: viết truy vấn SQL thuần trước, sau đó mới sử
dụng giao diện đồ họa
Truy cập: http://localhost/phpmyadmin
để vào trang quản trị CSDL MySQL của PHPMyadmin
- Sử dụng tab SQL của PHPMyadmin để viết truy vấn
2 - Các truy vấn SQL cơ bản:
# Comment trong SQL dùng #
# Kết thúc 1 truy vấn SQL là ;
# SQL ko phân biệt hoa thường
# 1 - Tạo CSDL
# CREATE DATABASE abcdef;
CREATE DATABASE IF NOT EXISTS php0422e2
CHARACTER SET utf8
COLLATE utf8_general_ci;
# 2 - Truy cập CSDL, bắt buộc phải có bước này thì mới
# thao tác đc với CSDL như tạo bảng, tạo trường ...
# với PHPMyadmin ko hiểu lệnh USE, phải click trực tiếp
# vào tên CSDL
# USE chỉ có tác dụng trong command line
USE php0422e2;
# 3 - Xoá CSDL:
# DROP DATABASE abcdef;
# 4 - Các kiểu dữ liệu trong MySQL:
# - Kiểu số: hay dùng nhất là:
# TINYINT: tốn 1 Byte để lưu, miền giá trị -128 đến 127
# INT: tốn 4 Byte để lưu, miền giá trị - 2 tỉ đến 2 tỉ
# - Kiểu chuỗi: hay dùng nhất là:
# VARCHAR: lưu chuỗi tối đa 255 ký tự
# TEXT: lưu chuỗi tối đa ~65k ký tự
# - Kiểu thời gian: hay dùng nhất:
# DATETIME: lưu ngày giờ theo kiểu cố định
# TIMESTAMP: lưu ngày giờ dựa theo múi giờ của hệ thống
# Với kiểu thời gian, bắt buộc thời gian có định dạng sau
# thì mới lưu đc: YYYY-MM-DD H:i:s
# VD: 21/03/2022 12:00:00 -> 2022-03-21 12:00:00
# 5 - Tạo bảng:
# Tạo 2 bảng:
# - Quy tắc đặt tên:
# + Tên bảng dạng số nhiều
# + Khóa chính là id, khóa ngoại: <tên bảng số ít>_id. VD:
    # category_id, user_id, product_id ....
    # categories(id, name, status, created_at)
    CREATE TABLE IF NOT EXISTS categories(
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    status TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    # khóa chính, khoái ngoại của bảng nếu có
    PRIMARY KEY (id)
    );
    # products(id, category_id, name, price, description, created_at)
    CREATE TABLE IF NOT EXISTS products(
    id INT(11) AUTO_INCREMENT,
    category_id INT(11) DEFAULT NULL,
    name VARCHAR(150) NOT NULL,
    price INT(11) DEFAULT 0,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    # định nghĩa khóa chính khóa ngoại nếu có
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
    );
    # Có thể sử dụng tab Designer của PHPMyadmin để xem mối quan hệ của bảng bằng giao diện đồ họa

    # 6 - Truy vấn INSERT:
    # - categories(id, name, status, created_at)
    # + Chỉ thêm dữ liệu cho trường sinh thủ công
    # + Giá trị khi thêm phải tương ứng với kiểu dữ liệu
    # của trường đó
    # INSERT INTO categories(name, status)
    # VALUES('Tivi', 0), ('Điện thoại', 1), ('Máy tính', 1);
    # - products(id, category_id, name, price, description, created_at)
    #INSERT INTO products(category_id, name, price, description)
    #VALUES(1, 'Tivi Samsung', 1000, 'Des samsung'),
    #      (1, 'Tivi Sony', 2000, 'Des sony'),
    #      (2, 'Iphone X', 3000, 'Des iphone x'),
    #      (3, 'Laptop Asus', 4000, 'Des asus'),
    #      (3, 'Laptop Acer', 5000, 'Des acer'),
    #      (3, 'Laptop Dell', 6000, 'Des dell');

    # - 7 - Truy vấn SELECT: lấy dữ liệu ra
    # + Lấy tất cả trường và bản ghi trong bảng categories:
    SELECT * FROM categories;
    # + Lấy tên và giá của tất cả sản phẩm:
    SELECT name, price FROM products;
    # + Lấy 2 sản phẩm đầu tiên:
    SELECT * FROM products LIMIT 2;
    # + Lấy sản phẩm bắt đầu từ vị trí thứ 2, lấy 3 sản phẩm tính từ vị trí này, vị trí đầu tiên = 0
    SELECT * FROM products LIMIT 2,3; # ưu tiên
    SELECT * FROM products LIMIT 2 OFFSET 3;
    # + Lấy sp có id < 3:
    SELECT * FROM products WHERE id < 3;
    # + Lấy sp có id = 1 hoặc id = 3:
    SELECT * FROM products WHERE id = 1 OR id = 3;
    # thay thế OR có dùng IN khi OR là so sánh bằng
    SELECT * FROM products WHERE id IN(1, 3);
    # + Lấy sp có id >= 1 và id <= 3:
    SELECT * FROM products WHERE id >= 1 AND id <= 3;
    # thay thế điều kiện >= AND <=, dùng BETWEEN :
    SELECT * FROM products WHERE id BETWEEN 1 AND 3;
    # + Tìm sp có tên chứa ký tự am:
    # abcam, amabc, bamc,
    SELECT * FROM products WHERE name LIKE '%am%';
    # + Lấy sp theo thứ tự giảm dần của ngày tạo:
    SELECT * FROM products ORDER BY created_at DESC;
    # Tăng dần:
    SELECT * FROM products ORDER BY created_at ASC;
    # 8 - Truy vấn UPDATE: cập nhật dữ liệu
    # + Cập nhật tên sp = abc, giá = 123 cho sp có id = 5;
    UPDATE products SET name = 'abc', price = 123
    WHERE id = 5;
    # Chú ý: luôn phải set điều kiện khi update, nếu ko
    # update toàn bộ bảng !
    # 9 - Truy vấn DELETE: xóa dữ liệu:
    # + Xóa sản phẩm có id > 9:
    DELETE FROM products WHERE id > 9;
    # Chú ý: luôn phải set điều kiện khi delete, nếu ko
    # sẽ xóa toàn bộ bảng

