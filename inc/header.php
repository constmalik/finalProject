<?php
// error_reporting(0);
session_start();
$_SESSION['quantity'] = $_SESSION['quantity'] + $_GET['quantity'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>AfroCentric</title>
  <?php
  include('inc/connection.php');
  ?>
  <!-- 1. Link to jQuery (1.8 or later), -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

  <!-- fotorama.css & fotorama.js. -->
  <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
  <!-- time function refreshes webpage so that browser doesnt pull from the cache -->
  <link rel="stylesheet" href="./lib/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./lib/css/style.css?v=<?php echo time(); ?>">
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <header>
        <h1 id="site-title">
          <a href="index.php">
            AfroCentric
            <img src="./lib/img/blackfist.png" alt="AfroCentric Logo"/>
          </a>
          </h1>
          <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="inventory.php">Inventory</a></li>
              <li><a href="search.php">Search</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </nav>
          <div id="shoppingbag">
            <span id="shopping-cart">
              <p id='quantity-amount'><?php echo $_SESSION['quantity'] ?></p>
              <img src="./lib/img/bag.png" alt="shopping-bag">
            </span>
          </div>
      </header>
    </div>
