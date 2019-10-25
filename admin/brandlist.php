<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; ?>
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
$brand=new Brand(); 
if (isset($_GET['delbrand'])) {
	// $id=$_GET['delete'];
	$id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
	$delBrand=$brand->delBrandById($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block"> 
                <?php 
                if (isset($delBrand)) {
                	 echo($delBrand);
                }
                 ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$getBrand=$brand->getAllBrand();
						if ($getBrand) {
							$i=0;
							while ($re=$getBrand->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo($i); ?></td>
							<td><?php echo($re['brandName']) ;?></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="brandedit.php?brandid=<?php echo($re['brandId']) ;?>">Edit</a></li>
								     <li>
								     <?php 
				                    if (Session::get("adminRole")=='0') {
				                     ?>
									  <a onclick="return confirm('are you sure delect category!')" href="?delbrand=<?php echo($re['brandId']) ;?>">Delete</a>
									 <?php } ?>
								     </li>
								    
								  </ul>
								</div> 

							 </td>
						</tr>
						<?php }}else{echo("Brand not found");} ?>
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

