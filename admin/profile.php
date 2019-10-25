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
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 $db=new Database();
 $fm=new Format();
 ?>
<?php
echo $adminid=Session::get("adminId");
 echo $adminRole=Session::get("userRole");
 ?>
 <?php
 if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
    $updateprofile=$em->ProfileUpdate($_POST,$_FILES,$adminid,$adminRole);
} 
  ?>
    <div class="grid_10">
		
            <div class="box round first grid">

              
                <div class="block">
               
                <?php 
                if (isset($updateprofile)) {
                    echo($updateprofile);
                }
                ?>

                <?php 
                 $query="select * from users where userId='$adminid'";
                 $getuser=$db->select($query);
                 if ($getuser) {
                     while ($result=$getuser->fetch_assoc()) {
                        
                 ?>            
                  <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">

               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>Update User Profile

            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
             <?php 
                if (isset($updateprofile)) {?>
             <div class='alert alert-danger' style="display: none;"><strong>Error!</strong>
                   
                    <?php  echo($updateprofile); ?>
               
                 </div>;
                 <?php } ?>

                
                <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data" id="getOrderReportForm">
                <div class="form-group" style="display: none;">
                    <label for="startDate" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <?php 
                if (isset($updateprofile)) {
                    echo($updateprofile);
                }
                ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="<?php echo($result['name']); ?>"  class="form-control" id="startDate"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">UserName</label>
                    <div class="col-sm-10">
                      <input type="text" name="typeofuser" value="<?php echo($result['typeofuser']); ?>"    class="form-control" id="startDate"  />
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" value="<?php echo($result['email']); ?>"    class="form-control" id="startDate"  />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Old Image</label>
                    <div class="col-sm-10">
                      <img src=" <?php echo($result['image']); ?>" width="200" height="150">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="endDate" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="details" rows="5" id="comment">
                          <?php echo($result['address']); ?>
                       </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Upload Image</label>
                    <div class="col-sm-10">
                      <input type="file"   name="image"  class="form-control" id="startDate"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Update Profile</button>
                    </div>
                  </div>
                </form>

            </div>
            <!-- /panel-body -->
        </div>
    </div>
    <!-- /col-dm-12 -->
</div>
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