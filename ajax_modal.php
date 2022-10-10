<?php
require_once 'includes/init.php';
$conn = require 'includes/db.php';
$product = new Product();
$id = $_GET['id'];
$prod = $product->getProductById($conn, $id);
$productData = array(
	'product' => $prod
);
echo json_encode($productData);
?>