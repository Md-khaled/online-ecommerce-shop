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
    .actiondel{margin-left: 10px; text-decoration: none;}
    .actiondel a{border:1px solid #ddd;color: #444;cursor: pointer;font-size: 20px;padding: 2px 10px;font-weight: normal;background: #f0f0f0;}
</style>
<?php 
if (!isset($_GET['pagesid'])||$_GET['pagesid']==NULL) {
    header("Location: index.php");
}else{
    $pagesid=$_GET['pagesid'];
    
}
 ?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New page</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                         $name=$fm->validation($_POST['name']);
                        $body=$fm->validation($_POST['body']);
             

                        $name=mysqli_real_escape_string($db->link,$name);
                        
                        $body=mysqli_real_escape_string($db->link,$body);
                        
                           
                         
                           if ($name==""||  $body=="") {
                               echo("<span class='error'>field must not be empty!</span>");
                           } else{    
                       
                         $query="update page
                                 set
                                  name='$name',
                                  body='$body'
                                  where pid='$pagesid'";
                        $updated_rows = $db->update($query);    
                        if ($updated_rows) {  
                           echo "<span class='success'>page updated Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>page Not updated !</span>";   
                         }
                     }
                   }
                 ?>
                <div class="block"> 
                <?php 
                     $query="select * from page where pid='$pagesid'";
                     $pages=$db->select($query);
                     if ($pages) {
                         while ($result=$pages->fetch_assoc()) {
                            
                 ?>              
                                 <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>   New Page
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post" id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="<?php echo($result['name']); ?>" class="form-control" id="startDate" name="startDate" placeholder="Enter Page Name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="endDate" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="body" rows="5" id="comment">
                            <?php echo($result['body']); ?>
                       </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Page</button>
                     
                      <span class="actiondel" ><a onclick="return confirm('Are you sure to delete page!');" href="delpage.php?delpageid=<?php echo($result['pid']); ?>">Delete page</a></span>
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