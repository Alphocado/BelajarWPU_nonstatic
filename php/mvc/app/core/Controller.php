<?php 

class Controller {
  public function view($view, $data = [])
  {
    // untuk mencegah error
    if( file_exists('../app/views/'.$view.'.php') ){
      require_once '../app/views/' . $view . '.php';
    } else {
      echo "File does not exist";
    }
  }

  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
}

?>