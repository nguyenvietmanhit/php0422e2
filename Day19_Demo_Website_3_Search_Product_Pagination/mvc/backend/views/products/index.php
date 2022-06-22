<!-- views/products/index.php -->
<a href="index.php?controller=product&action=create"
class="btn btn-success">
	Thêm mới
</a>

<h2>Form tìm kiếm</h2>
<!--Với form get cần giữ lại tham số controller và action
thủ công-->
<form action="" method="get">
    <input type="hidden" name="controller" value="product" />
    <input type="hidden" name="action" value="index" />

    Nhập tên sp cần tìm:
    <input type="text" name="keyword"
   value="<?php echo isset($_GET['keyword'])
       ? $_GET['keyword'] : ''?>"
           class="form-control"/>
    <br />
    <input type="submit" name="submit" value="Tìm kiếm"
           class="btn btn-primary" />
    <a href="index.php?controller=product&action=index"
    class="btn btn-default">
        Xóa tìm kiếm
    </a>
</form>

<h2>Danh sách sản phẩm</h2>

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Tên sp</th>
		<th>Chi tiết sp</th>
		<th></th>
	</tr>
    <?php foreach ($products AS $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['content']; ?></td>
            <td>
                <a href="#">Sửa</a>
                <a href="#" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>