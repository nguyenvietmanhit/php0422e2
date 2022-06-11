<!--views/categories/index.php-->
<?php
echo '<pre>';
print_r($categories);
echo '</pre>';
?>
<a href="index.php?controller=category&action=create">
    Thêm mới danh mục
</a>
<h2>Danh sách danh mục</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach($categories AS $category): ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td>
<!--                11-06-2022 19:18:00 , 2022/06/11 19:18:00-->
                <?php
                echo date('d-m-Y H:i:s',
                    strtotime($category['created_at']));
                ?>
            </td>
            <td>
                <a href="index.php?controller=category&action=update&id=<?php echo $category['id']?>">Sửa</a>
                <a href="index.php?controller=category&action=delete&id=<?php echo $category['id']?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
