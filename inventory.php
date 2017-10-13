<?php
include('inc/header.php');
?>
    <div class="inventory-content">
      <h1 id="inventory-title">Products</h1>
      <form class="filterby" action="inventory.php" method="get">
        <select class="filter" name="filter">
          <option value="all">All Products</option>
          <option value="canvas">Canvas</option>
          <option value="hair">Hair Products</option>
          <option value="accessories">Accessories</option>
          <option value="clothing">Apparel</option>
        </select>
        <input type="submit" name="category" value="filter" id="filter-btn">
      </form>
      <div class="inventory">
        <?php

        $cat = $_GET['filter'];

        if(isset($_GET['filter']) && $_GET['filter'] == 'all') {
          $filter = "SELECT * FROM products";

          $prep = $db->prepare($filter);
          $prep->execute();

          foreach($prep->fetchAll() as $product) {
            echo "
            <div class='product'>
              <a href='details.php?product_id=$product[product_id]'>
                <figure class='inventory-photos'>
                  <img src='$product[img]' alt='$product[name]' />
                  <p id='product-name'>  $product[name] </p>
                  <figcaption> $product[brief]</figcaption>
                  <p id='product-price'> $product[price] </p>
                  <a href='details.php?product_id=$product[product_id]' id='details-link'>View Details</a>
                </figure>
              </a>
            </div>
            ";
          }
        } else {
          $filter = "SELECT * FROM products WHERE category LIKE '%{$cat}%'";

          $prep = $db->prepare($filter);
          $prep->execute();

          foreach($prep->fetchAll() as $product) {
            echo "
            <div class='product'>
              <a href='details.php?product_id=$product[product_id]'>
                <figure class='inventory-photos'>
                  <img src='$product[img]' alt='$product[name]' />
                  <p id='product-name'>  $product[name] </p>
                  <figcaption> $product[brief]</figcaption>
                  <p id='product-price'> $$product[price] </p>
                  <a href='details.php?product_id=$product[product_id]' id='details-link'>View Details</a>
                </figure>
              </a>
            </div>
            ";
          }        }
        ?>
      </div>
    </div>

  </div> <!-- END CONTENT -->
<?php
include('inc/footer.php');
?>
