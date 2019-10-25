<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
<?php 

class Product{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function productInsert($data,$file){
		var_dump($data);
		die();
		// $;pdata=$this->fm->validation($data);
		$productName=mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId=mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId=mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body=mysqli_real_escape_string($this->db->link,$data['body']);
		$price=mysqli_real_escape_string($this->db->link,$data['price']);
		$type=mysqli_real_escape_string($this->db->link,$data['type']);
		$netprice=mysqli_real_escape_string($this->db->link,$data['netprice']);
		$quantity=mysqli_real_escape_string($this->db->link,$data['quantity']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
		if ($productName==""||$catId==""||$brandId==""||$body==""||$price==""||$file_name==""||$type==""||$quantity==""||$netprice=="") {
			$msg="<span class='error'> field must not be empty</span>";
			return $msg;

 }elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";

 }else{
 	 move_uploaded_file($file_temp, $uploaded_image);
 	 $query = "INSERT INTO product(productName,catId,brandId,body,netprice,price,quantity,image,type)
    VALUES('$productName','$catId','$brandId','$body','$netprice','$price','$quantity', '$uploaded_image','$type')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
			$msg="<span class='success'>product insert successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>Product  not insert .</span>";
			return $msg;
		}

 }

	}
public function mm(){
$lowStockSql = "SELECT * FROM product";
$lowStockQuery = $this->db->select($lowStockSql);
$re = $lowStockQuery->num_rows;
if ($re<=4){
$lowStockSql ="SELECT * FROM product WHERE quantity <= 4";
$lowStockQuery = $this->db->select($lowStockSql);

return $lowStockQuery;
}
// $connect->close();
}
	public function getAllProduct(){
		$query="select p.*,c.catName,b.brandName
		from product as p,category as c,brand as b
		where p.catId=c.catId and p.brandId=b.brandId
		order by p.productId desc";
		// $query="select * from product order by productId DESC";
		$result=$this->db->select($query);
		return $result;
	}
	public function getAllLowerProduct(){
		$query="select p.*,c.catName,b.brandName
		from product as p,category as c,brand as b
		where p.catId=c.catId and p.brandId=b.brandId and p.quantity <=4
		order by p.productId desc";
		// $query="select * from product order by productId DESC";
		$result=$this->db->select($query);
		return $result;
	}
	public function getPdById($id){
		$query="select * from product where productId='$id'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function productUpdate($data,$file,$id){
			$productName=mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId=mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId=mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body=mysqli_real_escape_string($this->db->link,$data['body']);
		$price=mysqli_real_escape_string($this->db->link,$data['price']);
		$type=mysqli_real_escape_string($this->db->link,$data['type']);
		$netprice=mysqli_real_escape_string($this->db->link,$data['netprice']);
		$quantity=mysqli_real_escape_string($this->db->link,$data['quantity']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
		if ($productName==""||$catId==""||$brandId==""||$body==""||$price==""||$type=="" ||$quantity==""||$netprice=="") {
			$msg="<span class='error'> field must not be empty</span>";
			return $msg;

 }else{
 	if (!empty($file_name)) {
 		
 	
 if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";

 }else{
 	 move_uploaded_file($file_temp, $uploaded_image);
    $query="update product 
    set
    productName ='$productName',
    catId       ='$catId',
    brandId     ='$brandId',
    body        ='$body',
    netprice    ='$netprice',
    price       ='$price',
    quantity    ='$quantity',
    image       ='$uploaded_image',
    type        ='$type'
    where productId='$id'";

    $productUpdate=$this->db->update($query);
		if ($productUpdate) {
			$msg="<span class='success'>product updated successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>Product  not updated .</span>";
			return $msg;
		}

 }
}else{
    $query="update product 
    set
    productName ='$productName',
    catId       ='$catId',
    brandId     ='$brandId',
    body        ='$body',
    netprice    ='$netprice',
    price       ='$price',
    quantity    ='$quantity',
    type        ='$type'
    where productId='$id'";

    $productUpdate=$this->db->update($query);
		if ($productUpdate) {
			$msg="<span class='success'>product updated successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>Product  not updated .</span>";
			return $msg;
		}


 }

 }
	}
	public function searchProduct($searchid){
	   $query="(SELECT productId,productName,body,price,image AS type FROM product WHERE productName LIKE'%$searchid%') UNION (SELECT productId,catName,body,price,image AS type FROM category AS c,product AS p WHERE p.catId=c.catId AND catName LIKE'%$searchid%' ) UNION (SELECT productId,brandName,body,price,image AS type FROM brand AS b,product AS p WHERE p.brandId =b.brandId AND brandName LIKE'%$searchid%' )";

		$result=$this->db->select($query);
		return $result;
 
	}
	public function delPdById($id){
		$query="select * from product where productId='$id'";
		$getData=$this->db->select($query);
		if ($getData) {
			while ($delImg=$getData->fetch_assoc()) {
				$delLink=$delImg['image'];
				unlink($delLink);
			}
		}
		$delquery="delete from product where productId='$id'";
		$delquery=$this->db->delete($delquery);
		if ($delquery) {
		$msg="<span class='success'>product deleted successful</span>";
			return $msg;
        }else{
 		$msg="<span class='error'>product  not deleted!</span>";
			return $msg;
 	        }
	}
	public function getFeaturedProduct(){
		$query="select * from product where type='0' order by productId DESC limit 4";
 	$result=$this->db->select($query);
 	return $result;

	}
	public function getNewProduct(){
		$query="select * from product  order by productId DESC limit 4";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function getSingleProduct($id){
		$query="select p.*,c.catName,b.brandName
		from product as p,category as c,brand as b
		where p.catId=c.catId and p.brandId=b.brandId and productId='$id'";
		// $query="select * from product order by productId DESC";
		$result=$this->db->select($query);
		return $result;

	}
	public function latestAcer(){
		$query="select * from product where brandId='4'  order by productId DESC limit 1";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function latestFromIphone(){
		$query="select * from product where brandId='2'  order by productId DESC limit 1";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function latestFromSamsung(){
		$query="select * from product where brandId='1'  order by productId DESC limit 1";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function latestCanon(){
		$query="select * from product where brandId='5'  order by productId DESC limit 1";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function productByCat($id){
		$catId=mysqli_real_escape_string($this->db->link,$id);
		$query="select * from product where catId='$catId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function insertCompareData($productId,$userId){
		$userId=mysqli_real_escape_string($this->db->link,$userId);
		$productId=mysqli_real_escape_string($this->db->link,$productId);
		$comQuery="select * from compare where cusId ='$userId' and productId='$productId' ";
		$comCheck=$this->db->select($comQuery);
		if ($comCheck) {
			$msg="<span class='success'>Already Added </span>";
			return $msg;
		}

		$query="select * from product where productId='$productId'";
		$getProduct=$this->db->select($query);
		if ($getProduct) {
			while ($result=$getProduct->fetch_assoc()) {
				$productId=$result['productId'];
				$productName=$result['productName'];
				$price=$result['price'];
				$image=$result['image'];

				$query = "INSERT INTO compare( 	cusId  ,productId,productName,price,image)
              VALUES('$userId','$productId','$productName','$price', '$image')";
              $insertorde=$this->db->insert($query);
              if ($insertorde) {
			$msg="<span class='success'>Added to compare</span>";
			return $msg;
		}else{
			$msg="<span class='error'>not added</span>";
			return $msg;
		}
			}
		}
	}
	public function getComparedData($uid){
		$query="select * from compare where cusId ='$uid' order by comId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function delCompareData($userid){
		$delquery="delete from compare where cusId='$userid'";
		$delquery=$this->db->delete($delquery);

	}
	public function saveWlistData($id,$userId){
		$comQuery="select * from wlist where cusId ='$userId' and productId='$id' ";
		$comCheck=$this->db->select($comQuery);
		if ($comCheck) {
			$msg="<span class='success'>Already Added </span>";
			return $msg;
		}
		$query="select * from product where  	productId='$id'";
		$getProduct=$this->db->select($query);
		if ($getProduct) {
			while ($result=$getProduct->fetch_assoc()) {
				$productId=$result['productId'];
				$productId=$result['productId'];
				$productName=$result['productName'];
				$price=$result['price'];
				$image=$result['image'];

				$query = "INSERT INTO wlist( 	cusId ,productId,productName,price,image)
              VALUES('$userId','$productId','$productName','$price', '$image')";
              $insertorde=$this->db->insert($query);
              if ($insertorde) {
			$msg="<span class='success'>Added data wlist page</span>";
			return $msg;
		}else{
			$msg="<span class='error'>not added(wlist)</span>";
			return $msg;
		}
			}
		}
	}
	public function getkWlistData($uid){
		$query="select * from wlist where cusId ='$uid' order by wId desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function delwlistData($uid,$productId){
		$delquery="delete from wlist where cusId='$uid' and productId='$productId'";
		$delquery=$this->db->delete($delquery);
	}

	public function getAllBrand(){
		$query="select p.*,c.catName,b.brandName
		from product as p,category as c,brand as b
		where p.catId=c.catId and p.brandId=b.brandId 
		order by productId  limit 4";
		// $query="select * from product order by productId DESC";
		$result=$this->db->select($query);
		return $result;

	}
	public function getAllBrandd(){
		$query="select p.*,c.catName,b.brandName
		from product as p,category as c,brand as b
		where p.catId=c.catId and p.brandId=b.brandId
		";
		// $query="select * from product order by productId DESC";
		$result=$this->db->select($query);
		return $result;

	}
}
 ?>