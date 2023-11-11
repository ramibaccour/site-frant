
<?php
    $filter = '{"isDeleted" : {"value" : "0", "operator" : "="}}';
    $filter = json_decode($filter, true);
    $filter = (object)$filter;
    $listeCategorie = getListeCategorie($filter,true)["listCategorieResponse"];
    $idCategorie = "";
    $path = $_SERVER['REQUEST_URI'];
    // /site-frant/
    // /site-frant/index/categorie/1/ContenuWeb
    // /site-frant/index
    $parts = explode("/", $path);

    if(count($parts)== 6)
    {
      $idCategorie = intval($parts[4]);
      $categorie = find($listeCategorie, "id" , $idCategorie);
    }
    // en verifier si en à besoin de charger  ContenuWeb by categorie
    else
    {
      $minOrdre = PHP_INT_MAX;
      foreach ($listeCategorie as $item)
      {
          if($item['ordre'] < $minOrdre && empty($item['idParent']))
          {
            $minOrdre = $item['ordre'];
          }
      }
      $categorie = find($listeCategorie, "ordre" , $minOrdre);
    }
    $listeContenuWeb = [];
    if(isset($categorie["id"]))
    {
      $listeContenuWeb = getListeContenuWebByCategorie( $categorie["id"], true)["listContenuWebResponse"];
    }
?>


  <!-- HEADER AREA START -->
  <header class="header-area">

      <!-- Header top area start -->
      <div class="header-top-area d-none d-lg-block">
          <div class="container">
              <div class="header-top-wrapper">
                  <div class="top-bar-left">
                      <div class="contact-link">
                          <div class="info_box phone">
                              Appelez-nous : <span><?php echo $societePhone["value"] ; ?></span>
                          </div>
                          <div class="info_box email">
                              email :  <a href="mailto:demo@example.com"><?php echo $societeMail["value"] ; ?></a>
                          </div>
                      </div>
                      <div class="social_follow">
                          <ul>
                              <li class="facebook"><a href="<?php echo $societeFacebook["value"] ; ?>"></a></li>
                              <li class="youtube"><a href="<?php echo $societeYoutube["value"] ; ?>"></a></li>
                              <li class="instagram"><a href="<?php echo $societeInstagrame["value"] ; ?>"></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="topbar-nav">
                      <!-- my account -->
                      <div class="dropdown menu-my-account-container">
                          <button data-bs-toggle="dropdown">
                              <i class="first-icon fa fa-user-circle"></i> Mon compte <i class="ion-ios-arrow-down"></i>
                          </button>
                          <ul class="dropdown-menu">
                              <li><a href="login.html">Mon compte</a></li>
                              <li><a href="checkout.html">Panier</a></li>
                              <li><a href="register.html">Se connecter</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Top bar area end -->

      <!-- Header bottom area start -->
      <div class="header-bottom-area">
          <div class="container">
              <div class="header-bottom-wrapper">

                  <div class="header-logo">
                      <a href="index.html"><img src="assets/images/logo/logo.webp" alt="harosa"></a>
                  </div>

                  <!-- main-menu -->
                  <div class="main-menu d-none d-lg-block">
                      <nav>
                        <?php
                          echo generateNestedList($listeCategorie, 0);
                        ?>
                      </nav>
                  </div>

                  <div class="header-bottom-action">
                      
                        <!-- Cart -->
                        <?php
                          include "cart-header.php";
                        ?>

                      <div class="header-action-toggle d-lg-none">
                          <button class="toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                              <span></span>
                              <span></span>
                              <span></span>
                          </button>
                      </div>

                  </div>
              </div>
          </div>
      </div>
      <!-- Header bottom area end -->

  </header>
  <!-- HRADER AREA END -->

  <!-- offcanvas Start -->
  <div class="offcanvas offcanvas-start" id="offcanvasMenu">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title"><?php echo $societeName["value"]; ?></h5>
          <button class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
          
          <div class="contact-link">
              <div class="info_box phone">
                  Appelez-nous : <span><?php echo $societePhone["value"] ; ?></span>
              </div>
              <div class="info_box email">
                  email :  <a href="mailto:demo@example.com"><?php echo $societeMail["value"] ; ?></a>
              </div>
          </div>

          <div class="offcanvas-accordion accordion" id="accordionExample">
              <div class="accordion-item">
                  <button class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseOne">
                            <i class="first-icon fa fa-user-circle"></i>
                            Mon compte
                  </button>
                  <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <ul class="offcanvas-meta">
                          <li><a href="login.html">Mon compte</a></li>
                          <li><a href="checkout.html">Panier</a></li>
                          <li><a href="register.html">Se connecter</a></li>
                      </ul>
                  </div>
              </div>
          </div>

          <nav class="canvas-menu">
            <?php
              echo generateNestedListForMobile($listeCategorie, 0);
            ?>
                
          </nav>

          <div class="social_follow">
              <ul>
                  <li class="facebook"><a href="#"></a></li>
                  <li class="twitter"><a href="#"></a></li>
                  <li class="youtube"><a href="#"></a></li>
                  <li class="googleplus"><a href="#"></a></li>
                  <li class="instagram"><a href="#"></a></li>
              </ul>
          </div>
          
      </div>
  </div>
  <!-- offcanvas END -->
