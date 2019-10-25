
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php'; ?>
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
if (!isset($_GET['brandid'])||$_GET['brandid']==NULL ||$_GET['brandid']!=$_GET['brandid']) {
    echo "<script>window.location = 'brandlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}
$brand=new Brand(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $brandName=$_POST['brandName'];
    $updateBrand=$brand->brandUpdate($brandName,$id);
}
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">
               <?php 
               if (isset( $updateBrand)) {
                   echo( $updateBrand);
               }
                ?> 
                <?php 
                $getBrand=$brand->getBrandById($id);
                if ($getBrand) {
                   while ($re=$getBrand->fetch_assoc()) {
                 
                 ?>
                 <form  method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo($re['brandName']) ?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}else{echo("catagory not found");} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>