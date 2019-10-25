<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
  <?php
 if (isset($_GET['conId'])) {
    $id=$_GET['conId'];
    $time=$_GET['time'];
    $price=$_GET['price'];
    $confirm=$ct->productShiftConfirm($id,$time,$price);
  }  
  ?>
 <style>
     .tblone{text-align: justify;}
 </style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="Order">
    			<h2> your Order details</h2>

                        <table class="tblone">
                            <tr>
                                <th >No</th>
                                <th >Product Name</th>
                                <th >Image</th>
                                <th >Quantity</th>
                                <th >Total Price</th>
                                <th >Date</th>
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                            <?php 
                            $uid= Session::get("userId");
                            echo($uid);
                             $getOrdet=$ct->getOrderProduct($uid);
                             if ($getOrdet) {
                                $i=0;
                                while ($result=$getOrdet->fetch_assoc()) {
                                    $i++;
                             
                             ?>
                            <tr>
                                <td><?php echo($i) ;?></td>
                                <td><?php echo($result['productName']) ;?></td>
                                <td><img src="admin/<?php echo($result['image']); ?>" alt=""/></td>
                                <td>Tk. <?php echo($result['quantity']); ?></td>
                                
                                <td>Tk. <?php 
                                // $total=$result['price']*$result['quantity'];
                                echo($result['price']); 
                                ?></td>
                                <td><?php echo($fm->formatDate($result['date'])) ;?></td>
                                <td>
                                <?php 
                                if ($result['status']=='0') {
                                    echo("pending");
                                }elseif ($result['status']=='1') {
                                    echo("Shifted");
                                }else{
                                    echo("ok");
                                }
                                ?>
                                    
                                </td>
                                
                                <?php 
                                if ($result['status']=='1') {?>
                                    <td><a href="?conId=<?php echo($uid) ; ?>&price=<?php echo($result['price']) ; ?>&time=<?php echo($result['date']) ; ?>">Confirm</a>
                                </td>
                               <?php }elseif ($result['status']=='2') {?>
                                
                                <td>Ok</td>
                                <?php }elseif ($result['status']=='0') {?>
                                <td>N/A</td>
                                <?php } ?>
                            </tr>
                            
                            <?php }} ?>
                            </table>
    		</div>
    	</div>			
    	</div>  	
       <div class="clear"></div>
    </div>

<?php include("inc/footer.php"); ?>