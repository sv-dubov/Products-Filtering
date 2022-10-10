<?php
require_once 'includes/init.php';
$conn = require 'includes/db.php';
$product = new Product();
$products = $product->getProducts($conn);
$productData = array(
	'products' => $products
);
echo json_encode($productData);
?>