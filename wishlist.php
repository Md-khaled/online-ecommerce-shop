<?php include("inc/header.php"); ?>
<?php 
if (isset($_GET['delwlistid'])) {
 	$productId=$_GET['delwlistid'];
 	echo($productId);
 	$delwlist=$pd->delwlistData($uid,$productId);
 } ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Wish List</h2>
			    	
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Action</th>

							</tr>
							<?php 
							// $uid= Session::get("userId");
							 $getCom=$pd->getkWlistData($uid);
							 if ($getCom) {
							 	$i=0;
							 	while ($result=$getCom->fetch_assoc()) {
							 		$i++;
							 
							 ?>
							<tr>
								<td><?php echo($i) ;?></td>
								<td><?php echo($result['productName']) ;?></td>
								<td><img src="admin/<?php echo($result['image']); ?>" alt=""/></td>
								<td>Tk. <?php echo($result['price']); ?></td>
								<td><a href="details.php?pdId=<?php echo($result['productId']); ?>">Buy Now</a>||
								<a href="?delwlistid=<?php echo($result['productId']); ?>">Remove</a>

								</td>
							</tr>
							<!-- <?php 
							$qty=$qty+$result['quantity'];
							$sum=$sum+$total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
							 ?>
							 -->
							<?php }} ?>
							
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<!-- <div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div> -->
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>

<?php include("inc/footer.php"); ?>