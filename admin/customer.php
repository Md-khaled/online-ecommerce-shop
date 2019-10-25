
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
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
 ?>
<?php
if (!isset($_GET['cusId'])||$_GET['cusId']==NULL ||$_GET['cusId']!=$_GET['cusId']) {
    echo "<script>window.location = 'inbox.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['cusId']);
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
     echo "<script>window.location = 'inbox.php';</script>";
}
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer details</h2>
               <div class="block copyblock">
                
                <?php 
                $cus=new User(); 
                $getCust=$cus->getUserData($id);
                if ($getCust) {
                   while ($re=$getCust->fetch_assoc()) {
                 
                 ?>
                 <form  method="post">
                    <table class="form">                    
                        <tr>
                          <td>Name</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($re['name']) ;?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>Address</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($re['address']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>City</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($re['city']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>ZipCode</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($re['zip']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($re['phone']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                        <tr>
                          <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo($re['email']); ?>" class="medium" />
                            </td>
                        </tr>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}else{echo("catagory not found");} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>