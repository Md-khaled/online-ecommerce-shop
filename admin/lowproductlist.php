<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php include '../classes/Brand.php'; ?>
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
$pd=new Product(); 
$fm=new Format(); 
 ?>
 <?php
$cat=new Catagory(); 
if (isset($_GET['delpd'])) {
	// $id=$_GET['delete'];
	$id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delpd']);
	$delPd=$pd->delPdById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block"> 
        <?php 
                if (isset($delPd)) {
                	echo($delPd);
                }
                 ?>  

            <table class="data display datatable" id="example">
			<thead>
				<tr>
				     <th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$getPd=$pd->getAllLowerProduct();
			if ($getPd) {
				$i=0;
				while ($result=$getPd->fetch_assoc()) {
					$i++;
				
			
			 ?>
				<tr class="odd gradeX">
					<td><?php echo($i); ?></td>
					<td><?php echo($result['productName']); ?></td>
					<td><?php echo($result['catName']); ?></td>
					<td><?php echo($result['brandName']); ?></td>
					<td><?php echo($fm->textShorten($result['body'],50)); ?></td>
					<td>$<?php echo($result['price']); ?></td>
					<td><img src="<?php echo($result['image']); ?>" height="40px" width="60px"/></td>
					<td>
					<?php echo($result['quantity']); ?>
						
					</td>
					<td><a href="productedit.php?pdid=<?php echo($result['productId']) ;?>">Edit</a>
						 <?php 
                    if (Session::get("adminRole")=='0') {
                     ?>
					 || <a onclick="return confirm('are you sure delect category!')" href="?delpd=<?php echo($result['productId']) ;?>">Delete</a>
					 <?php } ?>
					 </td>
				</tr>
				<?php }}else{echo("not found");} ?>
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
