<?php 
include_once '../lib/Session.php'; 
Session::checkSession();
 ?>
 <link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
    <script type="text/javascript" src="inc/jquery.min.js"></script>
    <script type="text/javascript" src="inc/bootstrap.min.js"></script>
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
<?php 
include_once'../classes/Employee.php'; 
$em=new Employee(); 
 ?>
<?php 
if (!isset($_GET['printdate'])||$_GET['printdate']==NULL ||$_GET['printdate']!=$_GET['printdate']) {
    echo "<script>window.location = 'dashboard.php';</script>";
}else{
    // $id=$_GET['catid'];
    $date=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['printdate']);
    $eid=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['empid']);
    $getattend=$em->getAttendById($date,$eid);
}
 ?>

 <div class="grid_10">
<div class="box round first grid">
<h2 style="text-align: center;">Employee Attendance</h2><br/>

<?php  
$table='
<table class="table table-bordered"style=" border: 1px solid black; " style="display: center;" width="10%;">
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
  <br/>
   <input name="" type="button" value="Print" onclick="javascript:window.print()" style="cursor:pointer; float:left;" />
  <script>
       function printIframe(objFrame) {
           objFrame.focus();
           objFrame.print();
           bjFrame.save();
       }
   </script>
 </div>
 </div>
</div>
