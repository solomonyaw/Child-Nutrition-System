<!DOCTYPE html>
<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_admin_username']))
			{
				header('location:index_admin.php');
			}
			
			
	$Admin_Username = $_SESSION['cns_admin_username'];
	

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
	<title>Admin</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>
</head>
<!--HEAD ENDS HERE-->	

<body>
<!--SIDENAV-->

<div  id="mySidenav" class="sidenav">

<div class="profile">
		<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT * FROM admin_account WHERE UserName= '$Admin_Username'");
			
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
<div>
<ul class="sidenavmenus">


 <li class="active">
 <a href="home_admin.php">
 <i  class="fa fa-home fa-lg active"></i><span class="active">Home</span>
 </a>
 </li>
 
 <li >
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
 <i class="fa fa-plus fa-lg"></i><span>Create User Account</span>
 </a>
 </li>
 
 <li>
 <a href="list_of_accounts.php">
 <i class="fa fa-list-ol fa-lg"></i><span>List of Accounts</span>
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
</div>
<!--SIDENAV ENDS HERE-->



<!--CONTENT-->
<div id="main">


<!--TOPBAR-->
<div  class="topbar">
	
	<!--SIDENAV BUTTON & LOGO-->
	<div class="sidenav_button_logo">
		<a href="#" onclick="openNav()"><span class="fa fa-bars fa-lg"></span></a><img src="Images/small_CNSLogowhite.png">
	</div>
	<!--SIDENAV BUTTON & LOGO ENDS HERE-->
 
	
	<div class="topbar_welcome_logout">
	<?php
	
	//QUERY THE DATAS FROM THE admin_account table
	$show_accounts = $conn->query("SELECT *FROM admin_account WHERE UserName= '$Admin_Username'");
	
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
	<img src="admin_photo/<?php echo $image_name;?>">
	
			<?php }
			?>
	</div>

</div>
<!-- TOPBAR ENDS HERE -->

<div class="dashboard_title">

</div>
<div class="dashboard_body" >


	
	
	
	
	
		<div class="number_of_boys_per_purok1" >
			<h2>Number of Registered User</h2>
				
				<?php
				
	
	$male = "Male";
	$Purok1 ="Purok 1";
	$Purok2 ="Purok 2";
	$Purok3 ="Purok 3";
	$Purok4 ="Purok 4";
	$Purok5 ="Purok 5";
	$Purok6 ="Purok 6";
	
	
	$Purok1_boys_total = $conn->query("SELECT * FROM user_account");
	$count_Purok1_boys_total = $Purok1_boys_total -> rowCount();

	
	
	
	
	?>
	
	
	<h1><?php echo $count_Purok1_boys_total; ?></h1>
	
	
		
			
		</div>
		

	
	
	
	

	
</div>


<!--FOOTER-->
<div id="mainfooter" class="fotter_home">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->
</div>

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
	var viewportwidth_max = 700;
 
 
  var viewportheight_min = 400 ;
  var viewportheight_max = 700;
  
  
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