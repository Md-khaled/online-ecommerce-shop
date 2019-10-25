<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

$sql = "SELECT * FROM product";
$query = $db->select($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM cus_order";
$orderQuery = $db->select($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['price'];
}
$lowStockSql = "SELECT * FROM product WHERE quantity > 4";
$lowStockQuery = $db->select($lowStockSql);
$re = $lowStockQuery->num_rows;
if ($re<=4) {

$lowStockSql = "SELECT * FROM product WHERE quantity <= 4";
$lowStockQuery = $db->select($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;
}
// $connect->close();

?>
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

        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel   
                  <?php 
                  $lowStockSql = "SELECT * FROM product WHERE quantity > 4";
					$lowStockQuery = $db->select($lowStockSql);
					$re = $lowStockQuery->num_rows;
					if ($re<=4) {

					$lowStockSql = "SELECT * FROM product WHERE quantity <= 4";
					$lowStockQuery = $db->select($lowStockSql);
					$countLowStock = $lowStockQuery->num_rows;
					
                  if ( $countLowStock<= 4) {
                  	
                   echo "<script>var confirm = confirm(\"Warning:Low Stock!! Please Update Stock?\");
                   
		          if(confirm){ 
		             window.location='lowproductlist.php';
		           }
		          </script>";
                  echo "<a href='userlist.php' OnClick='return confirm('blah blah');'> Click here </a>";
                   echo('<a href="javascript:confirmDelete(\'userlist.php\')">Delete</a>');
               }
           }
                   ?>     
                </div>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}

</style>


<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="productlist.php" style="text-decoration:none;color:black;">
					Total Product
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="orderlist.php?o=manord" style="text-decoration:none;color:black;">
					Total Orders
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="lowproductlist.php" style="text-decoration:none;color:black;">
				     <?php
					      $lowStockSql = "SELECT * FROM product WHERE quantity >4";
							$lowStockQuery = $db->select($lowStockSql);
							$re = $lowStockQuery->num_rows;
							
							if ($re<=4) {
								echo("Low Stock");
							}else{
								echo("Available Stock");
							}
					 
					  ?>
					
					<span class="badge pull pull-right"><?php
					      $lowStockSql = "SELECT * FROM product WHERE quantity >4";
							$lowStockQuery = $db->select($lowStockSql);
							$re = $lowStockQuery->num_rows;
							
							if ($re<=4) {

							$lowStockSql = "SELECT * FROM product WHERE quantity <= 4";
							$lowStockQuery = $db->select($lowStockSql);
							$countLowStock = $lowStockQuery->num_rows;
							echo $countLowStock;
							}
					 
					  ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
<?php } ?>
	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d'); ?></h1>
		    
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		    
		  </div>
		</div> 
		<br/>
<?php if (Session::get("adminRole")=='0') { ?>
		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <h1><?php if($totalRevenue) {
		    	echo $totalRevenue;
		    	} else {
		    		echo '0';
		    		} ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p> <i class="glyphicon glyphicon-usd"></i> Total Revenue</p>
		  </div>
		</div> 
<?php } ?>
	</div>

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendar</div>
			<div class="panel-body">
				<div id="calendar"></div>
			</div>	
		</div>
		
	</div>

	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

            </div>
        </div>
<?php include 'inc/footer.php';?>