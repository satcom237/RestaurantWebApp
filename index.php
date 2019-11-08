<?php
  include_once 'header.php';
?>

<section class="main-container">
  <div class="main-wrapper">
    <h3>Welcome To Restaurant Reviews</h3>
    <h5>Sathya Ramanathan | Rohan Barve | Susmita Padala<h5>
    <?php if(isset($_SESSION['username'])) : ?>
      <p>Thank you for choosing Restaruant Reviews. We are still a webstie in development but hope to
      serve your needs. Use the black navigation bar to navigate. You can view restaurants, search for reviews
      or coupons, redeem coupons, add/detele your own reviews. There are many more features still in development.
      To get in contact email us at: restreviews@email.com</p>
    <?php endif; ?>
  </div>
</section>

<?php
  include_once 'footer.php';
?>
