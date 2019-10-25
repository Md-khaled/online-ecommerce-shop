<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
 <?php 
 if (isset($_GET['orderid'])&&$_GET['orderid']=='order') {
  
   $uid= Session::get("userId");
 
   $insertOrder=$ct->orderProduct($uid);
   
  
   // $deldata=$ct->delUserCart();
   // header("Location: success.php");
 }
 
  ?>
 <style>
 .tblone{width: 500px;margin: 0 auto;border: 2px solid #ddd;}
  .tblone tr td{text-align: justify;}
  .division{width: 50%;float: left;}
  .tbltwo{
    float:right;text-align:left; width=50%;border: 2px solid #ddd;margin-right: 14px;margin-top: 12px;
  }
   .tbltwo tr td{text-align: justify;padding:5px 10px;  }
   .order{
    width: 200px;margin: 20px auto 0;text-align: center;padding: 5px;font-size: 20px;display: block;color: #fff; 
   }
 </style>
 <div class="main">
    <div class="content">
       <div class="section group">
       <div class="division">
       <!-- <?php echo($uid); ?> -->
       <?php 
       if (isset($insertOrder)) {
    echo($insertOrder);
   }
        ?>
         <table class="tblone">
              <tr>
                <th >No</th>
                <th ">Product Name</th>
                <th >Price</th>
                <th >Quantity</th>
                <th >Total Price</th>
              </tr>
              <?php 
               $sum=0;
                $qty=0;
               $getPd=$ct->getCartProduct();
               if ($getPd) {
                $i=0;
               
                while ($result=$getPd->fetch_assoc()) {
                  $i++;
               
               ?>
              <tr>
                <td><?php echo($i) ;?></td>
                <td><?php echo($result['productName']) ;?></td>
                <td>Tk. <?php echo($result['price']); ?></td>
                <td><?php echo($result['quantity']) ;?></td>
                
                <td>Tk. <?php 
                $total=$result['price']*$result['quantity'];
                echo($total); 
                ?></td>
              </tr>
              <?php 
              $qty=$qty+$result['quantity'];
              $sum=$sum+$total;
             
               ?>
              
              <?php }} ?>
              
            </table>
      
            <table class="tbltwo">
              <tr>
                <td>Sub Total  </td>
                <td>:</td>
                <td>Tk.<?php echo($sum) ;?></td>
              </tr>
              <tr>
                <td>VAT  </td>
                <td>:</td>
                <td>10%(<?php echo($vat    =$sum * .1); ?>)</td>
              </tr>
              <tr>
                <td>Grand Total </td>
                <td>:</td>
                <td>Tk.<?php 
                $vat    =$sum * .1;
                $gtotal =$sum + $vat;
                echo($gtotal);
                 ?> </td>
              </tr>
               <tr>
                <td>Quantity  </td>
                <td>:</td>
                <td><?php echo($qty); ?></td>
              </tr>
             </table>
       </div>



       <div class="division">
         <?php 
      $id=Session::get("userId");
      $getUdata=$ur->getUserData($id);
      if ($getUdata) {
        while ($result=$getUdata->fetch_assoc()) {
        
     ?>
    <table class="tblone">
    <tr>
      
        <td colspan="3">Your profile details</td>
      </tr
      <tr>
        <td width="20%">Name</td>
        <td width="5%">:</td>
        <td><?php echo($result['name']); ?></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>:</td>
        <td><?php echo($result['phone']); ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><?php echo($result['email']); ?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td>:</td>
        <td><?php echo($result['address']); ?></td>
      </tr>
      <tr>
        <td>City</td>
        <td>:</td>
        <td><?php echo($result['city']); ?></td>
      </tr>
      <tr>
        <td>Zip code</td>
        <td>:</td>
        <td><?php echo($result['zip']); ?></td>
      </tr>
      <tr>
        <td>country</td>
        <td>:</td>
        <td><?php echo($result['country']); ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><a href="editprofile.php">Update profile</a></td>
      </tr>
    </table>  
    <?php }} ?>
       </div>
          </div>
   
 		
 	</div>
  <div class="order"><a href="?orderid=order">Order now</a></div>
	</div>
   <?php include("inc/footer.php"); ?>
