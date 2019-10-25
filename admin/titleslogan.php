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
                         $title=$fm->validation($_POST['title']);
                        $slogan=$fm->validation($_POST['slogan']);
                       
                        $title=mysqli_real_escape_string($db->link,$title);
                        $slogan=mysqli_real_escape_string($db->link,$slogan);
                        
                           
                          $permited  = array( 'png');   
                           $file_name = $_FILES['logo']['name'];   
                         $file_size = $_FILES['logo']['size'];  
                           $file_temp = $_FILES['logo']['tmp_name'];   
                            $div = explode('.', $file_name);    
                            $file_ext = strtolower(end($div));  
                          $same_image = 'logo'.'.'.$file_ext;   
                           $uploaded_image = "upload/".$same_image;
                           if ( $title=="" || $slogan=="") {
                               echo("<span class='error'>field must not be empty!</span>");
                           }else{
                           if (!empty($file_name)) {
                              
                           if ($file_size >1048567) {   
                        echo "<span class='error'>Image Size should be less then 1MB!     </span>";    
                        } elseif (in_array($file_ext, $permited) === false) {  
                        echo "<span class='error'>You can upload only:-"     .implode(', ', $permited)."</span>";    
                        } else{    
                        move_uploaded_file($file_temp, $uploaded_image);    
                         $query="update slogan
                                 set
                                  sTitle='$title',
                                  slogan='$slogan',
                                  logo='$uploaded_image'
                                 where sId='1'";
                        $updated_rows = $db->update($query);    
                        if ($updated_rows) {  
                           echo "<span class='success'>slogan updated Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>slogan Not updated !</span>";   
                         }
                     }
                 }else{
                     $query="update slogan
                                 set
                                  sTitle='$title',
                                  slogan='$slogan'
                                 where sId='1'";
                        $updated_rows = $db->update($query);    
                        if ($updated_rows) {  
                           echo "<span class='success'>slogan updated Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>slogan Not updated !</span>";   
                         }
                       }
                     }
                   }
                 ?>

                <?php 
                $query="select * from slogan where sId='1'";
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
                
                <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data" id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Website Title</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo($result['sTitle']); ?>"  name="title"  class="form-control" id="startDate"  placeholder="Enter Page Name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Website Slogan</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo($result['slogan']); ?>" name="slogan"   class="form-control" id="startDate"  placeholder="Enter Page Name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Upload Logo</label>
                    <div class="col-sm-10">
                      <input type="file"   name="logo"  class="form-control" id="startDate"   />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Update Title</button>
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

                    <div class="rightside">
                        <img src="<?php echo($result['logo']); ?>" alt="logo"/>
                        
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
       <?php include 'inc/footer.php';?> 