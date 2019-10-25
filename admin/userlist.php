<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/Employee.php'; 
$em=new Employee(); 
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
            
                <h2>User List</h2>
                <?php 
                // if (isset($delemp)) {
                // 	echo($delemp);
                // }
                 ?>
               
                  
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th> Name</th>
							<th>City</th>
							<th>Zip-Code</th>
							<th>Country</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Emai</th>
							<th>Role</th>
				             <th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					    
                        $allusers=$em->UserList();
					if ($allusers) {
						$i=0;
						while ($result=$allusers->fetch_assoc()) {
							$i++;
						
					 ?>
						<tr class="odd gradeX">
							<td><?php echo($i) ;?></td>
							<td><?php echo($result['name']) ;?></td>
							<td> <?php echo($result['city']) ;?></td>
							<td> <?php echo($result['zip']) ;?></td>
							<td> <?php echo($result['country']) ;?></td>
							<td> <?php echo($result['phone']) ;?></td>
							<td><?php echo($result['email']) ;?></td>
							<td><?php echo($result['address']) ;?></td>
							<td>
							<?php 
								if ($result['role']=='0') {
									echo("General");
								}
							?>
								
							</td>
							<td>
							<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="viewuser.php?vuserid=<?php echo($result['userId']) ;?>">View</a></li>
								     <li>
								     <?php 
				                    if (Session::get("adminRole")=='0') {
				                     ?>
									  <a onclick="return confirm('Are you sure to delete data!')" href="?deluid=<?php echo($result['userId']) ;?>">Delete</a>
									 <?php } ?>
								     </li>
								    
								  </ul>
								</div> 
							
							 </td>
                              
						</tr>
						<?php }}else{echo("category not found");} ?>
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
