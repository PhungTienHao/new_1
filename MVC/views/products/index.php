<!-- views/products/index.php-->
<?php
echo '<pre>';
print_r($products);
echo '</pre>';
?>
<a href="index.php?controller=product&action=create">
    Thêm mới sp
</a>
<h2>Danh sách sản phẩm</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Created at</th>
        <th></th>
    </tr>
    <?php foreach ($products AS $product): ?>
    <tr>
        <td><?php echo $product['id']?></td>
        <td><?php echo $product['name']?></td>
        <td><?php echo number_format($product['price']) ?></td>
        <td>
          <!--  01/08/2023 18:56:12 -->
            <?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])) ?>
        </td>
        <th>
            <a href="index.php?controller=product&action=update&id=<?php echo $product['id']?>">Sửa</a>
            <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']?>" onclick="return confirm('Delete?')">xóa</a>
        </th>
    </tr>
    <?php endforeach; ?>
</table>