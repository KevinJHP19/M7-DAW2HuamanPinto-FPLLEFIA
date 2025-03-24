<?php
session_start();
require_once './config.php';

if(!isset($_SESSION['user_id'])){
  header('Location: login.php');
  exit();
}
$id_noticia = $_GET['id'];

$noticia = $mysqli->query("SELECT * FROM NEWS WHERE id = $id_noticia")->fetch_assoc();

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
WHERE COMMENTS.id_noticia = $id_noticia
ORDER BY COMMENTS.data ASC;")->fetch_all(MYSQLI_ASSOC);

$respuestas = $mysqli->query("SELECT 
    c.id, 
    c.descripcion, 
    c.data, 
    c.comment_id,
    u.id AS id_user, 
    u.name, 
    u.subname, 
    u.avatar
FROM COMMENTS c
JOIN USERS u ON c.id_usuari = u.id
WHERE c.comment_id IS NOT NULL
ORDER BY c.data ASC;")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<?php include 'header.php'; ?>
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Detalles de noticia</h1>
      </div>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h3 class="font-tertiary mb-5"><?php echo htmlspecialchars($noticia['tittle']); ?></h3>
        <img src="<?php echo htmlspecialchars($noticia['thumbnail']); ?>" alt="post-thumb" class="img-fluid w-100 mb-3">
        <p class="float-left mr-4">Post by Themefisher</p>
        <p><?php echo htmlspecialchars($noticia['data_publicacio']); ?></p>
        <div class="content">
          <p><?php echo htmlspecialchars($noticia['descripcion']); ?></p>
          <!-- Contenido adicional -->
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
              <span class="mr-3"><?php echo htmlspecialchars($comentario['data']); ?></span>
              <a href="#" class="btn btn-transparent py-1 px-2"><i class="ti-share-alt"></i> Reply</a>
              <p><?php echo htmlspecialchars($comentario['descripcion']); ?></p>
              <!-- Respuestas al comentario -->
              <?php foreach ($respuestas as $respuesta): ?>
                <?php if ($respuesta['comment_id'] == $comentario['id']): ?>
                  <div class="media mt-4">
                    <img src="<?php echo htmlspecialchars($respuesta['avatar']); ?>" class="img-fluid align-self-start mr-3" alt="Avatar" width="93px">
                    <div class="media-body">
                      <h5 class="mb-0 text-secondary"><?php echo htmlspecialchars($respuesta['name']); ?>.</h5>
                      <span class="mr-3"><?php echo htmlspecialchars($respuesta['data']); ?></span>
                      <p><?php echo htmlspecialchars($respuesta['descripcion']); ?></p>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Latest News</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <?php foreach($ultimanoticias as $ultimanoticia): ?>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <article class="card">
            <img src="<?php echo htmlspecialchars($ultimanoticia['thumbnail']); ?>" alt="post-thumb" class="card-img-top mb-2" width="200px" height="200px">
            <div class="card-body p-0">
              <time><?php echo date('F j, Y', strtotime($ultimanoticia['data_publicacio'])); ?></time>
              <a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline"><?php echo htmlspecialchars($ultimanoticia['tittle']); ?></a>
              <a href="#" class="btn btn-transparent">Read more</a>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/venobox/venobox.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="plugins/counto/apear.js"></script>
<script src="plugins/counto/counTo.js"></script>
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>
</body>
</html>