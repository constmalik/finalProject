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
        //checks if get variable has been set.
        //also check if variables value is equal to all products
        //if both conditionals are true then all products will be displayed.
        if(isset($cat) && $cat == 'all') {
          // setting query statement equal to variable that displayed all products from table.
          $filter = "SELECT * FROM products";
          // query statement is passed into prepare state
          // prepares query statement as well as prevents sql injections
          $prep = $db->prepare($filter);
          // executes
          $prep->execute();
          // loop through array from database that was create from the query statement
          foreach($prep->fetchAll() as $product) {
            // renders product image, description, name, price to the screen
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
          // if get variable is set to anything else besides all that category of products will be displayed to the browser
        } else {
          //
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
<?php
include('inc/footer.php');
?>
