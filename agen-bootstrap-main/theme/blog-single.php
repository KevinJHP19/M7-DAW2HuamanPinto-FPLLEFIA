<?php
session_start();
require_once './config.php';

if(!isset($_SESSION['user_id'])){
  header('Location: login.php');
  exit();
}
$id_noticia = $_GET['id'];

$noticia = $mysqli->query("SELECT * FROM NEWS WHERE id = $id_noticia");

$noticia = $noticia->fetch_assoc();

$consulta3noticias = $mysqli->query("SELECT * FROM NEWS ORDER BY data_publicacio DESC LIMIT 3");

$ultimanoticias = $consulta3noticias->fetch_all(MYSQLI_ASSOC); 

$comentarios = $mysqli->query("SELECT 
    COMMENTS.id, 
    COMMENTS.descripcion, 
    COMMENTS.data, 
    USERS.id AS id_user, 
    USERS.name, 
    USERS.subname, 
    USERS.avatar
FROM COMMENTS
JOIN USERS ON COMMENTS.id_usuari = USERS.id
WHERE COMMENTS.id_noticia = $id_noticia -- Sustituye ? por el ID de la noticia deseada
ORDER BY COMMENTS.data ASC;");


//verificar si capto datos
$repuestas1 = $mysqli->query("SELECT 
    c.id, 
    c.descripcion, 
    c.data, 
    u.id AS id_user, 
    u.name, 
    u.subname, 
    u.avatar
FROM COMMENTS c
JOIN USERS u ON c.id_usuari = u.id
WHERE c.comment_id = 1  -- Reemplaza X por el ID del comentario padre
ORDER BY c.data ASC;");

$repuestas2 = $mysqli->query("SELECT 
    c.id, 
    c.descripcion, 
    c.data,
    u.id AS id_user, 
    u.name, 
    u.subname, 
    u.avatar
    FROM COMMENTS c
    JOIN USERS u ON c.id_usuari = u.id
    WHERE c.comment_id = 2  -- Reemplaza X por el ID del comentario padre
    ORDER BY c.data ASC;");

$repuestas3 = $mysqli->query("SELECT
    c.id, 
    c.descripcion, 
    c.data, 
    u.id AS id_user, 
    u.name,
    u.subname, 
    u.avatar
    FROM COMMENTS c
    JOIN USERS u ON c.id_usuari = u.id
    WHERE c.comment_id = 3  -- Reemplaza X por el ID del comentario padre
    ORDER BY c.data ASC;");







?>
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  

<?php include 'header.php'; ?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Detalles de noticia</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h3 class="font-tertiary mb-5"><?php echo $noticia['tittle']?></h3>
        <img src="<?php echo $noticia['thumbnail']?>" alt="post-thumb" class="img-fluid w-100 mb-3">
        <p class="float-left mr-4">Post by Themefisher</p>
        <p><?php echo $noticia['data_publicacio']?></p>
        <div class="content">
          <p><?php echo $noticia['descripcion']?></p>
          <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
            dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
            ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
          <blockquote>Dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
            tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
            dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem
            ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="p-5 mb-4">
        <?php foreach ($comentarios as $comentario): ?>
          <div class="media border-bottom py-4">
            <img src="<?php echo htmlspecialchars($comentario['avatar']); ?>" class="img-fluid align-self-start mr-3" alt="Avatar" width="93px">
            <div class="media-body">
              <h5 class="mb-0 text-secondary"><?php echo htmlspecialchars($comentario['name']); ?>.</h5>
              <span class="mr-3"><?php echo htmlspecialchars($comentario['data']); ?> At <?php echo htmlspecialchars($comentario['hora']); ?></span>
              <a href="#" class="btn btn-transparent py-1 px-2"><i class="ti-share-alt"></i> Reply</a>
              <p><?php echo htmlspecialchars($comentario['descripcion']); ?></p>
              
              <!-- Respuestas al comentario -->
              <?php foreach ([$repuestas1, $repuestas2, $repuestas3] as $respuestas): ?>
                <?php foreach ($respuestas as $respuesta): ?>
                  <?php if ($respuesta['comment_id'] == $comentario['id']): ?>
                    <div class="media mt-4">
                      <img src="<?php echo htmlspecialchars($respuesta['avatar']); ?>" class="img-fluid align-self-start mr-3" alt="Avatar" width="93px">
                      <div class="media-body">
                        <h5 class="mb-0 text-secondary"><?php echo htmlspecialchars($respuesta['name']); ?>.</h5>
                        <span class="mr-3"><?php echo htmlspecialchars($respuesta['data']); ?> At <?php echo htmlspecialchars($respuesta['hora']); ?></span>
                        <p><?php echo htmlspecialchars($respuesta['descripcion']); ?></p>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Latest News</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <?php
      foreach($ultimanoticias as $ultimanoticia){
        echo '<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">';
        echo '<article class="card">';
        echo '<img src="'.$ultimanoticia['thumbnail'].'" alt="post-thumb" class="card-img-top mb-2" width=200px height=200px>';
        echo '<div class="card-body p-0">';
        echo '<time>'.date('F j, Y', strtotime($ultimanoticia['data_publicacio'])).'</time>';
        echo '<a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline">'.$ultimanoticia['tittle'].'</a>';
        echo '<a href="#" class="btn btn-transparent">Read more</a>';
        echo '</div>';
        echo '</article>';
        echo '</div>';
      }
      
      ?>
    </div>
  </div>
</section>
<!-- /blog -->
<!-- /blog -->

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>