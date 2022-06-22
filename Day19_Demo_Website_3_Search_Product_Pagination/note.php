<?php
/**
 * Chức năng đăng ký user:
 * - Form có 3 trường: username, password, nhập lại password
 * - dùng INSERT: bảng users: username, password
 * - Trường mật khẩu bắt buộc phải mã hóa trước khi lưu
 * - Thuật toán mã hóa: md5 -> ko nên dùng vì giải mã dễ dàng
 * , bcrypt -> sử dụng trong thực tế
 * 123 -> A1
 * 123 -> A2
 * - Tạo cấu trúc file như sau:
 * controllers/UserController.php
 * models/User.php
 * views/users/register.php
 *            /login.php
 * - Chức năng tim kiếm sản phẩm:
 * + Tương đối, truy vấn  SELECT với điều kiện LIKE
 * + Thường nằm chung màn hình với liệt kê
 */