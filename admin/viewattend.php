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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function() {
      $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", new Date());
   });
  </script>
  <script type="text/javascript">
	$(document).ready(function(){
    $("form").submit(function(){
    var roll=true;
    $(':radio').each(function(){
      name=$(this).attr('name');
      if (roll&&!$(':radio[name="'+name+'"]:checked').length) {
          // alert(name+"  Roll Missing !");
          $('.alert').show();
          roll=false;
      } else {}
    });
    return roll;
    });
	});
</script>
        <div class="grid_10">
            <div class="box round first grid">
             <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
                	$attend=$_POST['attend'];
				    $attendance=$em->attendanceInsert($_POST,$attend);
				}

               ?>
                <h2>Employee Attendance</h2><br/>
                <div class="panel panel-default">
                <div class="panel-heading">
			
					<a class="btn btn-success" href="add.php">add student</a>
					
					<a  class="btn btn-info pull-right" href="attendance.php">Take Attend</a>
				
			
		         </div>
                </div>
                <?php 
                if (isset($_POST['submit'])) {
                	echo($_POST['txtDate']);
                }
                 if (isset($attendance)) {
                	echo($attendance);
                }
                 ?>
               
                  
            <div class="block">
                <form action="" method="post">
                
                <div class="col-xs-2">
             
				 <label for="email">Date:</label>
				 <input class="form-control" type="text" name="txtDate" id="datepicker">
				
				</div>
               <div class='alert alert-danger' style="display: none;"><strong>Error!</strong>Student Roll Missing! </div>;

                 <table class="table table-striped">

		   	 <tr>
		   	 
		   	 	<th width="25%">serial </th>
		   	 	
		   	 	<th width="25%">Attendance Date </th>
		   	 	<th width="25%">Action</th>
		   	 	
		   	 </tr>
		   	 <?php
				 $getdate=$em->getDate();
		   	 if ($getdate) {
		   	 	$i=0;
		   	 	while ($result=$getdate->fetch_assoc()) {
		   	 		$i++;
		   	 	
		   	  ?>	
					
		   	 <tr>
		   	 	
		   	 	<td><?php echo($i) ;?></td>
		   	 	
		   	 	<td><?php echo($result['att_date']); ?></td>

		   	<td>
		   	 	<a class="btn btn-primary" href="update_attend.php?dt=<?php echo($result['att_date']); ?>" >View</a>

		   	 	</td>
		   	 		<?php }}else{echo("category not found");} ?>
	
		   	 </tr>
		   	 
		   	 </table>  
           </form>

                    <!-- <table class="data display datatable" id="example">

					<thead>
						<tr>
							<th>Serial No.</th>
							<th> Name</th>
							<th>EmployeeId</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					    
                        $allusers=$em->employeeList();
					if ($allusers) {
						$i=0;
						while ($result=$allusers->fetch_assoc()) {
							$i++;
						
					 ?>
						<tr class="odd gradeX">
							<td><?php echo($i) ;?></td>
							<td><?php echo($result['name']) ;?></td>
							<td> <?php echo($result['typeofuser']) ;?></td>
							
							
							
						</tr>
						<?php }}else{echo("category not found");} ?>

					</tbody>

				</table>
			<input type="submit" name="submit"> -->
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
