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
<style>
    .leftside{float: left;width: 70%}
    .rightside{float: left;width: 20%}
    .rightside img{height: 160px;width: 170px;}

</style>

        <div class="grid_10">
        
            <div class="box round first grid">
               
              <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                         $theme=$fm->validation($_POST['theme']);
                        $theme=mysqli_real_escape_string($db->link,$theme);
                        
                     $query="update theme
                                 set
                                 
                                  theme='$theme'
                                 where tid='1'";
                        $updated_rows = $db->update($query);    
                        if ($updated_rows) {  
                           echo "<span class='success'>theme updated Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>theme Not updated !</span>";   
                         }
                      
                   }
                 ?>

                <?php 
                $query="select * from theme where tid='1'";
                $blog_title=$db->select($query);
                if ($blog_title) {
                    while ($result=$blog_title->fetch_assoc()) {
                       
                 ?> 
                <div class="block sloginblock">  
                            
                 <div class="leftside">
                 <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>Update Site Title and Description
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post" id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Default</label>
                    <div class="col-sm-10">
                    <div class="radio">
                    <label><input <?php if ($result['theme']=='default') {  echo("checked");} ?> type="radio" name="theme" value="default">Default</label>
                  </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Tan</label>
                    <div class="col-sm-10">
                     <div class="radio">
                    <label><input <?php if ($result['theme']=='tan') {  echo("checked");} ?> type="radio" name="theme" value="tan">Tan</label>
                  </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Change</button>
                    </div>
                  </div>
                </form>

            </div>
            <!-- /panel-body -->
        </div>
    </div>
    <!-- /col-dm-12 -->
</div>
                    </div>

                </div>
                <?php }} ?>
            </div>
        </div>
       <?php include 'inc/footer.php';?> 