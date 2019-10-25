<?php 
include_once 'lib/Session.php'; 
Session::init();
include_once 'lib/Database.php';
$db=new Database();

 ?>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

 <?php 
    $query="select * from theme where tid='1'";
    $blog_title=$db->select($query);
    if ($blog_title) {
        while ($result=$blog_title->fetch_assoc()) {
         // echo($result['theme']);
          if ($result['theme']=='default') { ?> 
          <link href="theme/default.css" rel="stylesheet" type="text/css" media="all"/>
          <?php }elseif ($result['theme']=='tan') { ?>
           <link href="theme/tan.css" rel="stylesheet" type="text/css" media="all"/>
          <?php } ?>
          <?php }} ?>
           
         
           
    
