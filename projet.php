<?php
  include("admin/getData.php");
  include("admin/utility.php");
  $array =  [
              "id" => [6,7,14,15,16,17,18,19]
            ];
  $parametre = getListeParametreByListeId($array);
  $societeName = find($parametre,"id", 6);
  $societeAdresse = find($parametre,"id", 14);
  $societePhone = find($parametre,"id", 15);
  $societeMail = find($parametre,"id", 16);
  $societeInstagrame = find($parametre,"id", 17);
  $societeFacebook = find($parametre,"id", 18);
  $societeLinkedin = find($parametre,"id", 19);
  $titre = find($parametre,"id", 7);
  $article = getArticle($_GET["id_article"]);
  $listeImage = getListeImageArticle($article["id"]);
  $listeImage = filter($listeImage, "id_resolution", 1);
  $image1;
  if(count($listeImage)>0)
    $image1 = $listeImage[0];
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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image1['name']); ?>');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2><?php echo($article["name"]); ?></h2>
        <ol>
          <li><a href="<?php echo($myHoste); ?>/index">ContenuWeb</a></li>
          <li>Détails projet</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Projet Details Section ======= -->
    <section id="project-details" class="project-details">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
<?php
              foreach($listeImage as $image)
              {
?>
                <div class="swiper-slide">
                  <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image["name"]); ?>" alt="">
                </div>
<?php
              }
?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-12">
            <div class="portfolio-description">
              <h2><?php echo($article["name"]); ?></h2>
              <p>
                <?php echo($article["description"]); ?>
              </p>
              <h2><?php echo($article["name2"]); ?></h2>
              <p>
                <?php echo($article["full_description"]); ?>
              </p>
            </div>
          </div>

          <!-- <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong> <span>Web design</span></li>
                <li><strong>Client</strong> <span>ASU Company</span></li>
                <li><strong>Project date</strong> <span>01 March, 2020</span></li>
                <li><strong>Project URL</strong> <a href="#">www.example.com</a></li>
                <li><a href="#" class="btn-visit align-self-start">Visit Website</a></li>
              </ul>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Projet Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include("footer.php");
  ?>
  <!-- End Footer -->

</body>

</html>