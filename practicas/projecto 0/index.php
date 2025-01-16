<?php
class Libro {

    public String $titulo;
    public String $autor;
    public Int $anypublicacion;
    public String $foto;

    public function __construct(string $titulo, String $autor, Int $anypublicacion, String $foto){

        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anypublicacion = $anypublicacion;
        $this->foto = $foto;

    }
    public function detallesdelblibro() :string{
        return "El libro ". $this->titulo. " escrito por ". $this->autor. " fue publicado en el año ". $this->anypublicacion. ".";
    }
}
class Biblioteca{

    public $arraylibros = [];
    public function agregarlibro($titulo, $autor, $anypublicacion, $foto){
        
        array_push($arraylibros,$titulo,$autor,$anypublicacion,$foto);
    }
        public function mostrarlibros(){
            return $this->arraylibros;
        }
    }
    public function buscarlibroportitulo(){
        
    }
    




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecto 0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="container">
                <div class="card" style="width:18rem;">
                  <img src="" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    b5
                  </div>
                </div>
            </div>
        </div>
    </main>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>