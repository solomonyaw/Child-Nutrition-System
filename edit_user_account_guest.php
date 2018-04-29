<!DOCTYPE html>

<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_admin_username']))
			{
				header('location:index_admin.php');
			}
			
	$Admin_Username= $_SESSION['cns_admin_username'];

?>


<html>

	<!--META DATA-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="Images/cnms_favicon.jpg" type="image/gif" sizes="16x16">
	<!--META DATA ENDS HERE-->
	
	<!--CSS LINKS-->
    <link href="local_stylesheet/style.css" rel="stylesheet">
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--CSS LINKS ENDS HERE-->
	
	<!--TITLE-->
	<title>Create Guest Account</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>

<style>

.guest {
	
	
	border-top:2px solid #DDDCE4;
	border-bottom:2px solid #DDDCE4;
	
}

.margin-part2 {
	
	margin-top:7px;
	
	
}


.formfield * {
  vertical-align: top;
}

</style>
</head>
<!--HEAD ENDS HERE-->	

<body>
<?php

		if(isset($_GET['edit_user_account_guest'])){
			
			$guest_id = $_GET['edit_user_account_guest'];
			
		
	
	
		
		
		global $create_user_account;
		$create_user_account = 0;
		
		if(isset($_POST['submit'])){
			
		$create_user_account=1;
																						
							$password         = md5($_POST['password']);
							$confirm_password =  md5($_POST['confirm_password']);						
	
							
							if($password != $confirm_password) 
							{
								echo '<script>';
								echo 'alert("Password and Confirm Password did not match.")';
								
								echo '</script>';
								
							

							}
							else {

							//UPLOAD THE DATA INTO THE DATABASE
							$first_name       = $_POST['first_name'];
							$middle_name      = $_POST['middle_name'];
							$last_name        = $_POST['last_name'];
							$username         = $_POST['username'];
					
							$occupation      =	$_POST['occupation'];
							$reason       	= $_POST['reason'];
						
						
							
							//INSERT THE DATA FROM FROM TO DATABASE
							$update_guest = $conn->query("UPDATE user_account_guest SET FirstName='$first_name' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET MiddleName='$middle_name' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET LastName='$last_name' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET UserName='$username' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET Password='$password' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET ConfirmPassword='$confirm_password' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET Occupation ='$occupation' WHERE IDNumber = $guest_id");
							$update_guest = $conn->query("UPDATE user_account_guest SET Reason='$reason' WHERE IDNumber = $guest_id");
							
							
							//ECHO THAT THE GUEST IS UPDATED
						
							
							header('Location: list_of_accounts_guest.php?edit_guest_success=1');
		}
		
		}
		}

?>
<!--SIDENAV-->
<div  id="mySidenav" class="sidenav">

<div class="profile">

<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT * FROM admin_account WHERE UserName='$Admin_Username'");
			
			//FETCH THE DATAS FROM admin_account table
			while($row=$show_accounts->fetch()){
			
			//SET $image_name value is equal to ProfilePhoto
			$image_name=$row['ProfilePhoto'];
			
			//SET $admin_first_name value is equal to FirstName
			$admin_first_name=$row['FirstName'];
			
			?>
<!-- GET THE IMAGE NAME FROM $image_name -->
<img src="admin_photo/<?php echo $image_name; ?>">


			
<!-- GET THE ADMIN NAME FROM $admin_first_name -->			
<p><?php echo $admin_first_name; ?></p>
<span>Administrator</span>						

<?php } ?>	

</div>


<div >
<ul class="sidenavmenus">


 <li>
 <a href="home_admin.php">
 <i  class="fa fa-home fa-lg "></i><span>Home</span>
 </a>
 </li>

 <li>
 <a href="admin_profile.php">
 <i  class="fa fa-user fa-lg active"></i><span>Admin Profile</span>
 </a>
 </li>
 
 <li>
 <a href="#">
 <i class="fa fa-book fa-lg"></i><span>About</span>
 </a>
 </li>
 
 <li>
 <a href="create_user_account.php">
 <i class="fa fa-plus fa-lg"></i><span>Create User Account</span>
 </a>
 </li>
 

 
 <li>
 <a href="list_of_accounts.php">
 <i class="fa fa-list-ol fa-lg"></i><span class="active" >List of Accounts</span>
 </a>
 </li>
 
 <li>
 <a href="update_admin_account.php">
 <i  class="fa fa-pencil-square-o fa-lg"></i><span>Update Admin Account</span>
 </a>
 </li>
 
</ul>
</div>

<div class="removesidenav">
<a onclick="closeNav()"><span class="fa fa-eye-slash" ></span>Hide Sidebar</a>
</div>
</div>
<!--SIDENAV ENDS HERE-->



<!--CONTENT-->
<div id="main">


<!--TOPBAR-->
<div  class="topbar">
	
	<!--SIDENAV BUTTON & LOGO-->
	<div class="sidenav_button_logo">
		<a href="#home" onclick="openNav()"><span class="fa fa-bars fa-lg"></span></a><img src="Images/small_CNSLogowhite.png">
	</div>
	<!--SIDENAV BUTTON & LOGO ENDS HERE-->
 
	
	<div class="topbar_welcome_logout">
		<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT *FROM admin_account WHERE UserName = '$Admin_Username'");
	
			//FETCH THE DATAS FROM admin_account table
			while($row=$show_accounts->fetch()){
			
			//SET $image_name value is equal to ProfilePhoto	
			$image_name=$row['ProfilePhoto'];
			
			//SET $admin_first_name value is equal to FirstName
			$admin_first_name=$row['FirstName'];
			
			?>
																				
	<a href="logout_account.php"><span class=" fa fa-power-off fa-lg"></span></a><a href="admin_profile.php">
	<!-- GET THE ADMIN NAME FROM $admin_first_name -->
	<?php echo $admin_first_name; ?></a>
	<!-- GET THE IMAGE NAME FROM $image_name -->
	<img src="admin_photo/<?php echo $image_name; ?>">
	
			<?php }
			?>

	</div>

</div>
<!-- TOPBAR ENDS HERE -->


<!--CREATE GUEST ACCOUNT HEADER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="create_account_container">
<div class="create_header">Edit Guest Account</div>
</div>


<!--CREATE GUEST ACCOUNT FORM----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="create_account guest">


<form method="POST">

<div class="part1">



<div>
<label>First Name</label>

<?php

 $guest_info = $conn->query("SELECT *FROM user_account_guest WHERE IDNumber = $guest_id");
 while ($row=$guest_info->fetch()) {
	 $Guest_FirstName = $row['FirstName'];
	?>

<input type="text" name="first_name" placeholder="Enter First Name" value="<?php echo $Guest_FirstName; ?> " required/>

<?php } ?>
</div> 
 
<div>
<label> Middle Name: </label>

<?php

 $guest_info = $conn->query("SELECT *FROM user_account_guest WHERE IDNumber = $guest_id");
 while ($row=$guest_info->fetch()) {
	 $Guest_MiddleName = $row['MiddleName'];
	?>

<input type="text" name="middle_name" placeholder="Enter Middle Name" value="<?php echo $Guest_MiddleName; ?>" required/>
<?php } ?>
</div>


<div>
<label> Last Name: </label>
<?php

 $guest_info = $conn->query("SELECT *FROM user_account_guest WHERE IDNumber = $guest_id");
 while ($row=$guest_info->fetch()) {
	 $Guest_LastName = $row['LastName'];
	?>
<input type="text" name="last_name" placeholder="Enter Last Name" value="<?php echo $Guest_LastName;?>" required/>
<?php } ?>
</div>

<div>
<label> Username: </label>
<?php

 $guest_info = $conn->query("SELECT *FROM user_account_guest WHERE IDNumber = $guest_id");
 while ($row=$guest_info->fetch()) {
	 $Guest_UserName= $row['UserName'];
  ?>
	
<input type="text" name="username" placeholder="Enter Username" value="<?php echo $Guest_UserName; ?>" required/>
<?php } ?>
</div>

<div>
<label> Password: </label>
<input type="password" name="password" placeholder="Enter New Password" required/>
</div>

<div>
<label> Confirm Password: </label>
<input type="password" name="confirm_password" placeholder="Re-Enter New Password" required/>
</div>


</div>



<div  class="part2">


<div class="margin_top7">
</div>

<div>
<label> Occupation: </label>
<?php

 $guest_info = $conn->query("SELECT *FROM user_account_guest WHERE IDNumber = $guest_id");
 while ($row=$guest_info->fetch()) {
	 $Guest_Occupation = $row['Occupation'];
	?>
	
<input type="text" name="occupation" placeholder="Enter Occupation" value="<?php echo $Guest_Occupation;?>" required/>

<?php } ?>
</div>

<div>
<p class="formfield">
<label> Reason: </label>

<?php

 $guest_info = $conn->query("SELECT *FROM user_account_guest WHERE IDNumber = $guest_id");
 while ($row=$guest_info->fetch()) {
	 $Guest_Reason = $row['Reason'];
	?>
	
<textarea class="reason" type="text" name="reason" placeholder="Enter Reason"   cols="40" rows="12" ><?php echo $Guest_Reason; ?></textarea>
<?php } ?>
</p>
</div>




</div>

</div>

<div class="create_account_container">
<div class="create_user_account">
<button  type="submit" name ="submit">Submit</button>
</div>
</div> 
</form>





<!--FOOTER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="mainfooter" class="fotter_home">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->
</div>


<!--SCRIPTS----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "240px";
    document.getElementById("main").style.marginLeft = "240px";
	document.getElementById("mainfooter").style.marginLeft = "240px";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";

}

 function upload(){
	 
	var upload_value = document.getElementById('upload_value');

	if(document.getElementById("upload_value").value != ""){
	document.getElementById("fileuploaded").innerHTML="Photo Uploaded";
	document.getElementById("fileuploaded").style.color="#56B855";

	

	}

}
</script>
</body>
</html>