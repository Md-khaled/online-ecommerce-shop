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
      $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", new Date());
   });
  </script>
 <div class="grid_10">
<div class="box round first grid">
<h2>Employee Attendance</h2><br/>
<?php
 $date="";
 $eid="" ;
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['See_Attend'])) {
	 $dd=$_POST['date'];
	echo  $date= date("m",strtotime($dd));
	$eid=$_POST['eid'];
    $getattend=$em->getAttendById($date,$eid);
  }

 ?>
 <div class="block">
 <form class="form-inline" method="post">
  <div class="form-group">
    <label for="email">Date:</label>
    <input type="text" class="form-control" id="datepicker" name="date">
  </div>
  <div class="form-group">
    <label for="pwd">EmployeeID:</label>
    <input type="text" class="form-control" id="pwd" name="eid">
  </div>
  <button type="submit" name="See_Attend" class="btn btn-default">See</button>
  
  <!--  <a class="btn btn-success" name="print" id="print" href="printattendance.php?printdate=<?php echo($date); ?>&empid=<?php echo($eid); ?>"></a> -->
   <script>
       function printIframe(objFrame) {
           objFrame.focus();
           objFrame.print();
           bjFrame.save();
       }
   </script>
  <!-- <a href="printattendance.php?printdate=<?php echo($date); ?>&empid=<?php echo($eid); ?>" onClick="printattendance.php?printdate=<?php echo($date); ?>&empid=<?php echo($eid); ?>:window.print();return false">print</a> -->
  <!-- <a class="btn btn-success" href="printattendance.php?printdate=<?php echo($date); ?>&empid=<?php echo($eid); ?>" onclick="javascript:window.print()" style="cursor:pointer; float:left;"Print </a> -->
  <?php if (isset( $getattend)) { ?>
  <a class="btn btn-success" href="printattendance.php?printdate=<?php echo($date); ?>&empid=<?php echo($eid); ?>">Print</a>
  <?php } ?>
</form>
<?php  
$table='
<table class="table table-bordered"style=" border: 1px solid black; ">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Roll</th>
        <th>Attendance</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>';
    if (isset($getattend)) {
    	if ($getattend==true) {
    		
    	
    	$x = 0;
    	$re=$getattend->fetch_assoc();
    	$row=mysqli_num_rows($getattend);
    	$count=$row-1;
    	$name=$re['name'];
    	$roll=$re['roll'];
    	$table.=' <tr>
    	 <td rowspan='.$count.'>'.$name.'</td>
        <td  rowspan='.$count.'>'.$roll.'</td>
    	';
    	while ($result=$getattend->fetch_assoc()) {
    		$x++;
    	// $name=$result['name'];
         $table.=' 
                 
        <td>'.$result['attend'].'</td>
        <td>'.$result['att_date'].'</td>
      </tr>';
      }
    }
    $table.='<tr>
    <td  ></td>
    <td  ></td>
    <td  >Total Present:&nbspTotal Absent:</td>
    <td  >aaaa</td>
    </tr >
    ';
   $table.=' </tbody>
  </table>';
  echo($table);
}
  ?>
 </div>
 </div>
</div>
<?php include 'inc/footer.php';?> 
<table>
	<tr colla>
		<td>
			
		</td>
	</tr>
</table>