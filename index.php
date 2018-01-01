<?php
  include_once 'header.php';
?>

<section class="main-container">
  <div class="main-wrapper">
    <h3>Log In Page</h3>
    <h5>TEST<h5>
    <?php if(isset($_SESSION['username'])) : ?>
      <p>You have logged in</p>
    <?php endif; ?>
  </div>
</section>

<?php
  include_once 'footer.php';
?>
