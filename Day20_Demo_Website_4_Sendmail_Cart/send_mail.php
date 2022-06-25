<?php
//send_mail.php
// - Sử dụng hàm có sẵn của PHP
mail('nguyenvietmanhit@gmail.com', 'Tiêu đề mail',
'Nội dung mail');
// -> báo lỗi, cần phải cấu hình XAMPP -> search gg
// -> sử dụng thư viên PHPMailer để hỗ trợ gửi mail
// - Tạo file phpmailer.php cùng cấp với thư mục
// PHPMailer