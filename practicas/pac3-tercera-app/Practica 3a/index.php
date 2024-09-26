<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Album example · Bootstrap</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">



  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>

  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background
              context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off
              to some social networking sites or contact information.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
            viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" /></svg>
          <strong>Album</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
            etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php

$Superheroes =[
    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/chris-evans-expects-avengers-4-to-be-his-last-mcu-movie_ksk9.jpg", "nombre" => "Steve" , "Apellidos" => "Rogers", "Alias" => "Capitan America", "descripcion" => "Esto es solo una descripcion random para poner al capitan america"],

    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/ocA7mZJmT97HzvesMjkXKA.jpg", "nombre" => "Natasha" , "Apellidos" => "Romanoff", "Alias" => "Viuda Negra", "descripcion" => "Esto es solo una descripcion random para poner a Natasha"],

    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2021/02/hulk.jpg", "nombre" => "Bruce" , "Apellidos" => "Banner", "Alias" => "Hulk", "descripcion" => "Esto es solo una descripcion random para poner a Hulk"],

    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/spider-man_main-1280x720.jpg", "nombre" => "Peter" , "Apellidos" => "Parker", "Alias" => "Spyderman", "descripcion" => "Esto es solo una descripcion random para poner al spyderman"],

    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/the-evolution-of-iron-man-in-the-mcu.jpg", "nombre" => "Tony" , "Apellidos" => "Stark", "Alias" => "Iron man", "descripcion" => "Esto es solo una descripcion random para poder poner a Tony"],
    
    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/antman-falcon.jpg", "nombre" => "Scott" , "Apellidos" => "Lang", "Alias" => "Ant man", "descripcion" => "Esto es solo una descripcion random para poder poner a Ant man"],
    
    ["url" => "https://sm.ign.com/t/ign_es/news/d/daredevil-/daredevil-reboot-reportedly-set-to-begin-production-as-disne_sh58.960.jpg", "nombre" => "Matt" , "Apellidos" => "Murdock", "Alias" => "Daredevil", "descripcion" => "Esto es solo una descripcion random para poder poner a Daredevil"],

    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/mcu-heroes-star-lord.jpg", "nombre" => "Peter" , "Apellidos" => "Quill", "Alias" => "Star Lord", "descripcion" => "Esto es solo una descripcion random para poder poner a Starlord"],

    ["url" => "https://oyster.ignimgs.com/wordpress/stg.ign.com/2020/12/avengers-4-what-hawkeyes-ronin-costume-reveals-about-the-sta_qn9z.jpg", "nombre" => "Clint" , "Apellidos" => "Barton", "Alias" => "Ojo de halcon", "descripcion" => "Esto es solo una descripcion random para poder poner a Clint"],

    ["url" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm1RHexwsbfmqr0pen88LyMNZx-_MoKzLFnA&s", "nombre" => "Wade" , "Apellidos" => "Wilson", "Alias" => "Deadpool", "descripcion" => "Esto es solo una descripcion random para poder poner a Deadpool"]
    
];

foreach ($Superheroes as $Superheroe){
  
        echo "<div class='col'>";
          echo "<div class='card shadow-sm'>";
                        echo "<img class='bd-placeholder-img card-img-top' width='100%' height='225' src='{$Superheroe['url']}'>";
              echo "<div class='card-body'>";
                echo "<h3> {$Superheroe['nombre']} {$Superheroe['apellidos']} ({$Superheroe['Alias']}) </h3>";
                  echo "<p>{$Superheroe['descripcion']}</p>";
                  echo "<div class='d-flex justify-content-between align-items-center'>";
                  echo "<div class='btn-group'>";
                  echo "<button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
                  <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>";
                    echo "</div><small class='text-muted'>9 mins</small></div>
                      </div>
                  </div>
            </div>";
    }
    ?>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
          href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>

</body>

</html>
