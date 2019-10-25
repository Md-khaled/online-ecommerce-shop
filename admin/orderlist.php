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
// 	echo "inserted";
// }else{
// 	echo("not");
// }
}
 ?>
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Cart.php');
 $ct=new Cart();
 $fm=new Format();
 ?>
 <?php
 if (isset($_GET['shifted'])) {
  	$id=$_GET['shifted'];
  	$time=$_GET['time'];
  	$price=$_GET['price'];
  	$shift=$ct->productShift($id,$time,$price);
  } 

  if (isset($_GET['delProid'])) {
  	$id=$_GET['delProid'];
  	$time=$_GET['time'];
  	$price=$_GET['price'];
  	$delOrder=$ct->delShiftedOrder($id,$time,$price);
  } 
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order List</h2>
                <?php 
                if (isset($shift)) {
                	echo($shift);
                }
                if (isset($delOrder)) {
                	echo($delOrder);
                }
                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						     <th>Order ID</th>
							<th>CId</th>
							<th>product</th>
							<th>quantity</th>
							<th>price</th>
							<th>Date</th>
							
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
							<th>Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php 
					
					$getorder=$ct->getAllProduct();
					
					if ($getorder) {
						while ($result=$getorder->fetch_assoc()) {
					 ?>
						<tr class="odd gradeX">
						 <td><?php echo($result['orderId']) ; ?></td>
							<td><?php echo($result['userId']) ; ?></td>
							<td><?php echo($result['productName']) ;?></td>
							<td><?php echo($result['quantity']) ;?></td>
							<td>$<?php echo($result['price']) ;?></td>
							<td><?php echo($fm->formatDate($result['date'])) ;?></td>
							
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
							<td>
							<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="printorder.php?cusId=<?php echo($result['userId']) ;?>&time=<?php echo($result['date']) ; ?>">Print</a></li>
								     <li><a href="assignservice.php?cusId=<?php echo($result['userId']) ;?>&time=<?php echo($result['date']) ; ?>">Delivery Service</a></li>
								    <li><a href="customer.php?cusId=<?php echo($result['userId']) ;?>">view details</a></li>
								    <?php 
									if ($result['status']=='0') {?>
										<li><a href="?shifted=<?php echo($result['userId']) ; ?>&price=<?php echo($result['price']) ; ?>&time=<?php echo($result['date']) ; ?>">Shifted</a> </li>
									<?php }elseif($result['status']=='1'){ ?>
								    <li>Pending</li>
								    <?php }else{ ?>
							     <li><a onclick="return confirm('are you sure delect category!')" href="?delProid=<?php echo($result['userId']) ; ?>&price=<?php echo($result['price']) ; ?>&time=<?php echo($result['date']) ; ?>">Remove</a></li>
								  </ul>
								</div> 
							</td>
							<?php } ?>

							<?php } ?>
						</tr>
						<?php }} ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
