<?php include("inc/header.php"); ?>
<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
       
		$name=$fm->validation($_POST['name']);
		$mobile=$fm->validation($_POST['mobile']);
		$email=$fm->validation($_POST['email']);
		$body=$fm->validation($_POST['body']);
		$name=mysqli_real_escape_string($db->link,$name);
		$mobile=mysqli_real_escape_string($db->link,$mobile);
		$email=mysqli_real_escape_string($db->link,$email);
		$body=mysqli_real_escape_string($db->link,$body);
	   $error="";
	 if (empty($name)) {
	 	$error="name must not be empty";
	 }elseif (!filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$error="Invalid Name!";
	 } elseif (empty($mobile)) {
	 	$error="mobile must not be empty";
	 }elseif (empty($email)) {
	 	$error="emaile must not be empty";
	 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$error="Invalid Email Address!";
	 }elseif (empty($body)) {
	 	$error="message field must not be empty";
	 }else{
	 	 $query = "INSERT INTO contact(name,mobileNo,email,body)   
           VALUES('$name','$mobile','$email','$body')";  
        $inserted_rows = $db->insert($query);    
        if ($inserted_rows) {  
           $msg="message send successfully" ;  
        }else {   
          $error="message not send " ;  
         }
	 }
	 } 


	?>


 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
				  	<?php 
				if (isset($error)) {
					echo("<span style='color: red;'>$error</span>");
				}
				if (isset($msg)) {
					echo("<span style='color: green;'>$msg</span>");
				}
				 ?>
					    <form action="" method="post">
				<table>
				<tr>
					<td>Your  Name:</td>
					<td>
					<input type="text" name="name" placeholder="Enter  name" />
					</td>
				</tr>
				<tr>
					<td>Your Mobile Number:</td>
					<td>
					<input type="text" name="mobile" placeholder="Enter mobile number" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include("inc/footer.php"); ?>