<?php

// connect database with webpage
$db = new PDO("mysql:host=localhost;dbname=mrobinson_challengeone;port:3306", "r2hstudent", "SbFaGzNgGIE8kfP");
$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// create an associative array from the products table with each row as a value
$products = $db->query("SELECT * FROM products");
try {
  $products = $db->query("SELECT * FROM products");
} catch (Exception $e) {
  echo "Results not retrieved";
}

?>
