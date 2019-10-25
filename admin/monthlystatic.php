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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function() {
      $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", new Date());
   });
  </script>
 <div class="grid_10">
<div class="box round first grid">
<h2>Statistics  Report</h2><br/>
<?php
 // $date="";
 // $eid="" ;
 //    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['See_Attend'])) {
  //  $dd=$_POST['date'];
  // echo  $date= date("m",strtotime($dd));
  // $eid=$_POST['eid'];
 //    $getattend=$em->getAttendById($date,$eid);
 //  }

 ?>
<?php
$y=0;
$month=array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nob','Dec');
for ($x=1; $x<=12 ; $x++) { 
  $sal[$x]=0;
}

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['month_static'])) {
   $dd=$_POST['date'];
  echo  $year= date("Y",strtotime($dd));
  
    $getattend=$report->getMonthStatic($year);
    if ($getattend==true) {
      while ($result=$getattend->fetch_assoc()) {
  $y=date("Y",strtotime($result['date']));
   $mon=(int)date("m",strtotime($result['date']));
  if ($y==$year) {
    $sal[$mon]=$sal[$mon]+$result['Year'];
  }
}
      
    }
  }
  ?>
 <div class="block">

 <form class="form-inline" method="post">
  <div class="form-group">
    <label for="email">Date:</label>
    <input type="text" class="form-control" id="datepicker" name="date">
  </div>
 
  <button type="submit" name="month_static" class="btn btn-default">Monthly report</button>
  <button type="submit" name="year_static" class="btn btn-default">Yearly report</button>
  
</form>

 </div>
 <br/>
 <h2>Report</h2>
 <?php
  if (isset($getattend) && $y!==$year){
    echo("Data not found");
  } 
  ?>
 <?php
 if (isset($getattend) && $y==$year ) {?>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization","1", {packages:['corechart']});
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php 
          for ($x=1; $x<=12 ; $x++) {
           ?>
          ['', 'Sales'],
          ['<?php echo($month[$x]); ?>', <?php echo($sal[$x]); ?>],
         <?php } ?>
        ]);

        var options = {
         
            title: 'Company Performance',
            hAxis: {title: 'Sales 2014-2017',titleTextStyle: {color: 'red'}
          }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
    <div id="chart_div" style="width: 98%; height: 500px;"></div>
<?php } ?>


<?php 
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['year_static'])) {?>
<?php 
 $getyear=$report->getYearStatic();
?>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <script type="text/javascript">
      google.load("visualization","1", {packages:['corechart']});
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['', 'Sales'],
          <?php 
         while ($result=$getyear->fetch_assoc()) {
            echo "['".$result["year"]."', ".$result["price"]."],"; 
         }
           ?>
         
        ]);

        var options = {
         
            title: 'Company Performance',
            hAxis: {title: 'Sales 2014-2017',titleTextStyle: {color: 'red'}
          }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
<div id="chart_div" style="width: 98%; height: 500px;"></div>


 <?php } ?>
 </div>
</div>
<?php include 'inc/footer.php';?> 
