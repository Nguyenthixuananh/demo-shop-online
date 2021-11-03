<?php
include_once "ProductModel.php";
$productModel = new ProductModel();
//if (isset($_GET["id"])){
//    $id = $_GET["id"];
//}
$id = $_GET["id"];
$product = $productModel->getById($id);

    if ($_SERVER['REQUEST_METHOD']== "POST"){
        $data = [
            "name" => $_REQUEST['name'],
            "price" => $_REQUEST['price'],
            "description" => $_REQUEST['desc'],
            "id" => $_REQUEST['id']
        ];
        $productModel->edit($data);
        header("location:index.php");
    }


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
<form action=""method="post">
    <input type="text" name="name"placeholder="Ten san pham" value="<?php echo $product['name']?>">
    <input type="text" name="price"placeholder="Gia san pham" value="<?php echo $product['price']?>">
    <input type="text" name="desc"placeholder="Mo ta san pham"value="<?php echo $product['description']?>">
    <button type="submit">Sua</button>
    <button><a href="index.php">Back</a></button>
</form>
</body>
</html>