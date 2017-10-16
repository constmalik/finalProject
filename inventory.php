<?php
include('inc/header.php');
?>
  <!-- wrapper for inventory content -->
    <div class="inventory-content">
      <h1 id="inventory-title">Products</h1>
      <!-- form that allows user to filter products -->
      <form class="filterby" action="inventory.php" method="get">
        <select class="filter" name="filter">
          <option value="all">All Products</option>
          <option value="canvas">Canvas</option>
          <option value="hair">Hair Products</option>
          <option value="accessories">Accessories</option>
          <option value="clothing">Apparel</option>
        </select>
        <!-- submission for filter form -->
        <input type="submit" value="filter" id="filter-btn">
      </form>
      <div class="inventory">
        <?php
        // GET variable for user's selection from filter form
        $cat = $_GET['filter'];
        //checks if
        if(isset($cat) && $cat == 'all') {
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
