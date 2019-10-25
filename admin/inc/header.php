<?php 
// include '../lib/Session.php'; 
// Session::checkSession();
 ?>
 <?php 
include_once '../lib/Session.php'; 
Session::checkSession();
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
include_once'../classes/Employee.php';  
include_once'../classes/Report.php'; 
include_once'../classes/Product.php';

spl_autoload_register(function($class){
include_once"../classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$em=new Employee(); 
$report=new Report();
$pd=new Product(); 


 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
    <script type="text/javascript" src="inc/jquery.min.js"></script>
    <script type="text/javascript" src="inc/bootstrap.min.js"></script>
    
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                <?php 
                $query="select * from slogan where sId='1'";
                $blog_title=$db->select($query);
                if ($blog_title) {
                    while ($result=$blog_title->fetch_assoc()) {
                       
                 ?> 
                    <img src="<?php echo($result['logo']); ?>" alt="Logo" />
                    <?php }} ?>
				</div>
				<div class="floatleft middle">
                
					<h1>BD Online Shop & Service</h1>
					
				</div>
                <div class="floatright">
                    <div class="floatleft">
                    <?php 
                $id=Session::get("adminId");
                $query="SELECT image FROM users WHERE userId='$id' ";
                $img=$db->select($query);
               foreach ($img as $result) {?>
              <img src="<?php echo($result['image']) ?>" width="50" height="50" alt="Profile Pic" /></div>
              <?php } ?>

                        <?php 
           if (isset($_GET['action'])&&$_GET['action']=="logout") {
            Session::destroy();
           }
           ?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo(Session::get('adminName')); ?></li>
                            <li>
                            <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                  <li><a href="?action=logout">><span style="color:rgb(67, 111, 112);">Logout</span ></a></li>
                                    <li><a href="profile.php"><span style="color:rgb(67, 111, 112);">User Profile</span ></a></li>
                                     <li>
                                     <a href="changepassword.php"><span style="color:rgb(67, 111, 112);">Change Password</span></a>
                                     </li>
                                    
                                  </ul>
                                </div> 
                            <!-- <a href="?action=logout">Logout</a> -->
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clear" >
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="../index.php">Visit Website</a>
                </div>
                <ul class="nav navbar-nav">
                  <li ><a href="dashbord.php"> <i class="glyphicon glyphicon-signal"></i>Dashboard</a> </li>
                <li ><a href="theme.php"><span>Theme</span></a> </li>
                <!-- <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li> -->
                <?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
                <li ><a href="inbox.php"><span>Inbox</span></a></li>
                <li ><a href="mailsendalluser.php"><span>Send mail</span></a></li>
                <?php } ?>
                
                </ul>
              </div>
            </nav>
        </div>
        <div class="clear">
        </div>
    