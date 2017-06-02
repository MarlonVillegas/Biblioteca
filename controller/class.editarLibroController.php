<?php

class editarLibro extends controllerExtended {

    public function main(\request $request) {
        try {
            $this->loadTablelibro();

            $libro = new libro();
            $libro->setIsbn($request->getParam('isbn'));
            $libro->setNombre($request->getParam('nombre'));
            $libro->setAutor($request->getParam('autor'));
            $libro->setEditorial($request->getParam('editorial'));
            $libro->setNumeropaginas($request->getParam('numeropaginas'));
            $libro->setId($request->getParam('id'));

            $libroDAO = new libroDAOExt($this->getConfig());
            $respuesta1 = $libroDAO->update($libro);
            $respuesta2 = array(
                'code' => ($respuesta1 > 0) ? 200 : 500,
                'datos' => $respuesta1
            );

            $this->setParam('rsp', $respuesta2);
            $this->setView('imprimirJson');
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function loadTablelibro() {
        require $this->getConfig()->getPath() . 'model/table/table.libro.php';
        require $this->getConfig()->getPath() . 'model/interface/interface.libro.php';
        require $this->getConfig()->getPath() . 'model/DAO/class.libroDAO.php';
        require $this->getConfig()->getPath() . 'model/extended/class.libroDAOExt.php';
    }

}
