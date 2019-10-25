<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once'../classes/Employee.php'; ?>
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
if (!Session::get("adminRole")=='0') {
   echo("<script>window.location='dashbord.php';</script>");

}
 ?>
 <?php
    $em=new Employee(); 
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
        $adduser=$em->addEmployee($_POST);
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New user</h2>
               <div class="block copyblock"> 
               <?php 
                if (isset($adduser)) {
                    echo($adduser);
                }
               ?>  

 <!-- <?php 
    // if ($_SERVER['REQUEST_METHOD']=='POST') {
    //    $userName=$fm->validation($_POST['userName']);
    //     $email=$fm->validation($_POST['email']);
    //    $password=$fm->validation(md5($_POST['password']));
    //     $role=$fm->validation($_POST['role']);
    //     $userName=mysqli_real_escape_string($db->link,$userName);
    //     $email=mysqli_real_escape_string($db->link,$email);
    //     $password=mysqli_real_escape_string($db->link,$password);
    //     $role=mysqli_real_escape_string($db->link,$role);
    //     if (empty($userName)|| empty($password)||empty($password)||empty($email)) {
    //         echo("<span class='error'>field must not be empty!</span>");
    //     }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    //      echo("<span class='error'>invalid email!</span>");
    //     }else{
    //         $mailquery="select * from users where email='$email' limit 1";
    //      $checkmail=$db->select($mailquery);
         
    //      if ($checkmail !=false) {
    //         echo("<span class='error'>email already exists!</span>");
             
    //      } else{
    //         $query="insert into users(email,password,typeofuser,role) values('$email','$password','$userName','$role')";
    //          $catinsert=$db->insert($query);
    //          if ($catinsert) {
    //             echo("<span class='success'> user inserted successfully!</span>"); 
    //          }else{
    //              echo("<span class='success'> user not inserted !</span>"); 
    //          }
    //      }
    //     }
    // }
?> -->
                 <form action="" method="post">
                    <table class="form">
                    <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter  Name..." class="medium" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="typeofuser" placeholder="Enter user Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>EmployeeID</label>
                            </td>
                            <td>
                                <input type="text" name="eid" placeholder="Enter EmployeeID..." class="medium" /> &nbsp <?php 
                                 $query="SELECT MAX(employeeid) as rol FROM users";
                                      $result=$db->select($query)->fetch_assoc();
                                     $re=$result['rol'];
                                echo("   Last ID:  $re"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter password..." class="medium" />
                            </td>
                        </tr>
                        
                        <tr> 
                             <td>
                                <label>Select user</label>
                            </td>
                            <td>
                                <select class="select" name="role">
                                    <option>select User Role</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Service man</option>
                                   
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include 'inc/footer.php';?> 