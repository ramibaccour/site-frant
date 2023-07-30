<?php

    $filter = '{"filter" : {"is_deleted" : {"value" : "0", "operator" : "="}}}';
    $filter = json_decode($filter, true);
    $filter = (object)$filter;
    $listeCategorie = getListeCategorie($filter,true);
    $id_categorie = "";
    $path = $_SERVER['REQUEST_URI'];
    // /site-frant/ 
    // /site-frant/index/categorie/1/Accueil
    // /site-frant/index
    $parts = explode("/", $path);

    if(count($parts)== 6)
    {
      $id_categorie = intval($parts[4]);
      $categorie = find($listeCategorie, "id" , $id_categorie);
    }
    // en verifier si en à besoin de charger  accueille by categorie
    else 
    {
      $minOrdre = PHP_INT_MAX;
      foreach ($listeCategorie as $item) 
      {
          if ($item['ordre'] < $minOrdre && empty($item['id_parent'])) 
              $minOrdre = $item['ordre'];
      }
      $categorie = find($listeCategorie, "ordre" , $minOrdre);
    }
    $listeAccueil = [];
    if(isset($categorie["id"]))
      $listeAccueil = getListeAccueilleByCategorie( $categorie["id"], true);
    $menuHTML = generateMenu($listeCategorie, 0, true);
?>
  
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php echo($myHoste); ?>/index" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?php echo($myHoste); ?>/assets/img/logo.png" alt=""> -->
        <h1><?php echo($societeName["value"]); ?><span>.</span></h1>
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
      <?php        
        echo $menuHTML;
      ?>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->