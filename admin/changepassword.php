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
   $adminid=Session::get("adminId");
  if ($_SERVER['REQUEST_METHOD']=='POST') {
        $old=$fm->validation(md5($_POST['old']));
       $new=$fm->validation(md5($_POST['new']));
        $old=mysqli_real_escape_string($db->link,$old);
        $new=mysqli_real_escape_string($db->link,$new);
       if (empty($old) || empty($new)) {
          echo("<span style='color: red;'>Field must not empty</span> ");
       }else{
        $query="select * from users where userId='$adminid'";
        $result=$db->select($query)->fetch_assoc();
        $pass=$result['password'];
        if ($pass!=$old) {
            echo("<span style='color: red;'>Password not match</span>");
        }else{
            $query="update users
                 set
                  password='$new'
                 where userId='$adminid'";
          $updated_rows = $db->update($query);  
          if ( $updated_rows) {
               echo("<span style='color: green;'>Password Updated Successfull</span>");
            }else{
                echo("<span style='color: red;'>Password Not Updated</span> ");
            }  
        }
    }
    }
     ?>
     
        <div class="block">               
          <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>Change Password
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="text"   name="old"  class="form-control" id="startDate"  placeholder="Enter Old Password" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="text"  name="new"   class="form-control" id="startDate"  placeholder="Enter New Password" />
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
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>