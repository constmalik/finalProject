<?php
include('inc/header.php');
?>
    <div class="home-content">

      <!-- <div class="column about">
        <h1 id="homepage-title">What is AfroCentric?</h1>
        <p>Short description of what our inventory looks like.</p>
      </div> -->

      <div class="fotorama" data-autoplay="3000" data-arrows="true">
        <img src="./lib/img/slide1.jpg" alt="Malcolm X">
        <img src="./lib/img/slide2.jpg" alt="Black Lives Matter">
        <img src="./lib/img/slide3.jpg" alt="Million Man March">
        <img src="./lib/img/slide4.jpg" alt="Martin Luther King Jr.">
      </div>

      <div class="featured-products">
        <h2 id="featured">Feautured Items</h2>
        <?php
        //randomly selects 4 items from catalog array to suggest to user
        $random = array_rand($products, 4);

        $random = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
        $prepared = $db->prepare($random);
        $prepared->execute();

        foreach($prepared->fetchAll() as $product) {
          echo "
          <div class='product'>
            <a href='details.php?product_id=$product[product_id]'>
              <figure class='inventory-photos'>
                <img src='$product[img]' alt='$product[name]' />
                <p id='product-name'>  $product[name] </p>
                <figcaption> $product[brief]</figcaption>
                <a href='details.php?product_id=$product[product_id]' id='details-link'>View Details</a>
              </figure>
            </a>
          </div>
          ";
        }
        ?>
      </div>
    </div>

<?php
include('inc/footer.php');
?>
