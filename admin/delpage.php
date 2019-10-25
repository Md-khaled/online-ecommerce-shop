<?php 
include '../lib/Session.php';
Session::checkSession();
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
//  echo "inserted";
// }else{
//  echo("not");
// }
}
 ?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php 
$db=new Database();
 ?>

 <?php 
if (!isset($_GET['delpageid'])||$_GET['delpageid']==NULL) {
    header("Location: dashbord.php");
}else{
    $delpageid=$_GET['delpageid'];
    
    
    $delquery="delete from page where pid='$delpageid'";
    $delData=$db->delete($delquery);
    if ($delData) {
    	echo("<script>alert('page deleted successfull');</script>");
    	echo("<script>window.location='dashbord.php';</script>");
    }else{
    	echo("<script>alert('page not deleted ');</script>");
    	echo("<script>window.location='dashbord.php';</script>");
    }
}
 ?>