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
  $listeCategorieBlog = getCategorieByModelAffichage(3);
  $lastBlog = getLastBlog(3);

  if (!empty($article["date1"]))
  {
    $date = new DateTime($article["date1"]);
    $dateFr = $date->format('d F Y');
    setlocale(LC_TIME, 'fr_FR.UTF-8'); // Définit les paramètres régionaux en français pour les mois
    $dateFr = strftime('%d %B %Y', $date->getTimestamp());
  }
  else
    $article["date1"] = "";


  $listeImage = getListeImageArticle($article["id"]);
  $image1 = find($listeImage, "id_resolution", 1);
  $listeImage1024 = filter($listeImage, "id_resolution", 4);
  $image1_1024;
  $image2_1024;
  if(isset($image1["name"]))
    $image1 = $image1["name"];
  if(count($listeImage1024)>0)
    $image1_1024 = $listeImage1024[0]["name"];
  if(count($listeImage1024)>1)
    $image2_1024 = $listeImage1024[1]["name"];
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
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image1); ?>');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2><?php echo($article["name"]); ?></h2>
        <ol>
          <li><a href="<?php echo($myHoste); ?>/index">Accueil</a></li>
          <li>Détails service</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image1_1024); ?>" alt="" class="img-fluid">
              </div>

              <h2 class="title"><?php echo($article["name"]); ?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?php echo($dateFr); ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p><?php echo($article["description"]); ?></p>
                <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image2_1024); ?>" class="img-fluid" alt="">
                <h3><?php echo($article["name2"]); ?></h3>
                <p><?php echo($article["full_description"]); ?></p>
              </div><!-- End post content -->
            </article><!-- End blog post -->

           
            <div class="comments">

              <h4 class="comments-count">8 Comments</h4>

              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="<?php echo($myHoste); ?>/assets/img/blog/comments-1.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                      Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->

              <div id="comment-2" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="<?php echo($myHoste); ?>/assets/img/blog/comments-2.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                    </p>
                  </div>
                </div>

                <div id="comment-reply-1" class="comment comment-reply">
                  <div class="d-flex">
                    <div class="comment-img"><img src="<?php echo($myHoste); ?>/assets/img/blog/comments-3.jpg" alt=""></div>
                    <div>
                      <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan,2022</time>
                      <p>
                        Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                        Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                        Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                      </p>
                    </div>
                  </div>

                  <div id="comment-reply-2" class="comment comment-reply">
                    <div class="d-flex">
                      <div class="comment-img"><img src="<?php echo($myHoste); ?>/assets/img/blog/comments-4.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                        </p>
                      </div>
                    </div>

                  </div><!-- End comment reply #2-->

                </div><!-- End comment reply #1-->

              </div><!-- End comment #2-->

              <div id="comment-3" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="<?php echo($myHoste); ?>/assets/img/blog/comments-5.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                      Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                    </p>
                  </div>
                </div>

              </div><!-- End comment #3 -->

              <div id="comment-4" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="<?php echo($myHoste); ?>/assets/img/blog/comments-6.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                    </p>
                  </div>
                </div>

              </div><!-- End comment #4 -->

              <div class="reply-form">

                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">
              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Catégories</h3>
                <ul class="mt-3">
      <?php
                  foreach($listeCategorieBlog as $categorie)
                  {
      ?>
                    <li><a href="<?php echo($myHoste . "/liste/article/" . $categorie["id"] . "/" . $categorie["name"]) ?>"><?php echo($categorie["name"]) ?><span>(<?php echo($categorie["count"]) ?>)</span></a></li>
      <?php
                  }
      ?>
                </ul>
              </div><!-- End sidebar categories-->

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Blog récents</h3>

                <div class="mt-3">
      <?php
                  foreach($lastBlog as $myBg)
                  {
                    if (!empty($myBg["date1"]))
                    {
                      $date = new DateTime($myBg["date1"]);
                      $dateFr = $date->format('d F Y');
                      setlocale(LC_TIME, 'fr_FR.UTF-8'); // Définit les paramètres régionaux en français pour les mois
                      $dateFr = strftime('%d %B %Y', $date->getTimestamp());
                    }
                    else
                      $article["date1"] = "";
                    if(count($myBg["listeImage"])>0)
                    {
                      $image = find($myBg["listeImage"],"id_resolution", 4);
                      if(!isset($image["name"]))
                      $image["name"] = "";
                    }
      ?>
                    <div class="post-item mt-3">
                      <img src="<?php echo($myHoste); ?>/assets/images_upload/<?php echo($image["name"]); ?>" alt="">
                      <div>
                        <h4><a href="<?php echo($myHoste . "/blog/" . $myBg["id"] . "/" . $myBg["name"]); ?>"><?php echo($myBg["name"]) ?></a></h4>
                        <time datetime="2020-01-01"><?php echo($dateFr) ?></time>
                      </div>
                    </div><!-- End recent post item-->
      <?php
                  }
      ?>
                </div>

              </div><!-- End sidebar recent posts-->
            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php
    include("footer.php");
  ?>
  <!-- End Footer -->

</body>

</html>