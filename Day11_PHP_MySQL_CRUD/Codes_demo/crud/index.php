<!--
index.php
Ứng dụng CRUD danh mục: Create - Retrieve - Update - Delete
-> code Create trước
crud /
     /index.php: Liệt kê danh mục
     /create.php: thêm mới danh mục
     /update.php: sửa danh mục
     /delete.php: xóa danh mục
-->
<?php
session_start();
require_once 'connection.php';
// - Kết nối CSDL để lấy tất cả danh mục hiển thị ra bảng:
// + Viết truy vấn:
$sql_select_all =
    "SELECT * FROM categories ORDER BY created_at DESC";
// + Thực thi truy vấn: SELECT trả về 1 obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
// + Trả vẻ mảng 2 chiều nhiều phần tử:
$categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($categories);
echo '</pre>';
?>

<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<h3 style="color: red">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<a href="create.php">Thêm mới danh mục</a>
<h2>Danh sách danh mục</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td><?php echo $category['description']; ?></td>
            <td>
<!--                25/05/2022 19:45:00-->
                <?php
                echo date('d/m/Y H:i:s',
                    strtotime($category['created_at']))
                ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo $category['id']; ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $category['id']; ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
