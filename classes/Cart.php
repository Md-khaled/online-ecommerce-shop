<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
<?php 
class Cart{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function addToCart($quantity,$id){
		$quantity=$this->fm->validation($quantity);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
		$productId=mysqli_real_escape_string($this->db->link,$id);
		$sId=session_id();
		$query="select * from product where productId='$id'";
		$result=$this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price       = $result['price'];
		$image       = $result['image'];
		$qun         =$result['quantity'];
		$chquery="select * from cart where productId='$id' and sId='$sId'";
		$getPro=$this->db->select($chquery);
		if ($getPro) {
			$msg="Product already added";
			return $msg;
		}else{
			if ($quantity>$qun) {
				$msg="Number of available quantity $qun";
				return $msg;
			}else{
		 $query = "INSERT INTO cart(sId,productId,productName,price,quantity,image)
    VALUES('$sId','$productId','$productName','$price','$quantity', '$image')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
			header("Location: cart.php");
		}else{
		header("Location: 404.php");
		}
	}
	 }
	}
	public function getCartProduct(){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function updateCartQuantity($cartId,$quantity){
		$cartId=mysqli_real_escape_string($this->db->link,$cartId);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);

		$qury="update cart set quantity='$quantity' where cartId='$cartId'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		header("Location: cart.php");
 	}else{
 		$msg="<span class='error'>Quantity  not updated!</span>";
			return $msg;
 	}

	}
	public function delProductByCart($delId){
		$delId=mysqli_real_escape_string($this->db->link,$delId);
		$query="delete from cart where cartId='$delId'";
	$deldata=$this->db->delete($query);
	if ($deldata) {	
		echo("<script>window.location='cart.php';</script>");
		
			
}else{
 		$msg="<span class='error'>Product  not deleted!</span>";
			return $msg;
 	}
	}
	public function checkCartTable(){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	public function delUserCart(){
		$sId=session_id();
		$query="delete from cart where sId='$sId'";
		$this->db->delete($query);
	}
	// public function orderProduct($uid){
	// 	$sId=session_id();
	// 	$query="select * from cart where sId='$sId'";
	// 	$getProduct=$this->db->select($query);
	// 	if ($getProduct) {
	// 		while ($result=$getProduct->fetch_assoc()) {
	// 			$productId=$result['productId'];
	// 			$productId=$result['productId'];
	// 			$productName=$result['productName'];
	// 			$quantity=$result['quantity'];
	// 			$price=$result['price']*$quantity;
	// 			$image=$result['image'];

	// 			$query = "INSERT INTO cus_order( 	cusId ,productId,productName,quantity,price,image)
 //              VALUES('$uid','$productId','$productName','$quantity','$price', '$image')";
 //              $insertorde=$this->db->insert($query);
	// 		}
	// 	}
		
	// }
	// dummy code for dummy function
	public function orderProduct($uid){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
		$result=$this->db->select($query)->fetch_assoc();
		      $productId=$result['productId'];
				$productId=$result['productId'];
				$productName=$result['productName'];
				$quantity=$result['quantity'];
				$price=$result['price']*$quantity;
				$image=$result['image'];
				$vat=$price* .1;
				$total=$price+$vat;

				$query="select * from product where productId='$productId'";
				$result=$this->db->select($query)->fetch_assoc();
				$qty = $result['quantity'];
				$uqty=$qty-$quantity;
				$qury="update product set quantity='$uqty' where productId='$productId'";
 	            $update_row=$this->db->update($qury);

 	            $query="SELECT * FROM users WHERE role='0'";
				$re=$this->db->select($query)->fetch_assoc();
				$fromadminEmail=$re['email'];
				//return $fromadminEmail;

 	            $query="select * from users where userId='$uid'";
				$result=$this->db->select($query)->fetch_assoc();
				$name=$result['name'];
				$to=$result['email'];
				$subject="Your Purchased Details";
				$message="Welcome to visit our website & thankyou for purchasing";
				 include 'mailSender.php';
				 $mail->setFrom($fromadminEmail, 'BD Online Shop & Services');
		         $mail->addReplyTo($fromadminEmail, 'BD Online Shop & Services');
		         $mail->Subject = $subject;
		       	 $mail->Body = 'Dear '.$name.','.$message.'.Your total payable amount(including vat) : '.$total.' We will contact you withing 2 days with delivery details. Thank You.';
		       	 	$mail->addAddress($to, $name);
		       	 	// if(!$mail->send()) {
		          //  echo("<script>alert('Message could not be sent');</script>");
		          //   echo 'Mailer Error: ' . $mail->ErrorInfo;
		          //   } else {
		          //   	echo("<script>alert('Message has been sent');</script>");
 	            $query = "INSERT INTO payment( userId ,productId,quantity,total_amount)
              VALUES('$uid','$productId','$quantity','$price')";
              $insertorde=$this->db->insert($query);

				$query = "INSERT INTO cus_order( userId ,productId,productName,quantity,price,image)
              VALUES('$uid','$productId','$productName','$quantity','$price', '$image')";
              $insertorde=$this->db->insert($query);

              	$sId=session_id();
				$query="delete from cart where sId='$sId'";
				$delcart=$this->db->delete($query);

				 $query="SELECT MAX(orderId) AS id FROM cus_order";
				$result=$this->db->select($query)->fetch_assoc();
				$orderId=$result['id'];
				if ($insertorde) {
            	echo("<script>window.location='success.php?smid=$uid & orderId=$orderId';</script>");
            //}
          }
			
		
	}
	// dummy code for dummy function
	// public function getlastid(){
 //      $query="SELECT MAX(orderId) AS id FROM cus_order";
 //      $result=$this->db->select($query);
 //      //$result=$result['roll'];
 //      return $result; 
	// }

	public function payableAmount($smid,$orderId){
		$sId=session_id();
		$query="select price from cus_order where userId='$smid' and orderId='$orderId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function getOrderProduct($uid){
		$query="select * from cus_order where userId='$uid' order by date desc";
 	$result=$this->db->select($query);
 	return $result;

	}
	public function checkOrder($uid){
	
		$query="select * from cus_order where userId='$uid'";
		$result=$this->db->select($query);
		return $result;
	}
	public function getAllProduct(){
		$query="select * from cus_order order by date desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getDeliveryProduct(){
		$query="select * from pro_delivery";
		$result=$this->db->select($query);
		return $result;
	}
	public function getSpecificProduct($id,$time){
		$query="select * from cus_order where userId='$id' and date='$time'";
		$result=$this->db->select($query);
		return $result;
	}
	public function productShift($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='1' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function delShiftedOrder($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$query="delete from cus_order where userId ='$id' and date ='$time' and price ='$price'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>data deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>data  not deleted!</span>";
			return $msg;
 	}
	}
	public function productShiftConfirm($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='2' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function insertService($orderId,$productName,$quantity,$price,$serviceman,$delivery){
		$orderId=$this->fm->validation($orderId);
		$productName=$this->fm->validation($productName);
		$quantity=$this->fm->validation($quantity);
		$price=$this->fm->validation($price);
		$serviceman=$this->fm->validation($serviceman);
		$delivery=$this->fm->validation($delivery);
		$orderId=mysqli_real_escape_string($this->db->link,$orderId);
		$productName=mysqli_real_escape_string($this->db->link,$productName);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);
        $price=mysqli_real_escape_string($this->db->link,$price);
        $serviceman=mysqli_real_escape_string($this->db->link,$serviceman);
        $delivery=mysqli_real_escape_string($this->db->link,$delivery);
        $amount=$quantity*$price;

		if (empty($delivery)) {
			$msg="<span class='error'> Date Field must not be empty!</span>";
			return $msg;
		}elseif (empty($serviceman)) {
			$msg="<span class='error'>Service & Date Field must not be empty!</span>";
			return $msg;
		}else{

		 $query = "INSERT INTO pro_delivery(orderId,productName,quantity,price, 	total_amount,serviceman,delivery_date)
       VALUES('$orderId','$productName','$quantity','$price','$amount', '$serviceman','$delivery')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
 		$msg="<span class='success'> Insert successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  Not Insert!</span>";
			return $msg;
 	}
	 }
	}
	
}
 ?>