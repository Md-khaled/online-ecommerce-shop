<?php  ob_start(); ?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php include_once '../classes/Catagory.php'; ?>
<?php include_once'../classes/Product.php'; ?>
<?php include_once'../classes/Brand.php'; ?>
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
if (!isset($_GET['pdid'])||$_GET['pdid']==NULL ||$_GET['pdid']!=$_GET['pdid']) {
    echo "<script>window.location = 'productlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['pdid']);
}
 
$pd=new Product(); 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['Update'])) {
    $updateProduct=$pd->productUpdate($_POST,$_FILES,$id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block"> 
        <?php 
        if (isset($updateProduct)) {
            echo($updateProduct);
        }
         ?>  
         <?php 
         $getPd=$pd->getPdById($id);
         if ($getPd) {
             while ($re=$getPd->fetch_assoc()) {
                 
           
         
          ?>            
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo($re['productName']); ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                               <?php 
                            $cat=new Catagory();
                            $getCat=$cat->getAllCat();
                            if ($getCat) {
                                while ($result=$getCat->fetch_assoc()) {  
                             ?>
                              <option 
                              <?php 
                              if ($re['catId']==$result['catId']) {?>
                                  selected="selected"
                              
                             <?php  } ?> value="<?php echo($result['catId']); ?>"><?php echo($result['catName']); ?></option>
                            <?php }}else{echo("Category not found");} ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                             <?php 
                            $brand=new Brand();
                            $getBrand=$brand->getAllBrand();
                            if ($getBrand) {
                                while ($result=$getBrand->fetch_assoc()) {  
                             ?>
                              <option 
                              <?php 
                              if ($re['brandId']==$result['brandId']) {?>
                                  selected="selected"
                              
                             <?php  } ?> value="<?php echo($result['brandId']); ?>"><?php echo($result['brandName']); ?></option>
                            <?php }}else{echo("Brand not found");} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo($re['body']); ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Net Price</label>
                    </td>
                    <td>
                        <input type="text" name="netprice" value="<?php echo($re['netprice']); ?>" class="medium" />
                    </td>
                </tr>
            
				<tr>
                    <td>
                        <label>Sale Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo($re['price']); ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <input type="text" name="quantity" value="<?php echo($re['quantity']); ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img src="<?php echo($re['image']); ?>" height="100px" width="250px"/><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if ($re['type']==0) {?>
                            <option selected="selected" value="0">Featured</option>
                            <option value="1">General</option>
                               
                           <?php }else{ ?>
                            <option selected="selected" value="1">General</option>
                            <option value="0">Featured</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <?php $set='test'; ?>
                    <td>
                        <input type="submit" name="Update" Value="Update" />
                        <input type="submit" name="<?php echo($set); ?>" Value="Back" />
                        
                    </td>
                </tr>
            </table>
            </form>

            <?php }}else{echo("not retrive product");} ?>
            <?php 
            if (isset($_POST[$set])) {

                header("Location: productlist.php");
            }
             ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';
ob_end_flush();
?>


