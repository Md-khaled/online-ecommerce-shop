<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
// if (!isset($_GET['rmsgid']) || $_GET['rmsgid']==NULL) {
//    echo("<script>window.location='inbox.php';</script>");
//    // header("Location: catlist.php");
// }else{
//     $rmsgid=$_GET['rmsgid'];
// }
 ?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>View Message</h2>
                <?php 
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
                       $to=$fm->validation($_POST['toemail']);
                        $from=$fm->validation($_POST['fromemail']);
                        $subject=$fm->validation($_POST['subject']);
                        $message=$fm->validation($_POST['message']);
                        $name=$_POST['name'];
                        $to=mysqli_real_escape_string($db->link,$to);
                        $from=mysqli_real_escape_string($db->link,$from);
                        $subject=mysqli_real_escape_string($db->link,$subject);
                        $message=mysqli_real_escape_string($db->link,$message);
                        if (empty($from)||empty($subject)||empty($message)) {
                         echo("Field must not be empty");
                       }else{
                         include '../mailSender.php';
                          $mail->setFrom($from, 'ChildrenParty4u');
                          $mail->addReplyTo($from, 'ChildrenParty4u');
                          $mail->Subject = $subject;

                         $mail->Body = 'Dear '.$name.','.$message.'.Thanks for your comment.';
                        $mail->addAddress($to, $name);
                        $sendmail=mail($to,$subject,$message,$from);
                         if(!$mail->send()) {
                           echo("<script>alert('Message could not be sent');</script>");
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                               
                               echo("<script>alert('Message has been sent');</script>");
                              echo "<script>window.location = 'inbox.php';</script>";
                        }
                    }
                   }
                 ?>
                <div class="block">               
                 <form action="" method="post" >
                 <?php 
                    // $query="select * from contact where contactid='$rmsgid'";
                    // $msg=$db->select($query);
                    // if ($msg) {
                       
                    //     while ($result=$msg->fetch_assoc()) {
                           
                        
                     ?>
                    <table class="form">
                     <input type="hidden" name="name" value="<?php// echo($result['name']); ?>">
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="toemail" value="<?php //echo($result['email']); ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="enter yuor email..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="enter yuor subject..." class="medium" />
                            </td>
                        </tr>
                        
                      <tr>
                            <td >
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">
                                   
                                </textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="send" />
                            </td>
                        </tr>
                    </table>
                    <?php //}} ?>
                    </form>
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