<?php
class Controller {
  //Load Model
  public function model($model){
    require_once '../app/models/' . $model . '.php';
    return new $model();
  }
  

  //Load View
  public function view($view, $data = []){
    //Check the the View exists file before requiring it.
    if ( file_exists('../app/views/' . $view . '.php' ) ){
       require_once '../app/views/' . $view . '.php';
    } else {
      //View does not exist
      die('The View does not exist...');
    }
  }
}
?>
