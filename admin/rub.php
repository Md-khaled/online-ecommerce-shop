<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


     <script>
$(function() {
$( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    // Change this line
});
</script>  
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Cart.php');
 $ct=new Cart();
 $fm=new Format();
 ?>
 <?php
 $user=Session::get("adminId");
 $role=Session::get("adminRole");
   ?>
 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Service List</h2>
               
                <div class="block">
                 <form action="" method="post">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						     <th>SN</th>
							
							<th>product</th>
							<th>quantity</th>
							<th>price</th>
							<th>Total amount</th>
							
							<th >Responsibility Person</th>
							<th width="15%">Delivery Date</th>
							<?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
							<th>Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php 
				
					$getorder=$ct->getDeliveryProduct();
					
					if ($getorder) {
						$i=0;
						while ($result=$getorder->fetch_assoc()) {
							$i++;
							
					 ?>
						<tr class="odd gradeX">

						 <td><?php echo($i) ; ?></td>
							
							<td>
							<?php echo($result['productName']) ;?>
							</td>
							<td><?php echo($result['quantity']) ;?></td>
							<td>$<?php echo($result['price']) ;?></td>
							<td><?php echo($result['total_amount'])  ;?></td>
							
							<td>
								<?php echo($result['serviceman'])  ;?>  
							</td>
							<td>
								<?php echo($result['delivery_date'])  ;?> 
                             </td>
							<td>
		   	 		         <input  type="submit" class="btn btn-info pull-left" name="" value="submit">
		   	 	          </td>
						</tr>
						<?php }} ?>
						
					</tbody>
				  </table>
				 </form>
               </div>
            </div>
        </div>

<?php include 'inc/footer.php';?>