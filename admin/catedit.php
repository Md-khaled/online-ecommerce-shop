
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Catagory.php'; ?>
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
if (!isset($_GET['catid'])||$_GET['catid']==NULL ||$_GET['catid']!=$_GET['catid']) {
    echo "<script>window.location = 'catlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['catid']);
}
$cat=new Catagory(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $CatName=$_POST['catname'];
    $updateCat=$cat->catUpdate($CatName,$id);
}
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">
               <?php 
               if (isset( $updateCat)) {
                   echo( $updateCat);
               }
                ?> 
                <?php 
                $getcat=$cat->getCatById($id);
                if ($getcat) {
                   while ($re=$getcat->fetch_assoc()) {
                 
                 ?>
                 <form  method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="catname" value="<?php echo($re['catName']) ?>" class="medium" />
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