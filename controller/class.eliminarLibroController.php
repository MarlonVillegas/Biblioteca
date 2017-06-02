<?php class eliminarLibro extends controllerExtended {

  public function main(\request $request) {
    try {
      $this->loadTablelibro();

      $libroDAO = new libroDAOExt($this->getConfig());
      $respuesta1 = $libroDAO->delete($request->getParam('id'));
 
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



