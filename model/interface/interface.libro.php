<?php

interface ILibro {

    public function select();

    public function selectById($id);

    public function insert(libro $libro);

    public function update(libro $libro);

    public function delete($id, $logico);

    public function search($isbn);
}