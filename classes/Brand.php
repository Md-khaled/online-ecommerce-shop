<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>

<?php 

class Brand  {
	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function brandInsert($barandName){
		$barandName=$this->fm->validation($barandName);
		$barandName=mysqli_real_escape_string($this->db->link,$barandName);
		if (empty($barandName)) {
			$msg="<span class='success'>Brand field must not ve empty</span>";
			return $msg;	
	}else{
		$query="insert into brand(brandName) values('$barandName')";
		$brandInsert=$this->db->insert($query);
		if ($brandInsert) {
			$msg="<span class='success'>brand insert successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>brand  not insert .</span>";
			return $msg;
		}
	}
 }
 public function getAllBrand(){
 	$query="select * from brand order by brandId DESC";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function getBrandById($id){
 	$query="select * from brand where brandId='$id'";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function brandUpdate($brandName,$id){
 	$brandName=$this->fm->validation($brandName);
		$brandName=mysqli_real_escape_string($this->db->link,$brandName);
		$id=mysqli_real_escape_string($this->db->link,$id);
		if (empty($brandName)) {
			$msg="<span class='error'>Brand field must not be empty</span>";
			return $msg;

 }else{
 	$qury="update brand set brandName='$brandName' where brandId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>brand updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>Brand  not updated!</span>";
			return $msg;
 	}
 }
 }
 public function delBrandById($id){
 	$query="delete from brand where brandId='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>brand deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>brand  not deleted!</span>";
			return $msg;
 	}
}

}
 ?>