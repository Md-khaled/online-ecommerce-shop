<?php 
$back=backup_database_tables('localhost','root','','db_shop', '*');
if ($back==true) {
	echo("<script>alert('database backup successfull');</script>");
header("Location:../dashbord.php");
}

// backup the db function
function backup_database_tables($host,$user,$pass,$name,$tables)
{

$link = mysqli_connect($host,$user,$pass,$name);
//mysql_select_db($name,$link);

//get all of the tables
if($tables == '*')
{
$tables = array();
$result = mysqli_query($link,'SHOW TABLES');
while($row = mysqli_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}
$return="";
//cycle through each table and format the data
foreach($tables as $table)
{
$result = mysqli_query($link,'SELECT * FROM '.$table);
$num_fields = mysqli_num_fields($result);

$return.= 'DROP TABLE '.$table.';';
$row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
$return.= "nn".$row2[1].";nn";

for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysqli_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
//$row[$j] = preg_replace("n","\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");n";
}
}
$return.="nnn";
}

//save the file
$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
fwrite($handle,$return);
fclose($handle);
}

 ?>
 <a href="../dashbord.php">back</a>