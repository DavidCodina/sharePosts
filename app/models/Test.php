<?php
class Test {
  private $db;


  public function __construct(){
    $this->db = new Database;
  }


  public function getTests(){
    $this->db->query("SELECT * FROM tests");

    $results = $this->db->resultSet();

    return $results;
    //or just return $this->db->resultSet();
  }
}
?>
