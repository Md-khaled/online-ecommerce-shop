<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>
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
$cat=new Catagory(); 
if (isset($_GET['delete'])) {
	// $id=$_GET['delete'];
	$id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delete']);
	$delCate=$cat->delCatById($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
                <?php 
                if (isset($delCate)) {
                	echo($delCate);
                }
                 ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$getCat=$cat->getAllCat();
						if ($getCat) {
							$i=0;
							while ($re=$getCat->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo($i); ?></td>
							<td><?php echo($re['catName']) ;?></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="catedit.php?catid=<?php echo($re['catId']) ;?>">Edit</a></li>
								     <li>
								     <?php 
				                    if (Session::get("adminRole")=='0') {
				                     ?>
									  <a onclick="return confirm('are you sure delect category!')" href="?delete=<?php echo($re['catId']) ;?>">Delete</a>
									 <?php } ?>
								     </li>
								    
								  </ul>
								</div> 

							</td>
						</tr>
						<?php }}else{echo("catagory not found");} ?>
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

