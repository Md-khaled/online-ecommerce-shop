<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$role=Session::get("adminRole");
if ($role!='0') {
  
$id=Session::get("adminId");
$name=Session::get("adminName");
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
$query="INSERT INTO track_visitor (userId,user_name,page) VALUES ('$id','$name',  '$page')";
$insertdata=$db->insert($query);
// if ($insertdata) {
//  echo "inserted";
// }else{
//  echo("not");
// }
}
 ?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


     <script>
$(function() {
$( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    // Change this line
});
</script>  
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Cart.php');
 $ct=new Cart();
 $fm=new Format();
 ?>
 <?php
if (!isset($_GET['cusId'])||$_GET['cusId']==NULL ||$_GET['cusId']!=$_GET['cusId']) {
    echo "<script>window.location = 'inbox.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['cusId']);
   $time= $_GET['time'];
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $orderId=$_POST['orderId'];
  	$productName=$_POST['productName'];
  	$quantity=$_POST['quantity'];
  	$price=$_POST['price'];
  	
  	$serviceman=$_POST['serviceman'];
  	$delivery=$_POST['delivery'];
  	echo($delivery);
  	$service=$ct->insertService($orderId,$productName,$quantity,$price,$serviceman,$delivery);
}
 ?>
 
        <div class="grid_10">

            <div class="box round first grid">
               
                <?php 
                if (isset($service)) {
                	echo($service);
                }
                
                 ?>
                <div class="block">
                <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>Product Assign to Service Man
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data" id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">product</label>
                    <div class="col-sm-5">
                    <?php 
				   $getorder=$ct->getSpecificProduct($id,$time);
					if ($getorder) {
						$i=0;
						while ($result=$getorder->fetch_assoc()) {?>		
					 <input type="hidden" name="orderId" value="<?php echo($result['orderId']) ;?>">	
                      <input type="text" readonly="readonly"  value="<?php echo($result['productName']) ;?>"  name="productName"  class="form-control" id="startDate" />
                      <?php }} ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-5">
                        <?php 
				      $getorder=$ct->getSpecificProduct($id,$time);
					 if ($getorder) {
					
						while ($result=$getorder->fetch_assoc()) {?>
						<input type="text" readonly="readonly"  value="<?php echo($result['quantity']) ;?>"  name="quantity"  class="form-control" id="startDate" />
                      <?php }} ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-5">
                      <?php 
				      $getorder=$ct->getSpecificProduct($id,$time);
					 if ($getorder) {
					
						while ($result=$getorder->fetch_assoc()) {?>
						<input type="text" readonly="readonly" value="<?php echo($result['price']) ;?>"  name="price"  class="form-control" id="startDate" />
                      <?php }} ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Order Date</label>
                    <div class="col-sm-5">
                      <?php 
				      $getorder=$ct->getSpecificProduct($id,$time);
					 if ($getorder) {
					
						while ($result=$getorder->fetch_assoc()) {?>
						<input type="text" readonly="readonly" value="<?php echo($fm->formatDate($result['date'])) ;?>"  name="date"  class="form-control" id="startDate" />
                      <?php }} ?>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Assign Service</label>
                    <div class="col-sm-5">
                       <select class="form-control" id="sel1" name="serviceman">
								    <option>Select Service Person</option>
								    <?php 
		                             $getsevice=$em->getServiceMan();
		                            if ($getsevice) {
		                                while ($result=$getsevice->fetch_assoc()) {  
		                             ?>
								    <option value="<?php echo($result['name']); ?>"><?php echo($result['name']); ?></option>
								    <?php }} ?>
								  </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Delivery Date</label>
                    <div class="col-sm-5">
                      <input type="date"   name="delivery"  class="form-control" id="datepicker"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-5">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Add</button>
                    </div>
                  </div>
                </form>

            </div>
            <!-- /panel-body -->
        </div>
    </div>
    <!-- /col-dm-12 -->
</div>
         </div>

            </div>
        </div>

<?php include 'inc/footer.php';?>