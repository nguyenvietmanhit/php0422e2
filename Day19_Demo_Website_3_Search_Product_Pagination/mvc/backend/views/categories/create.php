<!--views/categories/create.php-->
<h2>Form thêm mới danh mục</h2>
<form action="" method="post">
    Tên danh mục:
    <input type="text" name="name" />
    <br />
    Chi tiết danh mục
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu" />
</form>
<!--
- Cần tích hợp trình soạn thảo CKEditor cho các trường nhập
chi tiết
+ Tải thư viện về, giải nén đc thư mục ckeditor
+ Copy thư mục này vào trong thư mục assets
+ Nhúng file ckeditor.js vào layout main.php
-->