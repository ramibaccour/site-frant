<?php
    require_once "backend/utility.php" ;
    require_once "backend/getData.php" ;
    require_once "backend/init.php" ;

    


    $array =  [
                "id" => [6,7,14,15,16,17,18,19,20,29,44,45]
                ];
    $listeParametre = getListeParametreByListeId($array);
    $parametre = $listeParametre["listParametreResponse"];
    $societeName = find($parametre,"id", 6);
    $societeAdresse = find($parametre,"id", 14);
    $societePhone = find($parametre,"id", 15);
    $societeMail = find($parametre,"id", 16);
    $societeHoraire = find($parametre,"id", 45);
    $societeLogo = find($parametre,"id", 44);
    $societeInstagrame = find($parametre,"id", 17);
    $societeFacebook = find($parametre,"id", 18);
    $societeLinkedin = find($parametre,"id", 19);
    $societeYoutube = find($parametre,"id", 29);
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

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $societeName["value"]; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
          href="<?php echo $myHoste ; ?>/assets/images/favicon.webp">
    <!-- CSS
	============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/ionicons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/animate.min.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/easyzoom.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/nice-select.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/nivo-slider.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/slick.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/css-plugins/slick-theme.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/bundle.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $myHoste ; ?>/assets/css/colors.css">
    <script type="text/javascript">
        <?php echo "var myHoste='" . $myHoste ."';";?>
    </script>
</head>
