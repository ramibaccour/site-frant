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
<?php
    $index1 = 0;
    $testBaniere = false;
    $randomString = base64_encode(random_bytes(4));
    $idBaniere = substr($randomString, 0, 5);
    foreach($listeContenuWeb as $ContenuWeb)
    {
      $ContenuWeb = getStaticContenuWeb($ContenuWeb);
      // ----------------------------------------- Bannière -----------------------------------------
      if($ContenuWeb["id_ContenuWeb_type"] == 1)
      {
        $testBaniere = true;
?>
        <!-- ======= Hero Section ======= -->
        <section  class="hero">
      
          <div class="info d-flex align-items-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                  <h2 data-aos="fade-down"><?php echo($ContenuWeb["name"]); ?></h2>
                  <p data-aos="fade-up"><?php echo($ContenuWeb["text"]); ?></p>
                  <a data-aos="fade-up" data-aos-delay="200" href="#<?php echo($idBaniere); ?>" class="btn-get-started">Allons-y</a>
                </div>
              </div>
            </div>
          </div>
<?php 
          if(isset($ContenuWeb["listeLigneContenuWeb"]) && count($ContenuWeb["listeLigneContenuWeb"])>0)
          {      
?>  
          <div id="<?php echo($ContenuWeb["id"])?>hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
<?php
              $index2 = 0;
              foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
              {
?>  
                <div class="carousel-item<?php if($index2 == 0) echo(' active '); ?>" style="background-image: url(<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>)"></div>
<?php   
                $index2 +=1;
              }
?>
                  <a class="carousel-control-prev" href="#<?php echo($ContenuWeb["id"])?>hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next" href="#<?php echo($ContenuWeb["id"])?>hero-carousel" role="button" data-bs-slide="next">
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
      if($ContenuWeb["id_ContenuWeb_type"] == 2)
      {
    ?>
        <!-- ======= Constructions Section ======= -->
        <main>
          <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="constructions">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($ContenuWeb["name"]); ?></h2>
                <p><?php echo($ContenuWeb["text"]); ?></p>
              </div>

              <div class="row gy-4">
                <?php
                  foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                  {
                ?>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="card-item">
                        <div class="row">
                          <div class="col-xl-5">
                            <div class="card-bg" style="background-image: url(<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>);"></div>
                          </div>
                          <div class="col-xl-7 d-flex align-items-center">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo($ligneContenuWeb["name"]); ?></h4>
                              <p><?php echo($ligneContenuWeb["text"]); ?></p>
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
      if($ContenuWeb["id_ContenuWeb_type"] == 3)
      {
    ?>
        <main >
          <!-- ======= Services Section ======= -->
          <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="services section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($ContenuWeb["name"]); ?></h2>
                <p><?php echo($ContenuWeb["text"]); ?></p>
              </div>

              <div class="row gy-4">
              <?php
                  foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                  {
              ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item  position-relative">
                        <div class="icon">
                          <i><img class="fa-solid" src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" alt=""></i>
                        </div>
                        <h3><?php echo($ligneContenuWeb["name"]); ?></h3>
                        <p><?php echo($ligneContenuWeb["text"]); ?></p>
                        <a href="<?php echo($ligneContenuWeb["url"]); ?>" class="readmore stretched-link">Voir plus <i class="bi bi-arrow-right"></i></a>
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
      if($ContenuWeb["id_ContenuWeb_type"] == 4)
      {
  ?>
        <main > 
            <!-- ======= Alt Services Section ======= -->
            <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="alt-services">
              <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                  <div class="col-lg-6 img-bg" style="background-image: url(<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ContenuWeb["image"]); ?>);" data-aos="zoom-in" data-aos-delay="100"></div>

                  <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <h3><?php echo($ContenuWeb["name"]); ?></h3>
                    <p><?php echo($ContenuWeb["text"]); ?></p>
      <?php
                    foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                    {
      ?>
                      <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <i><img class="bi bi-easel flex-shrink-0" src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" alt=""></i>
                        <div>
                          <h4><a href="<?php echo($ligneContenuWeb["url"]); ?>" class="stretched-link"><?php echo($ligneContenuWeb["name"]); ?></a></h4>
                          <p><?php echo($ligneContenuWeb["text"]); ?></p>
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


      if($ContenuWeb["id_ContenuWeb_type"] == 5)
      {
  ?>
        <main > 
          <!-- ======= Features Section ======= -->
          <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="features section-bg">
            <div class="container" data-aos="fade-up">
              <ul class="nav nav-tabs row  g-2 d-flex">
    <?php        
                $compte1 = 0;    
                foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                {
    ?>            
                  <li class="nav-item col-3">
                    <a class="nav-link <?php echo($compte1 == 0? ' active ' : '');?> show" data-bs-toggle="tab" data-bs-target="#tab-<?php echo($compte1);?>">
                      <h4><?php echo($ligneContenuWeb["name"]); ?></h4>
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
                foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                {
    ?> 
                  <div class="tab-pane <?php echo($compte2 == 0? 'active' : '');?> show" id="tab-<?php echo($compte2);?>">
                    <div class="row">
                      <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3><?php echo($ligneContenuWeb["name2"]); ?></h3>
                        <p class="fst-italic">
                        <?php echo($ligneContenuWeb["text"]); ?>
                        </p>
                      </div>
                      <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                        <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" alt="" class="img-fluid">
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


      if($ContenuWeb["id_ContenuWeb_type"] == 6)
      {
  ?>
        <main > 

          <!-- ======= Our Projects Section ======= -->
          <section  <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="projects">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($ContenuWeb["name"]); ?></h2>
                <p><?php echo($ContenuWeb["text"]); ?></p>
              </div>
              <!---->
              <div class="portfolio-isotope"  data-portfolio-filter="*"   data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="*" class="filter-active">Tous</li>
    <?php        
                  $listeGroupeLigneContenuWeb = filter($ContenuWeb["listeLigneContenuWeb"], "id_parent", null);
                  $compte1 = 0;    
                  foreach($listeGroupeLigneContenuWeb as $ligneContenuWeb)
                  {
    ?>  
                    <li data-filter=".filter-<?php echo($ligneContenuWeb["id"]); ?>"><?php echo($ligneContenuWeb["name"]); ?></li>
    <?php
                    $compte1++;
                  }
    ?>
                </ul><!-- End Projects Filters -->

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
    <?php        
                  $compte1 = 0;    
                  foreach($listeGroupeLigneContenuWeb as $myLigneContenuWeb)
                  {
                    $ligneContenuWeb = filter($ContenuWeb["listeLigneContenuWeb"], "id_parent", $myLigneContenuWeb["id"]);
                    foreach($ligneContenuWeb as $la)
                    {
    ?>  
                      <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo($myLigneContenuWeb["id"]); ?>">
                        <div class="portfolio-content h-100">
                          <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($la["image"]); ?>" class="img-fluid" alt="">
                          <div class="portfolio-info">
                            <h4><?php echo($la["name"]); ?></h4>
                            <p><?php echo($la["text"]); ?></p>
                            <a href="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($la["image"]); ?>" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="<?php echo($la["url"]); ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
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
      if($ContenuWeb["id_ContenuWeb_type"] == 7)
      {
  ?>
        <main > 
          <!-- ======= Testimonials Section ======= -->
          <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($ContenuWeb["name"]); ?></h2>
                <p><?php echo($ContenuWeb["text"]); ?></p>
              </div>

              <div class="slides-2 swiper">
                <div class="swiper-wrapper">
  <?php           
                  $compte2 = 0;
                  foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                  {
    ?> 
                    <div class="swiper-slide">
                      <div class="testimonial-wrap">
                        <div class="testimonial-item">
                          <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" class="testimonial-img" alt="">
                          <h3><?php echo($ligneContenuWeb["name"]); ?></h3>
                          <h4><?php echo($ligneContenuWeb["name2"]); ?></h4>
                          <div class="stars">
  <?php
                            if(!empty($ligneContenuWeb["number1"]))
                            {

                            
                              for($i=0; $i<$ligneContenuWeb["number1"];$i++)
                              {
  ?>
                                <i class="bi bi-star-fill"></i>
  <?php                     
                              }
                              for($i=0; $i<5-$ligneContenuWeb["number1"];$i++)
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
                            <?php echo($ligneContenuWeb["text"]); ?>
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
      if($ContenuWeb["id_ContenuWeb_type"] == 8)
      {
  ?>
        <main>
          <!-- ======= Recent Blog Posts Section ======= -->
          <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
              <div class=" section-header">
                <h2><?php echo($ContenuWeb["name"]); ?></h2>
                <p><?php echo($ContenuWeb["text"]); ?></p>
              </div>

              <div class="row gy-5">
  <?php           
                foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                {                  
    ?> 
                  <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="post-item position-relative h-100">

                      <div class="post-img position-relative overflow-hidden">
                        <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" class="img-fluid" alt="">
                        <span class="post-date"><?php echo(!empty($ligneContenuWeb["date1"])? date("F Y", strtotime($ligneContenuWeb["date1"])) : ''); ?></span>
                      </div>

                      <div class="post-content d-flex flex-column">

                        <h3 class="post-title"><?php echo($ligneContenuWeb["name"]); ?></h3>

                        <div class="meta d-flex align-items-center">
                          <!-- <div class="d-flex align-items-center">
                            <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                          </div>
                          <span class="px-3 text-black-50">/</span> -->
                          <div class="d-flex align-items-center">
  <?php           
                            if(isset($ligneContenuWeb["article"]) && isset($ligneContenuWeb["article"]["listeCategorie"]))
                            {
                              foreach($ligneContenuWeb["article"]["listeCategorie"]as $myCat)
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

                        <a href="<?php echo($ligneContenuWeb["url"]); ?>" class="readmore stretched-link"><span>Voir plus</span><i class="bi bi-arrow-right"></i></a>

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
      if($ContenuWeb["id_ContenuWeb_type"] == 10)
      {  
  ?>  
        <!-- ======= Stats Counter Section ======= -->
        <section <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="stats-counter section-bg">
          <div class="container">

            <div class="row gy-4">
<?php 
                foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                { 
?>
                  <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                      <i>
                      <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" class="bi bi-emoji-smile color-blue flex-shrink-0" alt="">
                      </i>
                      <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?php echo($ligneContenuWeb["name"]); ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?php echo($ligneContenuWeb["text"]); ?></p>
                      </div>
                    </div>
                  </div><!-- End Stats Item -->
<?php 
                }
?>
            </div>

          </div>
        </section><!-- End Stats Counter Section -->
  <?php     
      }
      if($ContenuWeb["id_ContenuWeb_type"] == 11)
      {     
  ?>
        <!-- ======= Our Team Section ======= -->
        <section  <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="team">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <h2><?php echo($ContenuWeb["name"]); ?></h2>
                <p><?php echo($ContenuWeb["text"]); ?></p>
              </div>

              <div class="row gy-5">
<?php 
                foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                { 
?>
                  <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                      <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" class="img-fluid" alt="">
                      <div class="social">
                        <a href="<?php echo($ligneContenuWeb["facebook"]); ?>"><i class="bi bi-facebook"></i></a>
                        <a href="<?php echo($ligneContenuWeb["linkedin"]); ?>"><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info text-center">
                      <h4><?php echo($ligneContenuWeb["name"]); ?></h4>
                      <span><?php echo($ligneContenuWeb["name2"]); ?></span>
                      <p><?php echo($ligneContenuWeb["text"]); ?></p>
                    </div>
                  </div><!-- End Team Member -->
<?php 
                }
?>
              </div>

            </div>
          </section><!-- End Our Team Section -->
  <?php  
      }
      if($ContenuWeb["id_ContenuWeb_type"] == 12)
      { 
?>  
        <!-- ======= Testimonials Section ======= -->
        <section  <?php echo($testBaniere? ('id="'.$idBaniere . '"') : ""); if($testBaniere)$testBaniere = false; ?> class="testimonials section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-header">
              <h2><?php echo($ContenuWeb["name"]); ?></h2>
              <p><?php echo($ContenuWeb["text"]); ?></p>
            </div>

            <div class="slides-2 swiper">
              <div class="swiper-wrapper">
<?php 
                foreach($ContenuWeb["listeLigneContenuWeb"] as $ligneContenuWeb)
                { 
?>
                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($ligneContenuWeb["image"]); ?>" class="testimonial-img" alt="">
                        <h3><?php echo($ligneContenuWeb["name"]); ?></h3>
                        <h4><?php echo($ligneContenuWeb["name2"]); ?></h4>
                        <div class="stars">
<?php 
                        for($i=0; $i<$ligneContenuWeb["number1"];$i++)
                              {
  ?>
                                <i class="bi bi-star-fill"></i>
  <?php            
                              }         
  ?>
  </div>
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          <?php echo($ligneContenuWeb["text"]); ?>
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

<?php    
      }
    }
    include("footer.php");
  ?>

</body>

</html>