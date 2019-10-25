<?php ob_start(); ?>
<?php include("inc/header.php"); ?>

<!-- <?php 
$filepath=realpath(dirname(__FILE__));
echo($filepath);
echo(session_id());
 ?>
	 -->
<?php 
	if (!isset($_POST['search'])||$_POST['search']==NULL) {
		header("Location: 404.php");
	}else{
		$searchid=$_POST['search'];
		
	}
 ?>
	 
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Search Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php 
	      // $query="(SELECT productId,productName,body,price,image AS type FROM product WHERE productName LIKE'%$searchid%') UNION (SELECT productId,catName,body,price,image AS type FROM category AS c,product AS p WHERE p.catId=c.catId AND catName LIKE'%$searchid%' ) UNION (SELECT productId,brandName,body,price,image AS type FROM brand AS b,product AS p WHERE p.brandId =b.brandId AND brandName LIKE'%$searchid%' )";
       //        $getFpd=$db->select($query);
	      $getFpd=$pd-> searchProduct($searchid);

	      if ($getFpd) {
	      	while ($result=$getFpd->fetch_assoc()) {
	      	
	      
	       ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pdId=<?php echo($result['productId']); ?>"><img src="admin/<?php echo($result['type']); ?>" alt="" /></a>
					 <h2><?php echo($result['productName']); ?> </h2>
					 <p><?php echo($fm->textShorten($result['body'],10)); ?></p>
					 <p><span class="price">$<?php echo($result['price']); ?></span></p>
				     <div class="button"><span><a href="details.php?pdId=<?php echo($result['productId']); ?>" class="details">Details</a></span></div>
				</div>
				<?php }}else{ ?>
				  <p>Your search query not found</p>
				  <?php } ?>
			
				</div>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
	      $getNpd=$pd->getNewProduct();
	      if ($getNpd) {
	      	while ($result=$getNpd->fetch_assoc()) {
	       ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pdId=<?php echo($result['productId']); ?>"><img src="admin/<?php echo($result['image']); ?>" alt="" /></a>
					  <h2><?php echo($result['productName']); ?> </h2>
					 <p><span class="price">$<?php echo($result['price']); ?></span></p>
				     <div class="button"><span><a href="details.php?pdId=<?php echo($result['productId']); ?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
			</div>
    </div>
 </div>

<?php include("inc/footer.php"); ?>
<?php ob_end_flush(); ?>