<?php include("inc/header.php"); ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		
    		<h3>All Brand</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php 

    		$brand=$pd->getAllBrand();
    		if ($brand) {
    			while ($result=$brand->fetch_assoc()) {?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="admin/<?php echo($result['image']); ?>" alt="" /></a>
					 <h2>Brand:  <?php echo($result['brandName']); ?></h2>
					 <p><?php echo($fm->textShorten($result['body'],10)); ?></p>
					 <p><span class="price">TK <?php echo($result['price']); ?></span></p>
				    <div class="button"><span><a href="details.php?pdId=<?php echo($result['productId']); ?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
			</div>
			
			
			
    </div>
 </div>
<?php include("inc/footer.php"); ?>