<?php include("inc/header.php"); ?>
<?php 
	if (!isset($_GET['pagesid'])||$_GET['pagesid']==NULL) {
	    header("Location: 404.php");
	}else{
	    $pagesid=$_GET['pagesid'];
	    
	}
 ?>
 <div class="main">
    <div class="content">
    	<div class="support">
   <?php 
     $query="select * from page where pid='$pagesid'";
     $pages=$db->select($query);
     if ($pages) {
         while ($result=$pages->fetch_assoc()) {
            
 ?> 
  			<div class="support_desc">
  				
  				<h2><?php echo($result['name']); ?></h2>
	
				<p><?php echo($result['body']); ?></p>
				
  			</div>
  			<?php }}else{header("Location: 404.php");} ?>	
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include("inc/footer.php"); ?>