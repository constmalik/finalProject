<?php
include('inc/header.php');

?>
    <div id="search-content">

      <section class="top-section">
        <h1 id="search-title">Looking for something specific?</h1>

        <form class="search-form" action="search.php" method="get">
          <input type="text" name="searchbar" placeholder="clothing, accessories, etc" id="searchbar">
          <input type="submit" value="search" id="searchbtn">
        </form>

      </section>
      <section class="search-inventory">
        <!-- PRODUCTS GO HERE -->
      <?php
      try {
        $userInput = $_GET['searchbar'];

        if(isset($_GET['searchbar'])) {
          $search = "SELECT * FROM products WHERE name LIKE '%{$userInput}%' OR description LIKE '%{$userInput}%' OR category LIKE '%{$userInput}%'";
          $prep = $db->prepare($search);
          $prep->execute();

          foreach($prep->fetchAll() as $product) {
            echo "
            <div class='product'>
            <figure class='inventory-photos'>
              <img src='$product[img]' alt='$product[name]' />
              <p id='product-name'>  $product[name] </p>
              <figcaption> $product[description]</figcaption>
              <a href='details.php?product_id=$product[product_id]' id='details-link'>View Details</a>
            </figure>
            </div>
            ";
          }
        }
      } catch (Exception $e) {
        $e-getMessage();
      }

      ?>
    </section>
    </div>
<?php
include('inc/footer.php');
?>
