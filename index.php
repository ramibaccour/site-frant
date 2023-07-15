<?php
  include("admin/getData.php");
  include("admin/utility.php");
  $array =  [
              "id" => [6,7,14,15,16,17,18,19],
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo($titre["value"]); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1><?php echo($societeName["value"]); ?><span>.</span></h1>
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
      <?php
        $filter = ["is_deleted" => 0];
        $listeCategorie = getListeCategorie($filter);
      
        $minOrdre = PHP_INT_MAX;
        foreach ($listeCategorie as $item) 
        {
            if ($item['ordre'] < $minOrdre && empty($item['id_parent'])) 
                $minOrdre = $item['ordre'];
        }
        $categorie = find($listeCategorie, "ordre" , $minOrdre);
        $listeAccueil = getListeAccueilleByCategorie( $categorie["id"], true);
        $menuHTML = generateMenu($listeCategorie, 0, true);
        echo $menuHTML;
      ?>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  <?php
    $index1 = 0;
    $testBaniere = false;
    $randomString = base64_encode(random_bytes(4));
    $idBaniere = substr($randomString, 0, 5);
    foreach($listeAccueil as $accueil)
    {
      $accueil = getStaticAccueille($accueil);
      // ----------------------------------------- Bannière -----------------------------------------
      if($accueil["id_accueil_type"] == 1)
      {
        $testBaniere = true;
  ?>
      <!-- ======= Hero Section ======= -->
      <section  class="hero">
    
        <div class="info d-flex align-items-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 data-aos="fade-down"><?php echo($accueil["name"]); ?></h2>
                <p data-aos="fade-up"><?php echo($accueil["text"]); ?></p>
                <a data-aos="fade-up" data-aos-delay="200" href="#<?php echo($idBaniere); ?>" class="btn-get-started">Allons-y</a>
              </div>
            </div>
          </div>
        </div>
      <?php
        if(isset($accueil["listeLigneAccueil"]) && count($accueil["listeLigneAccueil"])>0)
        {      
      ?>
        <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <?php
            $index2 = 0;
            foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
            {
          ?>
              <div class="carousel-item<?php if($index2 == 0) echo(' active '); ?>" style="background-image: url(assets/images_upload/<?php echo($ligneAccueil["image"]); ?>)"></div>
          <?php   
              $index2 +=1;
            }
          ?>
                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
          
        </div>
      <?php   
      }
      ?>
      </section><!-- End Hero Section -->
    <?php
      }
      // ----------------------------------------- fin Bannière -----------------------------------------
     
     
      $index1 +=1;
      // ----------------------------------------- Liste Liste 2 / N élements ( image 800_600 )  -----------------------------------------
      if($accueil["id_accueil_type"] == 2)
      {
    ?>
        <!-- ======= Constructions Section ======= -->
        <main>
          <section  class="constructions">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($accueil["name"]); ?></h2>
                <p><?php echo($accueil["text"]); ?></p>
              </div>

              <div class="row gy-4">
                <?php
                  foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                  {
                ?>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="card-item">
                        <div class="row">
                          <div class="col-xl-5">
                            <div class="card-bg" style="background-image: url(assets/images_upload/<?php echo($ligneAccueil["image"]); ?>);"></div>
                          </div>
                          <div class="col-xl-7 d-flex align-items-center">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo($ligneAccueil["name"]); ?></h4>
                              <p><?php echo($ligneAccueil["text"]); ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- End Card Item -->
                <?php
                  }
                ?>
              </div>

            </div>
          </section><!-- End Constructions Section -->
        </main>
    <?php
      }
      // ----------------------------------------- fin  Liste 2 / N élements ( image 800_600 ) -----------------------------------------
      
      
      // ----------------------------------------- Liste 3 / N élements ( image 48_48 ) -----------------------------------------
      if($accueil["id_accueil_type"] == 3)
      {
    ?>
        <main >
          <!-- ======= Services Section ======= -->
          <section class="services section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($accueil["name"]); ?></h2>
                <p><?php echo($accueil["text"]); ?></p>
              </div>

              <div class="row gy-4">
              <?php
                  foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                  {
              ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item  position-relative">
                        <div class="icon">
                          <i><img class="fa-solid" src="assets/images_upload/<?php echo($ligneAccueil["image"]); ?>" alt=""></i>
                        </div>
                        <h3><?php echo($ligneAccueil["name"]); ?></h3>
                        <p><?php echo($ligneAccueil["text"]); ?></p>
                        <a href="service-details.html" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                      </div>
                    </div><!-- End Service Item -->
              <?php
                  }
              ?>
              </div>

            </div>
          </section>
          <!-- End Services Section -->
        </main>
  <?php
      }
      // ----------------------------------------- fin  Liste 3 / N élements ( image 48_48 ) -----------------------------------------
      
      
      // ----------------------------------------- Image à gauche 1024_768 et groupe de textes  -----------------------------------------
      if($accueil["id_accueil_type"] == 4)
      {
  ?>
        <main > 
            <!-- ======= Alt Services Section ======= -->
            <section class="alt-services">
              <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                  <div class="col-lg-6 img-bg" style="background-image: url(assets/images_upload/<?php echo($accueil["image"]); ?>);" data-aos="zoom-in" data-aos-delay="100"></div>

                  <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <h3><?php echo($accueil["name"]); ?></h3>
                    <p><?php echo($accueil["text"]); ?></p>
      <?php
                    foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                    {
      ?>
                      <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <i><img class="bi bi-easel flex-shrink-0" src="assets/images_upload/<?php echo($ligneAccueil["image"]); ?>" alt=""></i>
                        <div>
                          <h4><a href="" class="stretched-link"><?php echo($ligneAccueil["name"]); ?></a></h4>
                          <p><?php echo($ligneAccueil["text"]); ?></p>
                        </div>
                      </div><!-- End Icon Box -->
      <?php
                    }
      ?>  
                  </div>
                </div>

              </div>
            </section><!-- End Alt Services Section -->
        </main>
  <?php
      }
      // ----------------------------------------- fin Image à gauche 1024_768 et groupe de textes  -----------------------------------------


      if($accueil["id_accueil_type"] == 5)
      {
  ?>
        <main > 
          <!-- ======= Features Section ======= -->
          <section id="features" class="features section-bg">
            <div class="container" data-aos="fade-up">
              <ul class="nav nav-tabs row  g-2 d-flex">
    <?php        
                $compte1 = 0;    
                foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                {
    ?>            
                  <li class="nav-item col-3">
                    <a class="nav-link <?php echo($compte1 == 0? ' active ' : '');?> show" data-bs-toggle="tab" data-bs-target="#tab-<?php echo($compte1);?>">
                      <h4><?php echo($ligneAccueil["name"]); ?></h4>
                    </a>
                  </li><!-- End tab nav item -->
    <?php      
                  $compte1++;
                }     
    ?>
              </ul>
              <div class="tab-content">
    <?php           
                $compte2 = 0;
                foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                {
    ?> 
                  <div class="tab-pane <?php echo($compte2 == 0? 'active' : '');?> show" id="tab-<?php echo($compte2);?>">
                    <div class="row">
                      <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3><?php echo($ligneAccueil["name2"]); ?></h3>
                        <p class="fst-italic">
                        <?php echo($ligneAccueil["text"]); ?>
                        </p>
                      </div>
                      <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/images_upload/<?php echo($ligneAccueil["image"]); ?>" alt="" class="img-fluid">
                      </div>
                    </div>
                  </div><!-- End tab content item -->
    <?php
                  $compte2++;
                }
    ?>
              </div>
            </div>
          </section><!-- End Features Section -->
        </main>

  <?php      
      }
      // -----------------------------------------  Groupe 3 / N élements  ( image 1024_768 ) -----------------------------------------


      if($accueil["id_accueil_type"] == 6)
      {
  ?>
        <main > 

          <!-- ======= Our Projects Section ======= -->
          <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($accueil["name"]); ?></h2>
                <p><?php echo($accueil["text"]); ?></p>
              </div>
              <!---->
              <div class="portfolio-isotope"  data-portfolio-filter="*"   data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="*" class="filter-active">Tous</li>
    <?php        
                  $listeGroupeLigneAccueil = filter($accueil["listeLigneAccueil"], "id_parent", null);
                  $compte1 = 0;    
                  foreach($listeGroupeLigneAccueil as $ligneAccueil)
                  {
    ?>  
                    <li data-filter=".filter-<?php echo($ligneAccueil["id"]); ?>"><?php echo($ligneAccueil["name"]); ?></li>
    <?php
                    $compte1++;
                  }
    ?>
                </ul><!-- End Projects Filters -->

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
    <?php        
                  $compte1 = 0;    
                  foreach($listeGroupeLigneAccueil as $myLigneAccueil)
                  {
                    $ligneAccueil = filter($accueil["listeLigneAccueil"], "id_parent", $myLigneAccueil["id"]);
                    foreach($ligneAccueil as $la)
                    {
    ?>  
                      <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo($myLigneAccueil["id"]); ?>">
                        <div class="portfolio-content h-100">
                          <img src="assets/images_upload/<?php echo($la["image"]); ?>" class="img-fluid" alt="">
                          <div class="portfolio-info">
                            <h4><?php echo($la["name"]); ?></h4>
                            <p><?php echo($la["text"]); ?></p>
                            <a href="assets/images_upload/<?php echo($la["image"]); ?>" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                          </div>
                        </div>
                      </div><!-- End Projects Item -->
    <?php
                    }
                    $compte1++;
                  }
    ?>
                </div><!-- End Projects Container -->

              </div>

            </div>
          </section><!-- End Our Projects Section -->
        </main>
  <?php
      }
      // ----------------------------------------- fin Groupe 3 / N élements  ( image 1024_768 ) -----------------------------------------
      
      
      // -----------------------------------------  Liste déroulante  ( image 400_400 ) -----------------------------------------
      if($accueil["id_accueil_type"] == 7)
      {
  ?>
        <main > 
          <!-- ======= Testimonials Section ======= -->
          <section class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($accueil["name"]); ?></h2>
                <p><?php echo($accueil["text"]); ?></p>
              </div>

              <div class="slides-2 swiper">
                <div class="swiper-wrapper">
  <?php           
                  $compte2 = 0;
                  foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                  {
    ?> 
                    <div class="swiper-slide">
                      <div class="testimonial-wrap">
                        <div class="testimonial-item">
                          <img src="assets/images_upload/<?php echo($ligneAccueil["image"]); ?>" class="testimonial-img" alt="">
                          <h3><?php echo($ligneAccueil["name"]); ?></h3>
                          <h4><?php echo($ligneAccueil["name2"]); ?></h4>
                          <div class="stars">
  <?php
                            if(!empty($ligneAccueil["number1"]))
                            {

                            
                              for($i=0; $i<$ligneAccueil["number1"];$i++)
                              {
  ?>
                                <i class="bi bi-star-fill"></i>
  <?php                     
                              }
                              for($i=0; $i<5-$ligneAccueil["number1"];$i++)
                              {
  ?>
                                <i class="bi bi-star"></i>
  <?php 
                              }
                            }
  ?>
                          </div>
                          <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <?php echo($ligneAccueil["text"]); ?>
                            <i class="bi bi-quote quote-icon-right"></i>
                          </p>
                        </div>
                      </div>
                    </div><!-- End testimonial item -->
  <?php 
                  }
  ?>                  

                </div>
                <div class="swiper-pagination"></div>
              </div>

            </div>
          </section><!-- End Testimonials Section -->
        </main>
  <?php
      }
      // ----------------------------------------- fin Liste déroulante  ( image 400_400 ) -----------------------------------------
     
     
     
      // -----------------------------------------  Liste 3 / N élements ( image 1024_768 ) -----------------------------------------
      if($accueil["id_accueil_type"] == 8)
      {
  ?>
        <main>
          <!-- ======= Recent Blog Posts Section ======= -->
          <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
              <div class=" section-header">
                <h2><?php echo($accueil["name"]); ?></h2>
                <p><?php echo($accueil["text"]); ?></p>
              </div>

              <div class="row gy-5">
  <?php           
                foreach($accueil["listeLigneAccueil"] as $ligneAccueil)
                {                  
    ?> 
                  <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="post-item position-relative h-100">

                      <div class="post-img position-relative overflow-hidden">
                        <img src="assets/images_upload/<?php echo($ligneAccueil["image"]); ?>" class="img-fluid" alt="">
                        <span class="post-date"><?php echo(!empty($ligneAccueil["date1"])? date("F Y", strtotime($ligneAccueil["date1"])) : ''); ?></span>
                      </div>

                      <div class="post-content d-flex flex-column">

                        <h3 class="post-title"><?php echo($ligneAccueil["name"]); ?></h3>

                        <div class="meta d-flex align-items-center">
                          <!-- <div class="d-flex align-items-center">
                            <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                          </div>
                          <span class="px-3 text-black-50">/</span> -->
                          <div class="d-flex align-items-center">
  <?php           
                            if(isset($ligneAccueil["article"]) && isset($ligneAccueil["article"]["listeCategorie"]))
                            {
                              foreach($ligneAccueil["article"]["listeCategorie"]as $myCat)
                              {                  
    ?> 
                                <i class="bi bi-folder2"></i> <span class="ps-2"><?php echo($myCat["name"]); ?></span>
  <?php           
                              }
                            }
  ?> 
                          </div>
                        </div>

                        <hr>

                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                      </div>

                    </div>
                  </div><!-- End post item -->
    <?php           
                }
    ?> 
              </div>

            </div>
          </section>
          <!-- End Recent Blog Posts Section -->
        </main>
  <?php
      }
      // ----------------------------------------- fin Liste 3 / N élements ( image 1024_768 ) -----------------------------------------

    }
    include("footer.php");
  ?>

</body>

</html>