<!DOCTYPE html>

<!--CONNECT TO DATABASE-->
<?php

include 'connect_to_database.php';

session_start();









if(isset($_GET['update_admin_sucess'])){
	
							echo '<script>';
							echo 'alert("Admin Account Succesfully Updated.")';
							echo '</script>';
							
							
							echo '<script>';
							echo 'alert("Pleast Login New Updated Account.")';
							echo '</script>';
	
}
?>
<!-- -->


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
	<title>Admin Login</title>
	<!--TITLE ENDS HERE-->
	
<head>
<style>

body{
	
	overflow:hidden;
	overflow-y:auto;
	background-color:#009933;

}
	
	
</style>

</head>
<body >

<?php

//for session logs
			if(isset($_SESSION['cns_admin_username']))
			{
				header('location:home_admin.php');
			}

			
		if (isset($_POST['submit'])){
					$Username = $_POST['Username'];
					$Password= $_POST['Password'];
					
					$cns_db = $conn->query("SELECT * FROM admin_account WHERE UserName='$Username' and Password='$Password'");
					
					$row = $cns_db->fetch();
					
					
					if(($Username==$row['UserName'])&& ($Password==$row['Password'])){
									
										$_SESSION['cns_admin_username'] = $row['UserName'];
										header('location:home_admin.php');
										
					}
					
					else if(($Username==$row['Username']) && ($Password==$row['Password'])&& ($row['UserName']!= $Username) && ($row['UserName']!=$Password) ){
						
		
						$_SESSION['cnms_admin_username'] = $row['username'];

						header('location: index_admin.php');
					}else{
						echo '<script>';
						echo	'alert("Incorrect Username or Password!")';		
						echo '</script>';
					}		
		}
									

?>


<!-- HEADER LOGO-->
<header>
<div class="logo">
<a href="index_admin.php"><img src="Images/cnms_logo.jpg"> </a>


<div class="log_in_responsive">
<a  href="home_guest.php">Login as Guest</a>
</div>
</div>
</header>
<!-- HEADER ENDS HERE LOGO-->



<!--LOGIN FORM-->
<form method="POST" action="">
<div class="login-page">
<div class="form">

<i class="fa fa-wrench fa-4x"></i>
<h2>Admin Panel</h2>

<span class="fa fa-wrench fa-lg">	</span>
<input type="text" placeholder="Username" name="Username"/>


<span class="fa fa-key fa-lg">	</span>
<input type="password" placeholder="Password" name="Password"/>


<button name="submit"  type="submit" >Login</button>
<div class="click_responsive">
<a href="index.php"><b>Click to go User Panel</b></a>
</div>
</div>

</div>
</form>
<!--LOGIN FORM ENDS HERE-->


<!--FOOTER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="mainfooter" class="fotter_index">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->

</body>
</html>