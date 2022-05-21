<!--create.php-->

<h2>Form thêm mới sản phẩm</h2>
<!--products:
id, category_id, name, price, description, created_at
Thông thường set name của input trùng với tên trường
-->
<form action="" method="post">
    Nhập tên sp:
    <input type="text" name="name" value="" />
    <br />
    Nhập giá sp:
    <input type="text" name="price" value="" />
    <br />
    Chi tiết sp:
    <textarea name="description"></textarea>
    <br />
<!--  Tạo 1 input ẩn để set giá trị mặc định cho category_id,
  để xử lý đơn giản-->
    <input type="hidden" name="category_id" value="1" />
    <input type="submit" name="submit" value="Lưu sp" />
    <a href="index.php">Về trang danh sách</a>
</form>
<!--Để code 1 chức năng: code giao diện trước -> code PHP-->