<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); ?>
 <?php 
 class Catagory {
 	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function catInsert($CatName){
		$CataName=$this->fm->validation($CatName);
		$CataName=mysqli_real_escape_string($this->db->link,$CataName);
		if (empty($CataName)) {
			$msg="<span class='success'>catagory field must not ve empty</span>";
			return $msg;	
	}else{
		$query="insert into category(catName) values('$CataName')";
		$catInsert=$this->db->insert($query);
		if ($catInsert) {
			$msg="<span class='success'>catagory insert successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>catagory  not insert .</span>";
			return $msg;
		}
	}
 }
 public function getAllCat(){
 	$query="select * from category order by catId DESC";
 	$result=$this->db->select($query);
 	return $result;

 }
 public function getCatById($id){
 	$query="select * from category where catId='$id'";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function catUpdate($CatName,$id){
 	$CataName=$this->fm->validation($CatName);
		$CataName=mysqli_real_escape_string($this->db->link,$CataName);
		$id=mysqli_real_escape_string($this->db->link,$id);
		if (empty($CataName)) {
			$msg="<span class='error'>catagory field must not be empty</span>";
			return $msg;

 }else{
 	$qury="update category set catName='$CataName' where catId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>catagory updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>catagory  not updated!</span>";
			return $msg;
 	}
 }
}
public function delCatById($id){
	$query="delete from category where catId='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>catagory deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>catagory  not deleted!</span>";
			return $msg;
 	}
}
}
  ?>