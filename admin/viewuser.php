<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/Employee.php'; ?>
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
 $usersid=Session::get("adminId");
  $userRole=Session::get("adminRole");
 ?>
 <?php
 if (!isset($_GET['vuserid']) || $_GET['vuserid']==NULL) {
   echo("<script>window.location='employeelist.php';</script>");
   // header("Location: catlist.php");
}else{
    $vuserid=$_GET['vuserid'];
}
 ?>
    <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Employee</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                      echo("<script>window.location='employeelist.php';</script>");  
                      
                   }
                 ?>
                <div class="block">   
                <?php 
                 $em=new Employee(); 
                 $viewusers=$em->viewEmployee($vuserid);
                 if ($viewusers) {
                     while ($result=$viewusers->fetch_assoc()) {
                        
                 ?>            
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="name" value="<?php echo($result['name']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>UserName</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="userName" value="<?php echo($result['typeofuser']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="email" value="<?php echo($result['email']); ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                   <?php echo($result['address']); ?>
                                </textarea>
                            </td>
                        </tr>
                        
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>