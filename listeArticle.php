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
  $id_categorie = $_GET["id_categorie"];
  $listeArticle = getArticleByCategorie($id_categorie);
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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo($myHoste); ?>/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Projects</h2>
        <ol>
          <li><a href="index">Home</a></li>
          <li>Projects</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
<?php
              foreach($listeArticle as $article)
              {
                $image = filter($article["listeImage"],"id_resolution", 4);
                if(count($image)>0)
                  $image = $image[0]["name"];
                else
                  $image = "";
?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                  <div class="portfolio-content h-100">
                    <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4><?php echo($article["name"]); ?></h4>
                      <p><?php echo($article["description"]); ?></p>
                      <a href="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image); ?>" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                      <a href="<?php echo($myHoste . ($article["id_model_affichage"] == 1? "/projet/" : "/blog/") . $article["id"] . "/" . $article["name"] ); ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                  </div>
                </div><!-- End Projects Item -->
<?php
              }
?>
          </div><!-- End Projects Container -->
        </div>
      </div>
    </section><!-- End Our Projects Section -->

  </main><!-- End #main -->

  <?php
    include("footer.php");
  ?>
</body>

</html>