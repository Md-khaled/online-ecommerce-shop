<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 

 ?>
<?php 
class adminloging extends Session{
	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function adminLogin($email,$password){
		$email=$this->fm->validation($email);
		$password=$this->fm->validation($password);
		$email=mysqli_real_escape_string($this->db->link,$email);
		$password=mysqli_real_escape_string($this->db->link,$password);
		if (empty($email)||empty($password)) {
			$logmsg="usernme or password must not be empty";
			return $logmsg;
		}else{
			$query="select * from users where email='$email' and password='$password'";
			$result=$this->db->select($query);
			if ($result!=false) {
				$value=$result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("adminId",$value['userId']);
				Session::set("adminUser",$value['typeofuser']);
				Session::set("adminName",$value['name']);
				Session::set("adminRole",$value['role']);
				header("Location: dashbord.php");
			}else{
				$loginmsg="user or password not match!";
				return $loginmsg;
			}
		   }
        }
}
 ?>