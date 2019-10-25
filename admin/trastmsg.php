<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 $db=new Database();
 $fm=new Format();
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
 <style>
    .actiondel{margin-left: 80px;cursor: pointer;}
    .actiondel a,.in{border:1px solid #ddd;color: #444;font-size: 20px;padding: 2px 10px;font-weight: normal;background: #f0f0f0;}
</style>

        <div class="grid_10">
           
            <div class="box round first grid">
                <h2>Seen Message</h2>
                <?php 
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from contact where contactid='$delid'";
                	$deldmsg=$db->delete($delquery);
                	if ($deldmsg) {
                       echo("<span class='success'> message deleted successfully!</span>"); 
                    }else{
                       echo("<span class='success'> message not deleted !</span>"); 
                    }
                }
                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query="select * from contact where status='1' order by contactid desc";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
						<tr class="odd gradeX">
							<td><?php echo($i) ;?></td>
							<td><?php echo($result['name']) ;?></td>
							<td><?php echo($result['email']); ?></td>
							<td><?php echo($fm->textShorten($result['body'],30)); ?></td>
							<td><?php echo($fm->formatDate($result['date'])); ?></td>
							<td>
							<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="viewmsg.php?vmsgid=<?php echo($result['contactid']); ?>">View</a></li>
								     <li> 
									 <a onclick=" return confirm('Are you sue to delete msg from the seened box!');" href="?delid=<?php echo($result['contactid']); ?>">Delete</a> 
								     </li>
								    
								  </ul>
								</div> 
						
							</td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
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