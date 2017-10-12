<?php
// connect database with webpage
$db = new PDO("mysql:host=localhost;dbname=afrocentric;port:3306", "root", "root");
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// create an associative array from the products table with each row as a value
$products = $db->query("SELECT * FROM products");
try {
  $products = $db->query("SELECT * FROM products");
} catch (Exception $e) {
  echo "Results not retrieved";
}

?>
