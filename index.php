<?php

include_once "ProductModel.php";

$productModel = new ProductModel();
$products = $productModel->getAll();
//var_dump($products);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="add-product.php">ADD NEW PRODUCT</a>
    <table border="1px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Desc</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product):?>
            <tr>
                <td><?php echo $product["id"]?></td>
                <td><?php echo $product["name"]?></td>
                <td><?php echo $product["price"]?></td>
                <td><?php echo $product["description"]?></td>
                <td><a href="product-detail.php?id=<?php echo $product["id"]?>">Detail</a></td>
                <td><a onclick="return confirm('Are you sure??')" href="product-delete.php?id=<?php echo $product["id"]?>">Delete</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>
