<?php
  class Tests extends Controller {
    public function __construct(){
      $this->testModel = $this->model('Test');
    }


    public function index() {
      $tests = $this->testModel->getTests();

      $data  = [
        'title' => 'Test',
        'tests' => $tests
      ];

      $this->view("tests/test", $data);
    }
  }
?>
