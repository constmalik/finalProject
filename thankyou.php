<?php
include('inc/header.php');

$comments = $db->query("SELECT comments FROM contacts");
$commentArray = $comments->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_POST)) {
  try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert = 'INSERT INTO contacts (name, email, phone, comments) VALUES (:name, :email, :phone, :comments)';

    $prep = $db->prepare($insert);

    $prep->bindParam(":name", $_POST["name"]);
    $prep->bindParam(":email", $_POST["email"]);
    $prep->bindParam(":phone", $_POST["phone"]);
    $prep->bindParam(":comments", $_POST["comments"]);

    $prep->execute();
  } catch (Exception $e) {
    echo $e->getMessage();
    exit;
  }
}
?>
    <div class="thankyou-content">

      <h1 id="thankyou">Thanks for the feedback!</h1><!--include name from form here-->
      <p>Please come back and do some more shopping!</p>

      <div class="user-comments">

        <?php foreach($commentArray as $comment) {
          echo "<p>" . $comment[comments] . "</p>";
        }; ?>

      </div>

    </div>

  </div> <!-- END CONTENT -->
<?php
include('inc/footer.php');
?>
