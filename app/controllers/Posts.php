<?php
class Posts extends Controller {
  public function __construct(){
    if( !isLoggedIn() ){
      redirect('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }


  /* ===========================================================================
                                  index()
  =========================================================================== */


  public function index(){
    $posts = $this->postModel->getPosts();
    $data  = ['posts' => $posts];

    $this->view('posts/index', $data);
  }


  /* ===========================================================================
                                      add()
  =========================================================================== */


  public function add(){
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){


      /* ================================
         Sanitization of POST data
      ================================ */


      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
          'title'     => trim($_POST['title']),
          'body'      => trim($_POST['body']),
          'user_id'   => $_SESSION['user_id'],
          'title_err' => '',
          'body_err'  => ''
      ];


      /* ================================
              Validate title
      ================================ */


      if ( empty($data['title']) ){
        $data['title_err'] = 'Please enter title.';
      }


      /* ================================
              Validate body
      ================================ */


      if ( empty($data['body']) ){
        $data['body_err'] = 'Please enter body text.';
      }


      /* ================================
          check if errors are present
      ================================ */


      if( empty($data['title_err']) && empty($data['body_err']) ){

        if( $this->postModel->addPost($data) ){
          flash('post_message', 'Post Added');
          redirect('posts');
        } else {
          die('Something went wrong.');
        }

      } else {
        $this->view('posts/add', $data);
      }


    /* ==========================================
     if (! $_SERVER['REQUEST_METHOD'] == 'POST' )
    ============================================ */


    } else {
      $data = [ 'title' => '', 'body'  => ''];

      $this->view('posts/add', $data);
    }
  } //End of add()


  /* ===========================================================================
                                show()
  =========================================================================== */


  public function show($id){
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
    $data = [ 'post' => $post, 'user' => $user ];

    $this->view('posts/show', $data);
  }


  /* ===========================================================================
                                        edit()
  =========================================================================== */


  public function edit($id){
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){


      /* ================================
         Sanitization of POST data
      ================================ */


      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id'        => $id,
        'title'     => trim($_POST['title']),
        'body'      => trim($_POST['body']),
        'user_id'   => $_SESSION['user_id'],
        'title_err' => '',
        'body_err'  => ''
      ];


      /* ================================
              Validate title
      ================================ */


      if(empty($data['title'])){
        $data['title_err'] = 'Please enter title';
      }


      /* ================================
              Validate body
      ================================ */


      if ( empty($data['body']) ){
        $data['body_err'] = 'Please enter body';
      }


      /* ================================
          check if errors are present
      ================================ */


      if ( empty($data['title_err']) && empty($data['body_err']) ){

        if ( $this->postModel->updatePost($data) ){
          flash('post_message', 'Post Updated.');
          redirect('posts');
        } else {
          die('Something went wrong.');
        }

      } else {
        $this->view('posts/edit', $data);
      }


    /* ==========================================
     if (! $_SERVER['REQUEST_METHOD'] == 'POST' )
    ============================================ */


    } else {
      $post = $this->postModel->getPostById($id);

      if ( $post->user_id != $_SESSION['user_id'] ){
        redirect('posts');
      }

      $data = [
        'id'    => $id,
        'title' => $post->title,
        'body'  => $post->body
      ];

      $this->view('posts/edit', $data);
    }
  }//End of edit()


  /* ===========================================================================
                                delete()
  =========================================================================== */


  public function delete($id){
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
      $post = $this->postModel->getPostById($id);

      if($post->user_id != $_SESSION['user_id']){
        redirect('posts');
      }


      if($this->postModel->deletePost($id)){
        flash('post_message', 'Post Removed.');
        redirect('posts');
      } else {
        die('Something went wrong.');
      }

    } else {
      redirect('posts');
    }
  }//End of delete()
} //End of class Posts
?>
