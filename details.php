<?php
include('inc/header.php');
try {
  $id = $_GET['product_id'];



  if(isset($_GET['product_id'])) {
    $details = "SELECT * FROM products WHERE product_id LIKE '{$id}'";
    $prep = $db->prepare($details);
    $prep->execute();

    foreach($prep->fetchAll() as $product) {
      echo "
      <div class='detail-content'>

        <div class='product-picture'>
            <img src='$product[img]' alt='$product[name]' id='detail-photo'/>
        </div>
        <div class='product-details'>
          <p id='name-details'>  $product[name] </p>
          <div class='product-description'>
            <p> $$product[price] </p>
            <p>$product[description]</p>
            <form action='inventory.php' method='get' >
              <input type='number' name='quantity' placeholder='' min='1' max='10'/>
              <input type='submit' value='Add to Bag' />
            </form>
          </div>
        </div>
      </div>

      ";
    }
  }

} catch (Exception $e) {
  echo $e->getMessage();
}

?>

<?php
include('inc/footer.php');
?>
