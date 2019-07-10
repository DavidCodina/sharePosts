<?php
  class Pages extends Controller {
    public function __construct(){}

    public function index() {
      if ( isLoggedin() ) {
        redirect('posts');
      }

      $data = [
        'title'       => 'SharePosts',
        'description' => "A simple social network built on the <code>php_mvc</code> framework."
      ];

      $this->view("pages/index", $data);
    }


    public function about(){
      $data = [
        'title'       => 'About',
        'description' => "This App allows users to share posts with other users."
      ];
      $this->view("pages/about", $data);
    }
    //Create additional methods for rendering additional views...
  }
?>
