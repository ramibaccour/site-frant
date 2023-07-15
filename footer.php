
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><?php echo($societeName["value"]); ?></h3>
              <p>
                <?php echo($societeAdresse["value"]); ?><br><br>
                <strong><?php echo($societePhone["name"]); ?>:</strong> <?php echo($societePhone["value"]); ?><br>
                <strong><?php echo($societeMail["name"]); ?>:</strong> <?php echo($societeMail["value"]); ?><br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="<?php echo($societeFacebook["value"]); ?>" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo($societeInstagrame["value"]); ?>" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo($societeLinkedin["value"]); ?>" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

         

          <?php
                $html = '';

                // Filtrer les éléments de niveau 1
                $level1Elements = array_filter($listeCategorie, function($item) 
                {
                    return $item['id_parent'] === null;
                });
                
                foreach ($level1Elements as $level1) 
                {
                    $html .= '<div class="col-lg-2 col-md-3 footer-links">';
                    $html .= '<h4>' . $level1['name'] . '</h4>';
                
                    // Filtrer les éléments de niveau 2 correspondants à l'élément de niveau 1 actuel
                    $level2Elements = array_filter($listeCategorie, function($item) use ($level1) {
                        return $item['id_parent'] === $level1['id'];
                    });
                
                    if (!empty($level2Elements)) 
                    {
                        $html .= '<ul>';
                        foreach ($level2Elements as $level2) 
                        {
                            $html .= '<li><a href="#">' . $level2['name'] . '</a></li>';
                        }
                        $html .= '</ul>';
                    }
                
                    $html .= '</div>';
                }
                
                echo $html;
          ?>
          

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span><?php echo($societeName["value"]); ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
