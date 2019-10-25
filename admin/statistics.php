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
<h2>Statistics  Report</h2><br/>

<?php
$getsalsstatic=$report->getAllSaleStatic();
  ?>
 <div class="block">
 <div class="panel panel-default">
  <div class="panel-heading">
      
  <a class="btn btn-success" href="monthlystatic.php">Sales Report</a>     
 </div>
    </div>


 </div>
 <br/>
 <h2>Report</h2>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          $aa='<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>';
                          $ss="";
                          $dd=0;
                          while($row = $getsalsstatic->fetch_assoc())  
                          {  
                            $ss=$row["productName"];
                            $dd=$row["number"];
                               echo "['name :".$ss."',". $dd."],"; 
                             // echo("$ss."".$dd"); 
                              // echo('<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>$row['number']</b></div>');
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Male and Female Employee',  
                      is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
           <div id="piechart" style="width: 900px; height: 500px;"></div>
 </div>
</div>
<?php include 'inc/footer.php';?> 
