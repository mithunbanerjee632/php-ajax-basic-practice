<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

class Project{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function checkUserName($username){
      $username = mysqli_real_escape_string($this->db->link, $username);	
      $query = "SELECT * FROM tbl_user WHERE username='$username'";
      $getuser = $this->db->select($query);

      if($username == ""){
      	echo "<span class='error'>Enter Your Username</span>";
      	exit();
      }elseif($getuser){
      	echo "<span class='error'><b>$username</b> Not Available</span>";
      	exit();
      }else{
      	echo "<span class='success'><b>$username</b> Available</span>";
      	exit();
      }
  }

	
}
?>