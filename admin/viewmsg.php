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
<?php
if (!isset($_GET['vmsgid']) || $_GET['vmsgid']==NULL) {
   echo("<script>window.location='inbox.php';</script>");
   // header("Location: catlist.php");
}else{
    $vmsgid=$_GET['vmsgid'];
}
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                       echo("<script>window.location='inbox.php';</script>");
                   }
                 ?>
                <div class="block">               
                 <form action="" method="post" >
                 <?php 
                    $query="select * from contact where contactid='$vmsgid'";
                    $msg=$db->select($query);
                    if ($msg) {
                       
                        while ($result=$msg->fetch_assoc()) {
                           
                        
                     ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($result['name']) ;?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($result['email']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($fm->formatDate($result['date'])); ?>" class="medium" />
                            </td>
                        </tr>
                        
                      <tr>
                            <td >
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                   <?php echo($result['body']); ?>
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
                    <?php }} ?>
                    </form>
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