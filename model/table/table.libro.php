<?php

class libro {

    private $id;
    private $isbn;
    private $nombre;
    private $autor;
    private $editorial;
    private $numeropaginas;
    private $created_at;
    private $updated_at;
    private $deleted_at;

    function getId() {
        return $this->id;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAutor() {
        return $this->autor;
    }

    function getEditorial() {
        return $this->editorial;
    }

    function getNumeropaginas() {
        return $this->numeropaginas;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function getUpdated_at() {
        return $this->updated_at;
    }

    function getDeleted_at() {
        return $this->deleted_at;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    function setNumeropaginas($numeropaginas) {
        $this->numeropaginas = $numeropaginas;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    function setDeleted_at($deleted_at) {
        $this->deleted_at = $deleted_at;
    }



}
