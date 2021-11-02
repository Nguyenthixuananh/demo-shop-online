<?php
include_once "ProductModel.php";
$productModel = new ProductModel();

$id = $_GET["id"];
$product = $productModel->getById($id);

echo "<pre>";
var_dump($product);