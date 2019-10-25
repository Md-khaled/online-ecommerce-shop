<?php ob_start(); ?>
<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==true) {
   header("Location:order.php");
}
 ?>
 <?php
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login'])) {
     $userLog=$ur->userLogin($_POST);
       }

  ?>
  <style>
div.relative {
	padding: 2px;
    position: relative;
     top: 30px;
     left: 400px;
    width: 600px;
    height: 400px;
    border: 3px solid #73AD21;
} 
.panel-heading a:hover{text-decoration: none;}

/*div.absolute {
    position: absolute;
    top: 80px;
    right: 0;
    width: 200px;
    height: 100px;
    border: 3px solid #73AD21;
}*/
</style>

 <div class="main">
    <div class="content">
    	  <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>Update Site Title and Description

            </div>
            <div class="panel-heading" style="text-align: center; font-size: 24px;">
                <?php 
                if (isset($userLog)) {
                    echo($userLog);
                }
                 ?>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <form class="form-horizontal" action="" method="post"  id="getOrderReportForm">
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="email" type="email" class="form-control" name="email" placeholder="Enter Your Email">
                        </div>
                    <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="email"   name="email"  class="form-control" id="startDate"  placeholder="Enter Your Email" /> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="startDate" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                     <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Enter Your Password">
                    </div>
                     <!--  <input type="password"  name="password"   class="form-control" id="startDate"  placeholder="Enter Your Password" /> -->
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="login" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Log In</button>

		
		
                    </div>
                  </div>
                </form>
                <div class="panel-heading" style="text-align: center; font-size: 24px; ">
               <a href="forgetpass.php">Forgot Password</a>
            </div>
            </div>
            <!-- /panel-body -->
        </div>
    </div>
    <!-- /col-dm-12 -->
</div>
    </div>
 </div>
<?php include("inc/footer.php"); ?>
 <?php ob_end_flush(); ?>