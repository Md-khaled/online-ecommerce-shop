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
                         $name=$fm->validation($_POST['name']);
                        $body=$fm->validation($_POST['body']);
                      
                        $name=mysqli_real_escape_string($db->link,$name);
                        
                        $body=mysqli_real_escape_string($db->link,$body);
                        
                           
                         
                           if ($name==""||  $body=="") {
                               echo("<span class='error'>field must not be empty!</span>");
                           } else{    
                       
                         $query = "INSERT INTO page(name,body)   
                           VALUES('$name','$body')";  
                        $inserted_rows = $db->insert($query);    
                        if ($inserted_rows) {  
                           echo "<span class='success'>page created Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>page Not created !</span>";   
                         }
                     }
                   }
                 ?>
                <div class="block">               
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
                      <input type="text" name="name" class="form-control" id="startDate" name="startDate" placeholder="Enter Page Name" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="endDate" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                       <textarea class="form-control" name="body" rows="5" id="comment"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Page</button>
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