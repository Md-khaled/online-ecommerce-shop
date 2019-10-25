<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
 <?php
if (!isset($_GET['smid'])||$_GET['smid']==NULL ||$_GET['smid']!=$_GET['smid']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['catid'];
    $smid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['smid']);
     $orderId=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['orderId']);
    echo( $orderId);
}
?>
 <style>
 	.success{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto; padding: 50px;}
    .success h2{
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
        padding-bottom: 1px;
    }
    .success p{
      line-height: 25px;
    }
 </style>
 <div class="main">
    <div class="content">
       <div class="section group">
       <div class="success">
       <h2>Success</h2>
      
       <?php
        $sum=0;
       //$uid= Session::get("userId");
       $amount=$ct->payableAmount($smid,$orderId);
      
       if ($amount) {
       
          while ($result=$amount->fetch_assoc()) {
            $price=$result['price'];
            $sum=$sum+$price;
            
          }
        } 
        ?>
       <p>Total payable amount(including vat) : $
       <?php 
      // echo($sum."<br>");
       $vat=$sum * .1;
       $total=$sum+$vat;
       echo($total);
        ?>
       </p>
       <p>thank you for parchase.Receive your order succseefully.we will contact you asap with delivery details.here is your order details....<a href="orderdetails.php">visit here..</a> OR Check your mail <a href="https://www.google.com/gmail/">mail..</a></p>
          
       </div>

        
          </div>
   
 		
 	</div>
	</div>
   <?php include("inc/footer.php"); ?>
