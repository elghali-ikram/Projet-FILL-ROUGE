<?php 
include './includes/head.php'
?>

<body>

<?php 
include './includes/navbar.php'
?>
  <section class="p-5  headercontact">

    <div class="p-5 text-light  text-center" data-aos="fade-right" data-aos-delay="30" data-aos-duration="3000">
      <h1>Contact Us</h1>

    </div>

  </section>


    <div class="container">
      <div class="row justify-content-center justify-content-lg-between p-3 text-center">
        <div class="col-md-6 col-lg-3">
          <div class="d-flex flex-column gap-2">
            <img src="../Assets/images/quality-free-img 1.png" alt="" width="80px" height="80px" class="mx-auto">
            <h2>Best Quality</h2>
            <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="d-flex flex-column gap-2">
            <img src="../Assets/images/tag-free-img 1.png" alt="" width="80px" height="80px" class="mx-auto">
            <h2>Best Offers</h2>
            <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="d-flex flex-column gap-2">
            <img src="../Assets/images/lock-free-img 1.png" alt="" width="80px" height="80px" class="mx-auto">
            <h2>Secure Payments</h2>
            <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo</p>
          </div>
        </div>
      </div>
    </div>


    <div class="row gap-3 justify-content-center p-5">
      <div class="p-5 text-start col-md-6 col-lg-5" data-aos="fade-right" data-aos-delay="30" data-aos-duration="3000">
        <h3>Don't be a stranger!</h3>
        <h1>You tell us. We listen.</h1>
        <p>Cras elementum finibus lacus nec lacinia. Quisque non convallis nisl, eu condimentum sem. Proin dignissim libero lacus, ut eleifend magna vehicula et. Nam mattis est sed tellus.</p>
      </div>
      <div class=" col-md-6 col-lg-5 p-3 backcolor text-light shadow rounded w-70 w-sm-50 mt-5" data-aos="flip-down" data-aos-delay="30"
      data-aos-duration="3000">
      <form method="post" action="../Admin/Controller/contact.php">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" name="message" rows="5" placeholder="Enter your message"></textarea>
        </div>
        <input type="submit" value="Send" name="send" class="btn btncolor">
      </form>
    </div>
     </div>
     <?php 
include './includes/footer.php'
?>
</body>

</html>
