<?php
class User {
  private $db;


  public function __construct(){
    $this->db = new Database; //Brad leaves off the ()
  }


  /* ===========================================================================
                              register()
  =========================================================================== */


  public function register($data){
    $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

    //Bind values
    $this->db->bind(':name',     $data['name']);
    $this->db->bind(':email',    $data['email']);
    $this->db->bind(':password', $data['password']);

    //Execute
    if( $this->db->execute() ){
      return true;
    } else {
      return false;
    }
  }


  /* ===========================================================================
                                    login()
  =========================================================================== */


                      //  email    unhashed
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;

      //PHP's password_veriy() is able to compare a text password to a hashed password.
      if ( password_verify($password, $hashed_password) ){
       return $row;
      } else {
        return false;
      }
    }


  /* ===========================================================================
                              findUserByEmail()
  =========================================================================== */


  //Find user by email
  //This is used in the Users controller to check that the email is not already taken.
  public function findUserByEmail($email){
    $this->db->query('SELECT * FROM users WHERE email = :email');

    //Bind the value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }


  /* ===========================================================================
                              getUserById()
  =========================================================================== */


  public function getUserById($id){
    $this->db->query('SELECT * FROM users WHERE id = :id');

    //Bind value
    $this->db->bind(':id', $id);
    $row = $this->db->single();

    //Check row
    if($this->db->rowCount() > 0){
      return $row;
    } else {
      return false;
    }
  }
}
?>
