<?php

class libroDAOExt extends libroDAO {

    public function agregar(\libro$libro) {
        $sql = 'INSERT INTO libro (lib_isbn, lib_nombre, lib_autor, lib_editorial, lib_numeropaginas) VALUES (:isbn, :nombre, :autor, :editorial, :numeropaginas)';
        $params = array(
            ':id' => $libro->getId(),
            ':isbn' => $libro->getIsbn(),
            ':nombre' => $libro->getNombre(),
            ':autor' => $libro->getAutor(),
            ':editorial' => $libro->getEditorial(),
            ':numeropaginas' => $libro->getNumeropaginas(),
        );
        return $this->execute($sql, $params);
    }

}
