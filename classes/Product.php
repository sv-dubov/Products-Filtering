<?php

class Product
{
	public function getCategories($conn)
	{
		$sql = "SELECT c.id, c.title, count(*) AS product_count FROM categories AS c LEFT JOIN products AS p ON	p.category_id = c.id GROUP BY c.id, c.title";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getProducts($conn)
	{
		$sql = "SELECT products.id, products.title AS product_title, products.price, products.created_at, categories.title AS category_title FROM products INNER JOIN categories ON products.category_id = categories.id";

		if (isset($_GET['category']) && $_GET['category'] != "") {
			$sql .= " WHERE category_id IN ('" . implode("','", $_GET['category']) . "')";
		}

		if (isset($_GET['sorting']) && $_GET['sorting'] != "") {
			$sorting = implode("','", $_GET['sorting']);
			if ($sorting == 'newest' || $sorting == '') {
				$sql .= " ORDER BY id DESC";
			} else if ($sorting == 'lowest_price') {
				$sql .= " ORDER BY price";
			} else if ($sorting == 'alphabet') {
				$sql .= " ORDER BY product_title";
			}
		} else {
			$sql .= " ORDER BY id DESC";
		}

		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $products;
	}

	public function getProductById($conn, $id)
	{
		$sql = "SELECT products.id, products.title AS product_title, products.price, products.created_at, categories.title AS category_title FROM products
		 INNER JOIN categories ON products.category_id = categories.id
		 WHERE products.id = $id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$output = '';
		if (isset($products) && count($products)) {
			foreach ($products as $product) {
				$output .= '<p>Category: ' . $product['category_title'] . '</p>';
				$output .= '<p>Title: ' . $product['product_title'] . '</p>';
				$output .= '<p>Price: $' . $product['price'] . '</p>';
				$output .= '<p>Date: ' . date('d.m.Y', strtotime($product['created_at'])) . '</p>';
			}
		}
		return $output;
	}
}
