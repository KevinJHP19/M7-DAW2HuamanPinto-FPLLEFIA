<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php">ExploraVia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="news.php">News</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="faqs.php">FAQ's</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <?php if(isset($_SESSION['user_id'])): ?>
          <li class="nav-item">
            <img src="<?php echo $_SESSION['user_avatar']; ?>" alt="Avatar" class="rounded-5 img-fluid" style="width: 50px; height: 50px; border-radius: 50%;">
          </li>
          <li class="nav-item">
            <span class="text-white nav-link">Bienvenido, <?php echo $_SESSION['user_name']; ?>!</span>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>
          </li>
          <?php if($_SESSION['user_rol'] === 'admin'): ?>
            <li class="nav-item">
              <a href="admin/admin.php"  width=100px height=100px style="color: gray; font-size: 50px; margin-left:10px;"><i class="fa-solid fa-gear" ></i></a>
            </li>
            
          
          <?php else:?>


          <?php endif; ?>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>