<?php 
<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	   <?php 
         $query="select * from page";
         $pages=$db->select($query);
         if ($pages) {
             while ($result=$pages->fetch_assoc()) {
                
    ?>
    <li><a 
      <?php 
		if (isset($_GET['pagesid'])&& $_GET['pagesid']==$result['pid'] ) {
			echo("id='active'");
		}
	 ?>
    href="page.php?pagesid=<?php echo($result['pid']); ?>"><?php echo($result['name']); ?></a></li> 
    <?php }} ?>	
	  <?php 
	  $ckCart=$ct->checkCartTable();
	  if ($ckCart) {?>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="payment.php">Payment</a></li>
	  <?php } ?>
	  <?php 
	  $uid= Session::get("userId");
	  $ckOrder=$ct->checkOrder($uid);
	  if ($ckOrder) {?>
	  <li><a href="orderdetails.php">order details</a></li>
	  <?php } ?>
	  <?php
	    $login= Session::get("userlogin");
	    if ($login==true) {?>
	  <li><a href="profile.php">User profile</a> </li>
	  
	  <?php } ?>

	  <?php 
	  $uid= Session::get("userId");
		$getCom=$pd->getComparedData($uid);
		if ($getCom) {
	   ?>
	   <li><a href="compare.php">Compare</a> </li>
	   <?php } ?>

	    <?php 
		$checkwlist=$pd->getkWlistData($uid);
		if ($checkwlist) {
	   ?>
	   <li><a href="wishlist.php">WishList</a> </li>
	   <?php } ?>

	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
 ?>