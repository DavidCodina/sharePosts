<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }


    /* =========================================================================
                                   register()
    ========================================================================== */


    public function register(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){


        /* ================================
           Sanitization of POST data
        ================================ */


        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        /* ================================
          Declare/Initialize $data array
        ================================ */


        $data = [
          //Because a POST request has now occurred, we want to populate
          //these keys with values from the form submission.
          'name'             => trim($_POST['name']),
          'email'            => trim($_POST['email']),
          'password'         => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),

          'name_err'         => '',
          'email_err'        => '',
          'password_err'     => '',
          'confirm_password_err' => ''
        ];


        /* ================================
                Validate email
        ================================ */


        if ( empty($data['email']) ){
          $data['email_err'] = 'Please enter email.';
        } else {
          if ( $this->userModel->findUserByEmail($data['email']) ){
            $data['email_err'] = 'Email is already taken.';
          }
        }


        /* ================================
                Validate name
        ================================ */


        if ( empty($data['name']) ){
          $data['name_err'] = 'Please enter name.';
        }


        /* ================================
                Validate password
        ================================ */


        if ( empty($data['password']) ){
          $data['password_err'] = 'Please enter password.';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters.';
        }


        /* ================================
                Validate confirm_password
        ================================ */


        if ( empty($data['confirm_password']) ){
          $data['confirm_password_err'] = 'Please confirm password.';
        } else {
          if ($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match.';
          }
        }


        /* ================================
            check if errors are present
        ================================ */


        if (   empty($data['email_err'])
            && empty($data['name_err'])
            && empty($data['password_err'])
            && empty($data['confirm_password_err']) ){

          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          if ( $this->userModel->register($data) ){
            flash('register_success', 'You are registered and can log in.');
            redirect('users/login');
          } else {
            die('Something went wrong.');
          }

        } else {
          $this->view('users/register', $data);
        }

      } else {
        $data = [
          'name'             => '',
          'email'            => '',
          'password'         => '',
          'confirm_password' => '',
          'name_err'         => '',
          'email_err'        => '',
          'password_err'     => '',
          'confirm_password_err' => ''
        ];

        $this->view('users/register', $data);
      }
    }


    /* =========================================================================
                                   login()
    ========================================================================= */


    public function login(){
      //Check for POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){


        /* ================================
           Sanitization of POST data
        ================================ */


        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'email'        => trim($_POST['email']),
          'password'     => trim($_POST['password']),
          'email_err'    => '',
          'password_err' => '',
        ];


        /* ================================
                Validate email
        ================================ */


        if ( empty($data['email']) ){
          $data['email_err'] = 'Pleae enter email.';
        }


        /* ================================
                Validate password
        ================================ */

        if ( empty($data['password']) ){
          $data['password_err'] = 'Please enter password.';
        }


        /* ================================
            Check for user/email
        ================================ */


        if ( $this->userModel->findUserByEmail($data['email']) ){
          //User found
        } else {
          //User not found
          $data['email_err'] = 'No user found.';
        }


        /* ================================
            Make sure errors are empty
        ================================ */


        if ( empty($data['email_err']) && empty($data['password_err']) ){
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if ($loggedInUser) {
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';
            $this->view('users/login', $data);
          }

        } else {
          $this->view('users/login', $data);
        }


      } else {
        $data =[
          'email'        => '',
          'password'     => '',
          'email_err'    => '',
          'password_err' => '',
        ];

        $this->view('users/login', $data);
      }
    }


    /* =========================================================================
                                createUserSession()
    ========================================================================= */



    public function createUserSession($user){
      $_SESSION['user_id']    = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name']  = $user->name;

      redirect('posts');
    }


    /* =========================================================================
                                    logout()
    ========================================================================= */


    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }
  } //End of class Users extends Controller
?>
