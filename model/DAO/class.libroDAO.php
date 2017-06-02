<?php

class libroDAO extends dataSource implements ILibro{

    public function delete($id, $logico = true) {
        if ($logico === true) {
            $sql = 'UPDATE libro SET lib_deleted_at = now() WHERE lib_id = :id';
            $params = array(
                ':id' => $id
            );
            return $this->execute($sql, $params);
        } else if ($logico === false) {
            $sql = 'DELETE FROM libro WHERE lib_id = :id AND lib_deleted_at IS NULL';
            $params = array(
                ':id' => (integer) $id
            );
            return $this->execute($sql, $params);
        }
    }

    public function insert(\libro $libro) {
        $sql = 'INSERT INTO libro (lib_isbn, lib_nombre, lib_autor, lib_editorial, lib_numeropaginas) VALUES (:isbn, :nombre, :autor, :editorial, :numeropaginas)';
        $params = array(
            ':isbn' => $libro->getIsbn(),
            ':nombre' => $libro->getNombre(),
            ':autor' => $libro->getAutor(),
            ':editorial' => $libro->getEditorial(),
            ':numeropaginas' => $libro->getNumeropaginas(),
        );
        return $this->execute($sql, $params);
    }

    public function search($isbn) {
        $sql = 'SELECT lib_id, lib_isbn, lib_nombre, lib_autor, lib_editorial, lib_numeropaginas FROM libro WHERE lib_isbn = :isbn';
        $params = array(
            ':isbn' => $isbn
        );
        return $this->query($sql, $params);
    }

    public function select() {
        $sql = 'SELECT lib_id, lib_isbn, lib_nombre, lib_autor, lib_editorial, lib_numeropaginas FROM libro WHERE lib_deleted_at IS NULL';
        return $this->query($sql);
    }

    public function selectById($id) {
        $sql = 'SELECT lib_id, lib_isbn, lib_nombre, lib_autor, lib_editorial, lib_numeropaginas FROM libro WHERE lib_id = :id';
        $params = array(
            ':id' => $id
        );
        return $this->query($sql, $params);
    }

    public function update(\libro $libro) {
        $sql = 'UPDATE libro SET lib_isbn = :isbn, lib_nombre = :nombre, lib_autor = :autor, lib_editorial = :editorial, lib_numeropaginas = :numeropaginas WHERE lib_id = :id';
        $params = array(
            ':isbn' => $libro->getIsbn(),
            ':nombre' => $libro->getNombre(),
            ':autor' => $libro->getAutor(),
            ':editorial' => $libro->getEditorial(),
            ':numeropaginas' => $libro->getNumeropaginas(),
            ':id' =>$libro->getId(),
        );
        return $this->execute($sql, $params);
    }

}
