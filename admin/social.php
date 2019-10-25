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
        <div class="grid_10">
        
            <div class="box round first grid">
            
                 <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                         $facebook=$fm->validation($_POST['facebook']);
                        $twitter=$fm->validation($_POST['twitter']);
                        
                        $google=$fm->validation($_POST['google']);
                       
                        $facebook=mysqli_real_escape_string($db->link,$facebook);
                        $twitter=mysqli_real_escape_string($db->link,$twitter);
                        
                        $google=mysqli_real_escape_string($db->link,$google);
                        if ($facebook==""|| $twitter==""|| $google=="") {
                               echo("<span class='error'>field must not be empty!</span>");
                           }else{
                             $query="update social
                                 set
                                  facebook='$facebook',
                                  twitter='$twitter',
                                 
                                  google='$google'
                                 where id='1'";
                        $updated_rows = $db->update($query);    
                        if ($updated_rows) {  
                           echo "<span class='success'>slogan updated Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>slogan Not updated !</span>";   
                         }
                           }
                    }
                    ?>
                <div class="block"> 
                 <?php 
                $query="select * from social where id='1'";
                $social_media=$db->select($query);
                if ($social_media) {
                    while ($result=$social_media->fetch_assoc()) {
                       
                 ?>               
                  <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>Update Social Media
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-10">
                      <input type="text" name="facebook" value="<?php echo($result['facebook']); ?>"  class="form-control" id="startDate"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Twitter</label>
                    <div class="col-sm-10">
                      <input type="text" name="twitter" value="<?php echo($result['twitter']); ?>"   class="form-control" id="startDate"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Google Plus</label>
                    <div class="col-sm-10">
                      <input type="text"   name="google" value="<?php echo($result['google']); ?>"   class="form-control" id="startDate"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Update </button>
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
    <?php include 'inc/footer.php';?> 