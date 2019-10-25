<?php ob_start(); ?>
<?php 
include 'lib/Session.php'; 
Session::init();
include_once 'lib/Database.php';
include_once 'helpers/Format.php'; 

spl_autoload_register(function($class){
include_once"classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$pd=new Product();
$cat=new Catagory();
$ct=new Cart();	
$ur=new User();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<?php include_once 'scripts/meta.php'; ?>
<link rel="icon" type="image/png" href="/images/bm.png" sizes="16x16">
<link rel="icon" type="image/png" href="/images/bm.png" sizes="32x32">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include_once 'scripts/css.php'; ?>
<?php include_once 'scripts/js.php'; ?>
<script>
//   $(function () {
//     $("ul").find("li").children("a").each(function () {
//         if ($(this).attr("href") === window.location.pathname) {
//             $(this).parent().addClass("active");
//         } else {
//             $(".active").parent().removeClass("active");
//         }
//     });
// });
//    $(document).ready(function(){
//     $('.nav li').click(function(event){
//         //remove all pre-existing active classes
//         $('.active').removeClass('active');

//         //add the active class to the link we clicked
//         $(this).addClass('active');

//         //Load the content
//         //e.g.
//         //load the page that the link was pointing to
//         //$('#content').load($(this).find(a).attr('href'));      

//         event.preventDefault();
//     });
// });
 $('ul.nav > li').click(function (e) {
        e.preventDefault();
</script>

</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
			  <?php 
                $query="select * from slogan where sId='1'";
                $blog_title=$db->select($query);
                if ($blog_title) {
                    while ($result=$blog_title->fetch_assoc()) {
                       
                 ?> 
				<a href="index.php"><img src="admin/<?php echo($result['logo']); ?>" alt="Logo"/></a>
				<h2><?php echo($result['sTitle']); ?></h2>
				<p><?php echo($result['slogan']); ?></p>
			<?php }} ?>
				
			</div>
			  <div class="header_top_right">
			  <!-- <form action="search.php" class="navbar-form navbar-right">
				   <div class="input-group">
				       <input type="Search" placeholder="Search..." class="form-control" />
				       <div class="input-group-btn">
				       <input type="submit" class="btn btn-info" name="submit"   value="Search"/>
				           
				       </div>
				   </div -->
				<!-- //</form> -->
			    
				    <form action="search.php" method="post" class="navbar-form navbar-right">
				    <div class="input-group">
				    	<input type="text" class="form-control" name="search" placeholder="Search keyword..."/>
				    	 <div class="input-group-btn">
				    	<input type="submit" class="btn btn-info" name="submit" value="Search"/>
				    	 </div>
				    	 </div>
				    </form>
			    
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php 
								$getData=$ct->checkCartTable();
								if ($getData) {
									$sum=session::get("sum");
									$qty=session::get("qty");
								echo("Tk.".$sum."  Qty: ".$qty);
								}else{
									echo("(Empty)");
								}
								
								 ?>
								</span>
							</a>
						</div>
			      </div>

			      <?php 
			      if (isset($_GET['uid'])) {
			      	$userid= Session::get("userId");
			      	$deldata=$ct->delUserCart();
			      	$delCom=$pd->delCompareData($userid);
			      	Session::destroy();
			      }

			       ?>
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cetagory <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php 
		$getCat=$cat->getAllCat();
		if ($getCat) {
			while ($result=$getCat->fetch_assoc()) {?>
	      <li><a href="productbycat.php?catId=<?php echo($result['catId']); ?>"><?php echo($result['catName']); ?></a></li>
	      <?php }} ?>
<!--             <li><a href="pp.php">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li> -->
          </ul>
        </li>
        <li><a href="topbrands.php">Brand</a></li>
          <?php 
         $query="select * from page";
         $pages=$db->select($query);
         if ($pages) {
             while ($result=$pages->fetch_assoc()) {?>
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
      <ul class="nav navbar-nav navbar-right">
       <?php
         $login= Session::get("userlogin");
        if ($login==false) {?>
             <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
             <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php }else{?>
      <li><a href="?uid=<?php Session::get('userId') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             
       <?php } ?>
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>
  

</div>
<?php ob_end_flush(); ?>