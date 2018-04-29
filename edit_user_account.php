<!DOCTYPE html>


<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_admin_username']))
			{
				header('location:index_admin.php');
			}
			
		$Admin_Username=$_SESSION['cns_admin_username'];

?>

<?php

	if(isset($_GET['edit_user_account'])){
		
		$user_id = $_GET['edit_user_account'];
		
	
		
	
		global $edit1_user_account;
		$edit1_user_account = 0;
		if(isset($_POST['submit'])){
			
		$edit1_user_account=1;
		
		
							$username         = $_POST['username'];
							$password         = md5($_POST['password']);
							$confirm_password =  md5($_POST['confirm_password']);
							
							$show_accounts = $conn->query("SELECT *FROM user_account WHERE UserName ='$username'");
							
							while($row=$show_accounts->fetch()){
								
							}
							
							if($show_accounts->rowCount() > 0 ) {
								
								echo '<script >';
								echo 'alert("Username Already Taken.")';
								echo '</script>';
								
								
								
								echo '<script >';
								echo 'alert("Upload Again the Photo.")';
								echo '</script>';
								
								
								
								 
							}
							
							
							else if($password != $confirm_password) 
							{
								echo '<script>';
								echo 'alert("Password and Confirm Password did not match.")';
								
								echo '</script>';
								
								echo '<script >';
								
								echo 'alert("Upload Again the Photo.")';
				
								
								echo '</script>';

							}
							else {
								
															
							// FOLDER FOR THE IMAGES						
							$folder ="user_photo/"; 
							
							//GET THE FILE NAME
							$profile_photo = $_FILES['profile_photo']['name']; 
							
							//DECLARE THE PATH OF THE PHOTO
							$path = $folder . $profile_photo ; 
							
							// GET THE NAME OF THE PHOTO
							$target_file=$folder.basename($_FILES["profile_photo"]["name"]);

							//GET THE FILE EXTENSION OF THE PHOTO							 
							$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

							//ALLOWED EXTENSION OF THE PHOTO					 
							$allowed=array('jpeg','png' ,'jpg'); 
							
							//THE FILENAME OF THE PHOTO
							$filename=$_FILES['profile_photo']['name']; 
							
							//GET THE FILE EXTENSION OF THE PHOTO
							$ext=pathinfo($filename, PATHINFO_EXTENSION);
							
							//IF THE EXTENSION IS NOT ALLOWED ECHO THE SCRIPT
							if(!in_array($ext,$allowed) ) 

							{ 
							
								echo '<script>';
								echo 'alert("Sorry, only JPG, JPEG, PNG & GIF  files are allowed.")';
								echo '</script>';

						

							}
							// IF THE PHOTO EXTENSION IS ALLOWED UPLOAD THE FILE TO THE PATH
							
							else{ 

								
							// UPLOAD THE FILE
							move_uploaded_file( $_FILES['profile_photo'] ['tmp_name'], $path); 

															

							
						

							//UPLOAD THE DATA INTO THE DATABASE
							$first_name       = $_POST['first_name'];
							$middle_name      = $_POST['middle_name'];
							$last_name        = $_POST['last_name'];
							$username         = $_POST['username'];
							$birth_month      =	$_POST['birth_month'];
							$birth_date       = $_POST['birth_date'];
							$birth_year       = $_POST['birth_year'];
							$age              = $_POST['age'];
							$birth_place      = $_POST['birth_place'];
							$position         = $_POST['position'];
							$work_place       = $_POST['work_place'];
							
							//INSERT THE DATA FROM FROM TO DATABASE
							$update_user = $conn->query("UPDATE user_account SET ProfilePhoto='$profile_photo' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET FirstName='$first_name' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET MiddleName='$middle_name' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET LastName='$last_name' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET UserName='$username' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET Password='$password' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET ConfirmPassword='$confirm_password' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET BirthMonth='$birth_month' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET BirthDate='$birth_date' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET BirthYear='$birth_year' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET Age='$age' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET Position='$position' WHERE IDNumber = $user_id");
							$update_user = $conn->query("UPDATE user_account SET WorkPlace='$work_place' WHERE IDNumber = $user_id");
							
							
							
							
							
							
							
							//ECHO THAT THE USER IS CREATED
							
							//UNSET THE POST
							unset($_POST['first_name']);
							unset($_POST['middle_name']);
							unset($_POST['last_name']);
							unset($_POST['username']);
							unset($_POST['password']);
							unset($_POST['confirm_password']);
							unset($_POST['birth_month']);
							unset($_POST['birth_date']);
							unset($_POST['birth_year']);
							unset($_POST['age']);
							unset($_POST['birth_place']);
							unset($_POST['position']);
							unset($_POST['work_place']);
						
							
							header('Location: list_of_accounts.php?success=1');
							
							
						
		}
		
		}
		}
		
	}
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
	<title>Edit User Account</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>

<style>

@media only screen and (max-width:800px) {



body {
	
	overflow-x:hidden;
	
}
}



</style>
</head>
<!--HEAD ENDS HERE-->	

<body>
<!--SIDENAV-->
<div  id="mySidenav" class="sidenav">

<div class="profile">
	<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT * FROM admin_account WHERE Username='$Admin_Username'");
			
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

<div class="cp_sidenav_responsive">
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
 <a href="about_admin.php">
 <i class="fa fa-book fa-lg"></i><span>About</span>
 </a>
 </li>
 
 <li>
 <a href="create_user_account.php">
 <i class="fa fa-plus fa-lg"></i><span >Create User Account</span>
 </a>
 </li>
 
 <li>
 <a href="list_of_accounts.php">
 <i class="fa fa-list-ol fa-lg"></i><span class="active">List of Accounts</span>
 </a>
 </li>
 
 <li>
 <a href="update_admin_account.php">
 <i  class="fa fa-pencil-square-o fa-lg"></i><span>Update Admin Account</span>
 </a>
 </li>
 <li>
 <a href="create_announcement.php">
 <i  class="fa fa-exclamation fa-lg"></i><span>Announcements</span>
 </a>
 </li>
 
</ul>
</div>
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
	$show_accounts = $conn->query("SELECT *FROM admin_account WHERE UserName='$Admin_Username'");
	
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

<div class="cp_responsive">
<!--CREATE USER ACCOUNT HEADER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="create_account_container">
<div class="create_header">Edit User Account</div>
</div>


<!--CREATE USER ACCOUNT FORM----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="responsive">
<div class="create_account">


<form action="#" method="POST" enctype="multipart/form-data">

<div class="part1">


<div >
<label>Update Photo:</label>

<label class="uploadbutton">
    <input id="upload_value" onchange="upload()" type="file" name="profile_photo"  required />
    <span  id="fileuploaded">Update Photo</span>
</label>

</div>

<div>
<label>First Name:</label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber =$user_id");
while ($row=$user_info->fetch()){
	$User_FirstName = $row['FirstName'];
?>
<input type="text" name="first_name" placeholder="Enter First Name" value = "<?php echo isset($_POST["first_name"]) ?  $_POST['first_name']: $User_FirstName;  ?>" required/>'
<?php } ?>
</div> 
 
<div>
<label> Middle Name: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_MiddleName = $row['MiddleName'];
	?>
<input type="text" name="middle_name" placeholder="Enter Middle Name" value = "<?php echo isset($_POST["middle_name"]) ?  $_POST['middle_name']: $User_MiddleName;  ?>" required/>
<?php } ?>
</div>


<div>
<label> Last Name: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_LastName = $row['LastName'];
	?>
<input type="text" name="last_name" placeholder="Enter Last Name" value = "<?php echo isset($_POST["last_name"]) ?  $_POST['last_name']: $User_LastName;  ?>" required/>
<?php } ?>
</div>

<div>
<label> Username: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_Username = $row['UserName'];
	?>
<input type="text" name="username" placeholder="Enter Username" value = "<?php echo isset($_POST["username"]) ?  $_POST['username']: $User_Username;  ?>" required/>
<?php } ?>
</div>

<div>
<label> Password: </label>
<input type="password" name="password" placeholder="Enter New Password" value = "<?php echo isset($_POST["password"]) ?  $_POST['password']: '';  ?>" required/>
</div>

<div>
<label> Confirm Password: </label>
<input type="password" name="confirm_password" placeholder="Re-Enter New Password" value = "<?php echo isset($_POST["confirm_password"]) ?  $_POST['confirm_password']: '';  ?>"  required/>
</div>


</div>




<div class="part2">
<div>
<label> Birth Date: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_BirthMonth = $row['BirthMonth'];
	?>
<select  name="birth_month" >
									<option value="birth_month" ><?php echo  $User_BirthMonth  ?></option>
<?php } ?>
									
                                    <option name="birth_month"  value="January">January</option>
                                    <option name="birth_month"  value="February">February</option>
									<option name="birth_month"  value="March">March</option>
									<option name="birth_month"  value="April">April</option>
                                    <option name="birth_month"  value="May">May</option>
                                    <option name="birth_month"  value="June">June</option>
									<option name="birth_month"  value="July">July</option>
									<option name="birth_month"  value="August">August</option>
                                    <option name="birth_month"  value="September">September</option>
                                    <option name="birth_month"  value="October">October</option>
									<option name="birth_month"  value="November">November</option>
									<option name="birth_month"  value="December">December</option>
 </select required>
</div>


<div>
<label></label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_BirthDate = $row['BirthDate'];
	?>
<input type="text" name="birth_date" placeholder="Enter Date" value = "<?php echo isset($_POST["birth_date"]) ?  $_POST['birth_date']: $User_BirthDate;  ?>" required/>
<?php } ?>
</div>

<div>
<label></label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_BirthYear= $row['BirthYear'];
	?>
<input type="text" name="birth_year" placeholder="Enter Year" value = "<?php echo isset($_POST["birth_year"]) ?  $_POST['birth_year']: $User_BirthYear;  ?>" required/>
 <?php } ?>
</div>

<div>
<label> Age: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_Age= $row['Age'];
	?>
<input type="text" name="age" placeholder="Enter Age" value = "<?php echo isset($_POST["age"]) ?  $_POST['age']: $User_Age;  ?>" required/>
<?php } ?>
</div>

<div>
<label> Birth Place: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_BirthPlace = $row['BirthPlace'];
	?>
<input type="text" name="birth_place" placeholder="Enter Birth Place" value = "<?php echo isset($_POST["birth_place"]) ?  $_POST['birth_place']: $User_BirthPlace;  ?>" required/>
<?php } ?>
</div>

<div>
<label> Position: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_Position = $row['Position'];
	?>

<select  name="position">
									<option value="position" ><?php echo $User_Position; ?></option>
 <?php } ?>
                                    <option name="gender" value="position">position</option>
                                    <option name="gender" value="position">position</option>
									<option name="gender" value="position">position</option>
									<option name="gender" value="position">position</option>
									
                                   
</select required>
</div>

<div>
<label> Work Place: </label>
<?php $user_info = $conn->query("SELECT *FROM user_account WHERE IDNumber = $user_id");
 while ($row=$user_info->fetch()) {
	 $User_WorkPlace = $row['WorkPlace'];
	?>
<select  name="work_place" >
									<option value="work_place" ><?php echo $User_WorkPlace;?> </option>
									
<?php } ?>									
                                    <option name="gender"  value="work_place">work_place</option>
                                    <option name="gender" value="work_place">work_place</option>
									<option name="gender" value="work_place">work_place</option>
									<option name="gender" value="work_place">work_place</option>
									
                                   
</select required>
</div>
 
</div>

</div>

<div class="create_account_container">
<div class="create_user_account">
<button  type="submit" name ="submit">Submit</button>
</div>
</div> 
</form>

</div>
</div>




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
	document.getElementById("fileuploaded").innerHTML="Photo Updated";
	document.getElementById("fileuploaded").style.color="#56B855";

	

	}
	


}

<!--


/*
 
 var viewportwidth;
 var viewportheight;
  
 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  
 if (typeof window.innerWidth != 'undefined')
 {
      viewportwidth = window.innerWidth,
      viewportheight = window.innerHeight
 }
  
// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
 
 else if (typeof document.documentElement != 'undefined'
     && typeof document.documentElement.clientWidth !=
     'undefined' && document.documentElement.clientWidth != 0)
 {
       viewportwidth = document.documentElement.clientWidth,
       viewportheight = document.documentElement.clientHeight
 }
  
 // older versions of IE
  
 else
 {
       viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
       viewportheight = document.getElementsByTagName('body')[0].clientHeight
 }


//-->


	var viewportwidth_min = 400;
	var viewportwidth_max = 800;
 
 
  var viewportheight_min = 400 ;
  var viewportheight_max = 800;
  
  
  if( viewportwidth_min <=  viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {
	  
	  
	  
	function openNav() {
    document.getElementById("mySidenav").style.width = "800px";
    document.getElementById("main").style.marginLeft = "800px";
	document.getElementById("mainfooter").style.marginLeft = "800px";
	

    document.getElementById("main").style.display = "none";
	document.getElementById("mainfooter").style.display = "none";
	
	  

	}
	
	function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";
	
	document.getElementById("main").style.display = "block";
	document.getElementById("mainfooter").style.display = "block";
	
}


}

*/

 var viewportwidth;
 var viewportheight;
  
 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  
 if (typeof window.innerWidth != 'undefined')
 {
      viewportwidth = window.innerWidth,
      viewportheight = window.innerHeight
 }
  
// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
 
 else if (typeof document.documentElement != 'undefined'
     && typeof document.documentElement.clientWidth !=
     'undefined' && document.documentElement.clientWidth != 0)
 {
       viewportwidth = document.documentElement.clientWidth,
       viewportheight = document.documentElement.clientHeight
 }
  
 // older versions of IE
  
 else
 {
       viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
       viewportheight = document.getElementsByTagName('body')[0].clientHeight
 }

 
  /*document.write(viewportwidth + ' ' + viewportheight);*/

	var viewportwidth_min = 300;
	var viewportwidth_max = 500;
 
 
  var viewportheight_min = 300 ;
  var viewportheight_max = 700;

  if( viewportwidth_min <=  viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {
	  
	  
	  
	function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
    document.getElementById("main").style.marginLeft = "400px";
	document.getElementById("mainfooter").style.marginLeft = "400px";
	
	

    document.getElementById("main").style.display = "none";
	document.getElementById("mainfooter").style.display = "none";
	
	  

	}
	
	function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";
	
	document.getElementById("main").style.display = "block";
	document.getElementById("mainfooter").style.display = "block";

}


}  



</script>
</body>
</html>