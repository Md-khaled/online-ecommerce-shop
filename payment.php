<?php ob_start(); ?>
<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
 <style>
 	.payment{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto; padding: 50px;}
    .payment h2{
        border-bottom: 1px solid #ddd;
        margin-bottom: 40px;
        padding-bottom: 1px;
    }
    .payment a{
        background: tan none repeat scroll 0 0;
     border-radius: 10px;
     color: white;
     font-size: 20px;

    }
    .back{
        width: 150px;margin: 5px auto; color: white; padding-bottom: 4px;text-align: center;display: block;border: 1px dotted #333; border-radius: 10px;color: #fff;
    }
 </style>
 <div class="main">
    <div class="content">
       <div class="section group">
       <div class="payment">
       <h2>Choose payment option</h2>
           <a href="paymentOffline.php">Offline payment</a>
           <a href="paymentOnline.php">Online payment</a>
       </div>
       <div class="back">
           <a href="cart.php">Previous</a>
       </div>

        
          </div>
   
 		
 	</div>
	</div>
   <?php include("inc/footer.php"); ?>
 <?php ob_end_flush(); ?>