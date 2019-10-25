<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 $db=new Database();
 $fm=new Format();
 ?>
<?php
 $adminid=Session::get("adminId");
  $adminRole=Session::get("userRole");
 ?>
    <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update User Profile</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                         $name=$fm->validation($_POST['name']);
                        $typeofuser=$fm->validation($_POST['typeofuser']);
                        $email=$fm->validation($_POST['email']);
                        $details=$fm->validation($_POST['details']);
                        
                        $name=mysqli_real_escape_string($db->link,$name);
                        $typeofuser=mysqli_real_escape_string($db->link,$typeofuser);
                        $email=mysqli_real_escape_string($db->link,$email);
                        $details=mysqli_real_escape_string($db->link,$details);
                        
                           
                          
                     $query="update users
                                 set
                                  name='$name',
                                  typeofuser='$typeofuser',
                                  email='$email',
                                  address='$details'
                                  where userId='$adminid' and role='$adminRole'";
                        $updated_rows = $db->update($query);    
                        if ($updated_rows) {  
                           echo "<span class='success'>User updated Successfully.     </span>";    
                        }else {   
                          echo "<span class='error'>User Not updated !</span>";   
                         }
                      
                   }
                 ?>
                <div class="block">   
                <?php 
                 $query="select * from users where userId='$adminid' and role='$adminRole'";
                 $getuser=$db->select($query);
                 if ($getuser) {
                     while ($result=$getuser->fetch_assoc()) {
                        
                 ?>            
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo($result['name']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>UserName</label>
                            </td>
                            <td>
                                <input type="text" name="typeofuser" value="<?php echo($result['typeofuser']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo($result['email']); ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Address</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                   <?php echo($result['address']); ?>
                                </textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
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
<?php include 'inc/footer.php';?>