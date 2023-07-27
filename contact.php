<?php
  include("admin/getData.php");
  include("admin/utility.php");
  $array =  [
              "id" => [6,7,14,15,16,17,18,19,20]
            ];
  $parametre = getListeParametreByListeId($array);
  $societeName = find($parametre,"id", 6);
  $societeAdresse = find($parametre,"id", 14);
  $societePhone = find($parametre,"id", 15);
  $societeMail = find($parametre,"id", 16);
  $societeInstagrame = find($parametre,"id", 17);
  $societeFacebook = find($parametre,"id", 18);
  $societeLinkedin = find($parametre,"id", 19);
  $societeGoogleMaps = explode(",", find($parametre,"id", 20)["value"]);
  $longitude = 0;
  $latitude = 0;
  if( !empty($societeGoogleMaps))
  {
    $longitude = floatval($societeGoogleMaps[0]);
    $latitude = floatval($societeGoogleMaps[1]);
  }
  $titre = find($parametre,"id", 7);
?>
<!DOCTYPE html>
<html lang="fr">
<?php
  include("head.php");
?>

<body>
  <?php
    include("header.php");
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Contact</h2>
        <ol>
          <li><a href="index">ACCUEIL</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map"></i>
              <h3>Notre adresse</h3>
              <p><?php echo($societeAdresse["value"]); ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Envoyez-nous un email</h3>
              <p><?php echo($societeMail["value"]); ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Appelez-nous</h3>
              <p><?php echo($societePhone["value"]); ?></p>
            </div>
          </div><!-- End Info Item -->

        </div>
        <div class="row gy-4 mt-1">

            <div class="col-lg-6 ">
              <iframe src = "https://maps.google.com/maps?q=<?php echo($longitude)?>,<?php echo($latitude)?>&hl=es;z=14&amp;output=embed"  style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row gy-4">
                  <div class="col-lg-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-lg-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php
    include("footer.php");
  ?>
  <!-- End Footer -->

</body>

</html>