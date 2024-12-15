<?php

class libro{
    public $titulo;

    public $autor;

    public function descripcion()
    {
        return "El libro se llama " . $this->titulo . " y es escrito por " . $this->autor;
    }
};


