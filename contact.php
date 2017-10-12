<?php
include('inc/header.php');
?>

    <div class="contact-content">

      <h1>Have any feedback?</h1>

      <section class="contact-form">
        <form name="contactform" action="thankyou.php" method="post">

          <div class="">
            <input type="text" name="name" id="name" placeholder="Name" required>

            <input type="email" name="email" id="email" placeholder="Email" required>

          </div>

          <div>
            <input type="tel" name="phone" id="phone" placeholder="Phone" required>

            <input type="text" name="company" id="company" placeholder="Company" >
          </div>

          <div>
            <textarea name="comments" rows="8" cols="40" id="comments" placeholder="Comments"></textarea>
          </div>

          <div class="">
            <input type="submit" id="submitbtn" value="send feedback">
          </div>
        </form>
      </section>
    </div>
    <div class="social-card">
      <div class="address">
        <h1 id="address-title">Visit Us</h2>
        <p>AfroCentric</p>
        <p>1101 Red Ventures Dr.</p>
        <p>Fort Mill, SC</p>
      </div>
      <ul class="socialmedia">
        <li>
          <a href="http://www.twitter.com" target="_blank">
            <img src="./lib/img/twitter-logo.png" alt="twitter-logo">
          </a>
        </li>
        <li>
          <a href="http://www.facebook.com" target="_blank">
            <img src="./lib/img/facebook-logo.png" alt="facebook-logo">
          </a>
        </li>
        <li>
          <a href="http://www.instagram.com" target="_blank">
            <img src="./lib/img/instagram-logo.png" alt="instagram-logo">
          </a>
        </li>
      </ul>
    </div>
<?php
include('inc/footer.php');
?>
