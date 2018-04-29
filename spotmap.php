<!DOCTYPE html>
<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_user_username']))
			{
				header('location:index.php');
			}
			
			
	$User_Username = $_SESSION['cns_user_username'];
	

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
	<link href="local_stylesheet/style_user.css" rel="stylesheet">
	<link href="fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--CSS LINKS ENDS HERE-->
	
	<!--TITLE-->
	<title>Spot Map</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>



<style>

body {
	
	
background-color:white;	

}

</style>
</head>
<!--HEAD ENDS HERE-->	

<body>

<!--SIDENAV-->
<div id="mySidenav" class="user_sidenav">

<div class="user_profile">

<?php
	
	//QUERY THE DATAS FROM THE user_account table
	$show_account = $conn->query("SELECT *FROM user_account WHERE UserName = '$User_Username'");
	
	//FETCH THE DATAS FROM user_account table
	while($row=$show_account->fetch()){
		
		//SET the value of $image_name to ProfilePhoto
		$image_name = $row['ProfilePhoto'];
		
		//SET the value of $user_first_name to FirstName
		$user_first_name = $row['FirstName'];
		
		//SET the value of $user_position to Position
		$user_position = $row['Position'];
		
	}
		
		?>
		

	<img src="user_photo/<?php echo $image_name ?> ">
	<p><?php echo $user_first_name?></p>
	<span><?php echo $user_position ?></span>	
	
	

</div>

<div class="user_menu">

<ul>

<li><i class="active_hover"></i><span  class="fa fa-home "></span> <a href="home.php">Home </a></li>
<li><span  class="fa fa-book "></span> <a href="#">About </a></li>
<li><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li><span  class="fa fa-exclamation"></span> <a href="announcement.php">Announcement</a></li>
<li><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
<li><span  class="fa  fa-table "></span> <a href="child_information_table.php">Table</a></li>
<li class="active"><span  class="fa fa-map-marker "></span> <a href="spotmap.php">Spot Map </a></li>
<li><span  class="fa fa-pie-chart "></span> <a href="chart.php">Chart </a></li>
<li><span  class="fas fa-file-pdf"></span> <a href="test.php" target="_blank">Table (PDF)</a></li>

</ul>
</div>


<div class="user_removesidenav">
<a onclick="closeNav()"><span class="fa fa-eye-slash" ></span>Hide Sidebar</a>
</div>
</div>

<div id="main">

<div class="user_topbar">
	
	<!-- TOPBAR MENU AND IMAGE -->
	<div class="topbar_menu_logo">
	<a href="#" onclick="openNav()"> <span class="fa fa-bars fa-lg"></span></a><img src="Images/small_CNSLogowhite.png">
	</div>
	
	<!--TOP BAR USER NAME-->
	<div class="topbar_menu_user_name">
<?php 
    $show_account = $conn->query("SELECT *FROM user_account WHERE UserName = '$User_Username'");
	
	while($row=$show_account->fetch()){
		
		$image_name = $row['ProfilePhoto'];
		
		$user_first_name = $row['FirstName'];
	}
	
	?>
	
	<a href="logout_account.php"><span class=" fa fa-power-off"></span></a>
	<a href="user_profile.php"><?php echo $user_first_name ?></a>
	<img src="user_photo/<?php echo $image_name ?>">


	
	</div>
	

	
	
</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->



<div class="spotmap_container">

<div class="chart_header_1">
<div class="chart_header">Spot Map (Centro Oriental)</div>
</div>

<div class="spotmap_content">

<div class="purok_1"> 

<div id="purok_1_severely_stunted" onmouseover="purok_1_SS_content_in(this)" onmouseout="purok_1_SS_content_out(this)" class="purok_1_severely_stunted">SS</div>
<div id="purok_1_stunted" onmouseover="purok_1_S_content_in(this)" onmouseout="purok_1_S_content_out(this)" class="purok_1_stunted">S</div>
<div id="purok_1_normal_h" onmouseover="purok_1_NH_content_in(this)" onmouseout="purok_1_NH_content_out(this)" class="purok_1_normal_h">NH</div>
<div id="purok_1_tall" onmouseover="purok_1_T_content_in(this)" onmouseout="purok_1_T_content_out(this)" class="purok_1_tall">T</div>


<div id="purok_1_severely_underweight" onmouseover="purok_1_SU_content_in(this)" onmouseout="purok_1_SU_content_out(this)" class="purok_1_severely_underweight">SU</div>
<div id="purok_1_underweight" onmouseover="purok_1_U_content_in(this)" onmouseout="purok_1_U_content_out(this)" class="purok_1_underweight">U</div>
<div id="purok_1_normal_w" onmouseover="purok_1_NW_content_in(this)" onmouseout="purok_1_NW_content_out(this)" class="purok_1_normal_w">NW</div>
<div id="purok_1_overweight" onmouseover="purok_1_O_content_in(this)" onmouseout="purok_1_O_content_out(this)" class="purok_1_overweight">O</div>

<div id="purok_1_data" class="purok_1_data">

<center><h3 id="purok_1_status">Title</h3></center>
<center><p id ="purok_1_data_content">100</p></center>

</div>



<div id="purok_1_data2" class="purok_1_data2">

<center><h3 id="purok_1_status2">Title</h3></center>
<center><p id ="purok_1_data_content2">100</p></center>

</div>

<?php 



$Purok_1 = "Purok 1";
$Purok_2 = "Purok 2";
$Purok_3 = "Purok 3";
$Purok_4 = "Purok 4";
$Purok_5 = "Purok 5";
$Purok_6 = "Purok 6";


$Severely_Stunted_1 = "Severely Stunted";
$Stunted_1 = "Stunted";
$Normal_Height_1 = "Normal";
$Tall_1 = "Tall";


$Severely_Underweight_1 = "Severely Underweight";
$Underweight_1 = "Underweight";
$Normal_Weight_1 = "Normal";
$Overweight_1 = "Overweight";



$Purok_1_Severely_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Height_Status LIKE '%".$Severely_Stunted_1."%'");
$Purok_1_Severely_Stunted_total_content_total = $Purok_1_Severely_Stunted_total_content -> rowCount();

$Purok_1_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Height_Status LIKE '%".$Stunted_1."%'");
$Purok_1_Stunted_total_content_total = $Purok_1_Stunted_total_content -> rowCount();

$Purok_1_Normal_Height_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Height_Status LIKE '%".$Normal_Height_1."%'");
$Purok_1_Normal_Height_total_content_total = $Purok_1_Normal_Height_total_content -> rowCount();

$Purok_1_Tall_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Height_Status LIKE '%".$Tall_1."%'");
$Purok_1_Tall_total_content_total = $Purok_1_Tall_total_content -> rowCount();


///////////////////////////////////////////////

$Purok_1_Severely_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Weight_Status LIKE '%".$Severely_Underweight_1."%'");
$Purok_1_Severely_Underweight_total_content_total = $Purok_1_Severely_Underweight_total_content -> rowCount();

$Purok_1_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Weight_Status LIKE '%".$Underweight_1."%'");
$Purok_1_Underweight_total_content_total = $Purok_1_Underweight_total_content -> rowCount();

$Purok_1_Normal_Weight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Weight_Status LIKE '%".$Normal_Weight_1."%'");
$Purok_1_Normal_Weight_total_content_total = $Purok_1_Normal_Weight_total_content -> rowCount();

$Purok_1_Overweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_1."%' AND Weight_Status LIKE '%".$Overweight_1."%'");
$Purok_1_Overweight_total_content_total = $Purok_1_Overweight_total_content -> rowCount();


$Severely_Stunted_2 = "Severely Stunted";
$Stunted_2 = "Stunted";
$Normal_Height_2 = "Normal";
$Tall_2 = "Tall";


$Severely_Underweight_2 = "Severely Underweight";
$Underweight_2 = "Underweight";
$Normal_Weight_2 = "Normal";
$Overweight_2 = "Overweight";



$Purok_2_Severely_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Height_Status LIKE '%".$Severely_Stunted_2."%'");
$Purok_2_Severely_Stunted_total_content_total = $Purok_2_Severely_Stunted_total_content -> rowCount();

$Purok_2_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Height_Status LIKE '%".$Stunted_2."%'");
$Purok_2_Stunted_total_content_total = $Purok_2_Stunted_total_content -> rowCount();

$Purok_2_Normal_Height_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Height_Status LIKE '%".$Normal_Height_2."%'");
$Purok_2_Normal_Height_total_content_total = $Purok_2_Normal_Height_total_content -> rowCount();

$Purok_2_Tall_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Height_Status LIKE '%".$Tall_2."%'");
$Purok_2_Tall_total_content_total = $Purok_2_Tall_total_content -> rowCount();


///////////////////////////////////////////////

$Purok_2_Severely_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Weight_Status LIKE '%".$Severely_Underweight_2."%'");
$Purok_2_Severely_Underweight_total_content_total = $Purok_2_Severely_Underweight_total_content -> rowCount();

$Purok_2_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Weight_Status LIKE '%".$Underweight_2."%'");
$Purok_2_Underweight_total_content_total = $Purok_2_Underweight_total_content -> rowCount();

$Purok_2_Normal_Weight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Weight_Status LIKE '%".$Normal_Weight_2."%'");
$Purok_2_Normal_Weight_total_content_total = $Purok_2_Normal_Weight_total_content -> rowCount();

$Purok_2_Overweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_2."%' AND Weight_Status LIKE '%".$Overweight_2."%'");
$Purok_2_Overweight_total_content_total = $Purok_2_Overweight_total_content -> rowCount();


$Severely_Stunted_3 = "Severely Stunted";
$Stunted_3 = "Stunted";
$Normal_Height_3 = "Normal";
$Tall_3 = "Tall";


$Severely_Underweight_3 = "Severely Underweight";
$Underweight_3 = "Underweight";
$Normal_Weight_3 = "Normal";
$Overweight_3 = "Overweight";



$Purok_3_Severely_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Height_Status LIKE '%".$Severely_Stunted_3."%'");
$Purok_3_Severely_Stunted_total_content_total = $Purok_3_Severely_Stunted_total_content -> rowCount();

$Purok_3_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Height_Status LIKE '%".$Stunted_3."%'");
$Purok_3_Stunted_total_content_total = $Purok_3_Stunted_total_content -> rowCount();

$Purok_3_Normal_Height_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Height_Status LIKE '%".$Normal_Height_3."%'");
$Purok_3_Normal_Height_total_content_total = $Purok_3_Normal_Height_total_content -> rowCount();

$Purok_3_Tall_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Height_Status LIKE '%".$Tall_3."%'");
$Purok_3_Tall_total_content_total = $Purok_3_Tall_total_content -> rowCount();


///////////////////////////////////////////////

$Purok_3_Severely_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Weight_Status LIKE '%".$Severely_Underweight_3."%'");
$Purok_3_Severely_Underweight_total_content_total = $Purok_3_Severely_Underweight_total_content -> rowCount();

$Purok_3_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Weight_Status LIKE '%".$Underweight_3."%'");
$Purok_3_Underweight_total_content_total = $Purok_3_Underweight_total_content -> rowCount();

$Purok_3_Normal_Weight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Weight_Status LIKE '%".$Normal_Weight_3."%'");
$Purok_3_Normal_Weight_total_content_total = $Purok_3_Normal_Weight_total_content -> rowCount();

$Purok_3_Overweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_3."%' AND Weight_Status LIKE '%".$Overweight_3."%'");
$Purok_3_Overweight_total_content_total = $Purok_3_Overweight_total_content -> rowCount();



$Severely_Stunted_4 = "Severely Stunted";
$Stunted_4 = "Stunted";
$Normal_Height_4 = "Normal";
$Tall_4 = "Tall";


$Severely_Underweight_4 = "Severely Underweight";
$Underweight_4 = "Underweight";
$Normal_Weight_4 = "Normal";
$Overweight_4 = "Overweight";



$Purok_4_Severely_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Height_Status LIKE '%".$Severely_Stunted_4."%'");
$Purok_4_Severely_Stunted_total_content_total = $Purok_4_Severely_Stunted_total_content -> rowCount();

$Purok_4_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Height_Status LIKE '%".$Stunted_4."%'");
$Purok_4_Stunted_total_content_total = $Purok_4_Stunted_total_content -> rowCount();

$Purok_4_Normal_Height_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Height_Status LIKE '%".$Normal_Height_4."%'");
$Purok_4_Normal_Height_total_content_total = $Purok_4_Normal_Height_total_content -> rowCount();

$Purok_4_Tall_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Height_Status LIKE '%".$Tall_4."%'");
$Purok_4_Tall_total_content_total = $Purok_4_Tall_total_content -> rowCount();


///////////////////////////////////////////////

$Purok_4_Severely_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Weight_Status LIKE '%".$Severely_Underweight_4."%'");
$Purok_4_Severely_Underweight_total_content_total = $Purok_4_Severely_Underweight_total_content -> rowCount();

$Purok_4_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Weight_Status LIKE '%".$Underweight_4."%'");
$Purok_4_Underweight_total_content_total = $Purok_4_Underweight_total_content -> rowCount();

$Purok_4_Normal_Weight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Weight_Status LIKE '%".$Normal_Weight_4."%'");
$Purok_4_Normal_Weight_total_content_total = $Purok_4_Normal_Weight_total_content -> rowCount();

$Purok_4_Overweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_4."%' AND Weight_Status LIKE '%".$Overweight_4."%'");
$Purok_4_Overweight_total_content_total = $Purok_4_Overweight_total_content -> rowCount();

$Severely_Stunted_5 = "Severely Stunted";
$Stunted_5 = "Stunted";
$Normal_Height_5 = "Normal";
$Tall_5 = "Tall";


$Severely_Underweight_5 = "Severely Underweight";
$Underweight_5 = "Underweight";
$Normal_Weight_5 = "Normal";
$Overweight_5 = "Overweight";



$Purok_5_Severely_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Height_Status LIKE '%".$Severely_Stunted_5."%'");
$Purok_5_Severely_Stunted_total_content_total = $Purok_5_Severely_Stunted_total_content -> rowCount();

$Purok_5_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Height_Status LIKE '%".$Stunted_5."%'");
$Purok_5_Stunted_total_content_total = $Purok_5_Stunted_total_content -> rowCount();

$Purok_5_Normal_Height_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Height_Status LIKE '%".$Normal_Height_5."%'");
$Purok_5_Normal_Height_total_content_total = $Purok_5_Normal_Height_total_content -> rowCount();

$Purok_5_Tall_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Height_Status LIKE '%".$Tall_5."%'");
$Purok_5_Tall_total_content_total = $Purok_5_Tall_total_content -> rowCount();


///////////////////////////////////////////////

$Purok_5_Severely_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Weight_Status LIKE '%".$Severely_Underweight_5."%'");
$Purok_5_Severely_Underweight_total_content_total = $Purok_5_Severely_Underweight_total_content -> rowCount();

$Purok_5_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Weight_Status LIKE '%".$Underweight_5."%'");
$Purok_5_Underweight_total_content_total = $Purok_5_Underweight_total_content -> rowCount();

$Purok_5_Normal_Weight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Weight_Status LIKE '%".$Normal_Weight_5."%'");
$Purok_5_Normal_Weight_total_content_total = $Purok_5_Normal_Weight_total_content -> rowCount();

$Purok_5_Overweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_5."%' AND Weight_Status LIKE '%".$Overweight_5."%'");
$Purok_5_Overweight_total_content_total = $Purok_5_Overweight_total_content -> rowCount();

$Severely_Stunted_6 = "Severely Stunted";
$Stunted_6 = "Stunted";
$Normal_Height_6 = "Normal";
$Tall_6 = "Tall";


$Severely_Underweight_6 = "Severely Underweight";
$Underweight_6 = "Underweight";
$Normal_Weight_6 = "Normal";
$Overweight_6 = "Overweight";



$Purok_6_Severely_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Height_Status LIKE '%".$Severely_Stunted_6."%'");
$Purok_6_Severely_Stunted_total_content_total = $Purok_6_Severely_Stunted_total_content -> rowCount();

$Purok_6_Stunted_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Height_Status LIKE '%".$Stunted_6."%'");
$Purok_6_Stunted_total_content_total = $Purok_6_Stunted_total_content -> rowCount();

$Purok_6_Normal_Height_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Height_Status LIKE '%".$Normal_Height_6."%'");
$Purok_6_Normal_Height_total_content_total = $Purok_6_Normal_Height_total_content -> rowCount();

$Purok_6_Tall_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Height_Status LIKE '%".$Tall_6."%'");
$Purok_6_Tall_total_content_total = $Purok_6_Tall_total_content -> rowCount();


///////////////////////////////////////////////

$Purok_6_Severely_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Weight_Status LIKE '%".$Severely_Underweight_6."%'");
$Purok_6_Severely_Underweight_total_content_total = $Purok_6_Severely_Underweight_total_content -> rowCount();

$Purok_6_Underweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Weight_Status LIKE '%".$Underweight_6."%'");
$Purok_6_Underweight_total_content_total = $Purok_6_Underweight_total_content -> rowCount();

$Purok_6_Normal_Weight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Weight_Status LIKE '%".$Normal_Weight_6."%'");
$Purok_6_Normal_Weight_total_content_total = $Purok_6_Normal_Weight_total_content -> rowCount();

$Purok_6_Overweight_total_content = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$Purok_6."%' AND Weight_Status LIKE '%".$Overweight_6."%'");
$Purok_6_Overweight_total_content_total = $Purok_6_Overweight_total_content -> rowCount();

?>


<script>

function purok_1_SS_content_in(x){


document.getElementById("purok_1_data").style.display = "block";
document.getElementById("purok_1_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_1_status").innerHTML = "Severely Stunted";
document.getElementById("purok_1_data_content").innerHTML = "<?php echo $Purok_1_Severely_Stunted_total_content_total; ?>";



}

function purok_1_SS_content_out(x){


document.getElementById("purok_1_data").style.display = "none";




}

function purok_1_S_content_in(x){


document.getElementById("purok_1_data").style.display = "block";
document.getElementById("purok_1_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_1_status").innerHTML = "Stunted";
document.getElementById("purok_1_data_content").innerHTML = "<?php echo $Purok_1_Stunted_total_content_total; ?>";



}

function purok_1_S_content_out(x){


document.getElementById("purok_1_data").style.display = "none";




}






function purok_1_NH_content_in(x){


document.getElementById("purok_1_data").style.display = "block";
document.getElementById("purok_1_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_1_status").innerHTML = "Normal Height";
document.getElementById("purok_1_data_content").innerHTML = "<?php echo $Purok_1_Normal_Height_total_content_total; ?>";



}

function purok_1_NH_content_out(x){


document.getElementById("purok_1_data").style.display = "none";




}


function purok_1_T_content_in(x){


document.getElementById("purok_1_data").style.display = "block";
document.getElementById("purok_1_data").style.backgroundColor = "#377CBD";

document.getElementById("purok_1_status").innerHTML = "Tall";
document.getElementById("purok_1_data_content").innerHTML = "<?php echo $Purok_1_Tall_total_content_total; ?>";



}

function purok_1_T_content_out(x){


document.getElementById("purok_1_data").style.display = "none";




}


/////////////////////////////

function purok_1_SU_content_in(x){


document.getElementById("purok_1_data2").style.display = "block";
document.getElementById("purok_1_data2").style.backgroundColor = "#D9544D";

document.getElementById("purok_1_status2").innerHTML = "Severely Underweight";
document.getElementById("purok_1_data_content2").innerHTML = "<?php echo $Purok_1_Severely_Underweight_total_content_total; ?>";



}

function purok_1_SU_content_out(x){


document.getElementById("purok_1_data2").style.display = "none";




}

function purok_1_U_content_in(x){


document.getElementById("purok_1_data2").style.display = "block";
document.getElementById("purok_1_data2").style.backgroundColor = "#F4A848";

document.getElementById("purok_1_status2").innerHTML = "Underweight";
document.getElementById("purok_1_data_content2").innerHTML = "<?php echo $Purok_1_Underweight_total_content_total; ?>";



}

function purok_1_U_content_out(x){


document.getElementById("purok_1_data2").style.display = "none";




}






function purok_1_NW_content_in(x){


document.getElementById("purok_1_data2").style.display = "block";
document.getElementById("purok_1_data2").style.backgroundColor = "#56BC56";

document.getElementById("purok_1_status2").innerHTML = "Normal Height";
document.getElementById("purok_1_data_content2").innerHTML = "<?php echo $Purok_1_Normal_Weight_total_content_total; ?>";



}

function purok_1_NW_content_out(x){


document.getElementById("purok_1_data2").style.display = "none";




}


function purok_1_O_content_in(x){


document.getElementById("purok_1_data2").style.display = "block";
document.getElementById("purok_1_data2").style.backgroundColor = "#377CBD";

document.getElementById("purok_1_status2").innerHTML = "Overweight";
document.getElementById("purok_1_data_content2").innerHTML = "<?php echo $Purok_1_Overweight_total_content_total; ?>";



}

function purok_1_O_content_out(x){


document.getElementById("purok_1_data2").style.display = "none";




}




</script>

</div>

<div class="purok_2"> 

<div id="purok_2_severely_stunted" onmouseover="purok_2_SS_content_in(this)" onmouseout="purok_2_SS_content_out(this)" class="purok_2_severely_stunted">SS</div>
<div id="purok_2_stunted" onmouseover="purok_2_S_content_in(this)" onmouseout="purok_2_S_content_out(this)" class="purok_2_stunted">S</div>
<div id="purok_2_normal_h" onmouseover="purok_2_NH_content_in(this)" onmouseout="purok_2_NH_content_out(this)" class="purok_2_normal_h">NH</div>
<div id="purok_2_tall" onmouseover="purok_2_T_content_in(this)" onmouseout="purok_2_T_content_out(this)" class="purok_2_tall">T</div>


<div id="purok_2_severely_underweight" onmouseover="purok_2_SU_content_in(this)" onmouseout="purok_2_SU_content_out(this)" class="purok_2_severely_underweight">SU</div>
<div id="purok_2_underweight" onmouseover="purok_2_U_content_in(this)" onmouseout="purok_2_U_content_out(this)" class="purok_2_underweight">U</div>
<div id="purok_2_normal_w" onmouseover="purok_2_NW_content_in(this)" onmouseout="purok_2_NW_content_out(this)"  class="purok_2_normal_w">NW</div>
<div id="purok_2_overweight" onmouseover="purok_2_O_content_in(this)" onmouseout="purok_2_O_content_out(this)" class="purok_2_overweight">O</div>

<div id="purok_2_h_w_data" class="purok_2_h_w_data">

<center><h3 id="purok_2_h_w_status">Title</h3></center>
<center><p id ="purok_2_h_w_data_content">100</p></center>

</div>

<script>


function purok_2_SS_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_2_h_w_status").innerHTML = "Severely Stunted";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Severely_Stunted_total_content_total; ?>";



}

function purok_2_SS_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}


function purok_2_S_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_2_h_w_status").innerHTML = "Stunted";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Stunted_total_content_total; ?>";



}

function purok_2_S_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}


function purok_2_NH_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_2_h_w_status").innerHTML = "Normal Height";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Normal_Height_total_content_total; ?>";



}

function purok_2_NH_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}


function purok_2_T_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#377CBD";

document.getElementById("purok_2_h_w_status").innerHTML = "Tall";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Tall_total_content_total; ?>";



}

function purok_2_T_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}

///////////////////////////////////////////////////

function purok_2_SU_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_2_h_w_status").innerHTML = "Severely Underweight";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Severely_Underweight_total_content_total; ?>";



}

function purok_2_SU_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}


function purok_2_U_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_2_h_w_status").innerHTML = "Underweight";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Underweight_total_content_total; ?>";



}

function purok_2_U_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}


function purok_2_NW_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_2_h_w_status").innerHTML = "Normal Weight";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Normal_Weight_total_content_total; ?>";



}

function purok_2_NW_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}


function purok_2_O_content_in(x){


document.getElementById("purok_2_h_w_data").style.display = "block";
document.getElementById("purok_2_h_w_data").style.backgroundColor = "#377CBD";

document.getElementById("purok_2_h_w_status").innerHTML = "Overweight";
document.getElementById("purok_2_h_w_data_content").innerHTML = "<?php echo $Purok_2_Overweight_total_content_total; ?>";



}

function purok_2_O_content_out(x){


document.getElementById("purok_2_h_w_data").style.display = "none";




}









</script>





</div>

<div class="purok_3"> 

<div id="purok_3_severely_stunted"  onmouseover="purok_3_SS_content_in(this)" onmouseout="purok_3_SS_content_out(this)" class="purok_3_severely_stunted">SS</div>
<div id="purok_3_stunted" onmouseover="purok_3_S_content_in(this)" onmouseout="purok_3_S_content_out(this)" class="purok_3_stunted">S</div>
<div id="purok_3_normal_h" onmouseover="purok_3_NH_content_in(this)" onmouseout="purok_3_NH_content_out(this)" class="purok_3_normal_h">NH</div>
<div id="purok_3_tall" onmouseover="purok_3_T_content_in(this)" onmouseout="purok_3_T_content_out(this)" class="purok_3_tall">T</div>


<div id="purok_3_severely_underweight" onmouseover="purok_3_SU_content_in(this)" onmouseout="purok_3_SU_content_out(this)" class="purok_3_severely_underweight">SU</div>
<div id="purok_3_underweight" onmouseover="purok_3_U_content_in(this)" onmouseout="purok_3_U_content_out(this)" class="purok_3_underweight">U</div>
<div id="purok_3_normal_w" onmouseover="purok_3_NW_content_in(this)" onmouseout="purok_3_NW_content_out(this)" class="purok_3_normal_w">NW</div>
<div id="purok_3_overweight" onmouseover="purok_3_O_content_in(this)" onmouseout="purok_3_O_content_out(this)" class="purok_3_overweight">O</div>

<div id="purok_3_h_w_data" class="purok_3_h_w_data">

<center><h3 id="purok_3_h_w_status">Title</h3></center>
<center><p id ="purok_3_h_w_data_content">100</p></center>

</div>

<script>


function purok_3_SS_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_3_h_w_status").innerHTML = "Severely Stunted";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Severely_Stunted_total_content_total; ?>";



}

function purok_3_SS_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}


function purok_3_S_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_3_h_w_status").innerHTML = "Stunted";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Stunted_total_content_total; ?>";



}

function purok_3_S_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}


function purok_3_NH_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_3_h_w_status").innerHTML = "Normal Height";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Normal_Height_total_content_total; ?>";



}

function purok_3_NH_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}


function purok_3_T_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#377CBD";

document.getElementById("purok_3_h_w_status").innerHTML = "Tall";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Tall_total_content_total; ?>";



}

function purok_3_T_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}

///////////////////////////////////////////////////

function purok_3_SU_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_3_h_w_status").innerHTML = "Severely Underweight";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Severely_Underweight_total_content_total; ?>";



}

function purok_3_SU_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}


function purok_3_U_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_3_h_w_status").innerHTML = "Underweight";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Underweight_total_content_total; ?>";



}

function purok_3_U_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}


function purok_3_NW_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_3_h_w_status").innerHTML = "Normal Weight";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Normal_Weight_total_content_total; ?>";



}

function purok_3_NW_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}


function purok_3_O_content_in(x){


document.getElementById("purok_3_h_w_data").style.display = "block";
document.getElementById("purok_3_h_w_data").style.backgroundColor = "#377CBD";

document.getElementById("purok_3_h_w_status").innerHTML = "Overweight";
document.getElementById("purok_3_h_w_data_content").innerHTML = "<?php echo $Purok_3_Overweight_total_content_total; ?>";



}

function purok_3_O_content_out(x){


document.getElementById("purok_3_h_w_data").style.display = "none";




}









</script>

</div>

<div class="purok_4"> 

<div id="purok_4_severely_stunted" onmouseover="purok_4_SS_content_in(this)" onmouseout="purok_4_SS_content_out(this)" class="purok_4_severely_stunted">SS</div>
<div id="purok_4_stunted" onmouseover="purok_4_S_content_in(this)" onmouseout="purok_4_S_content_out(this)" class="purok_4_stunted">S</div>
<div id="purok_4_normal_h" onmouseover="purok_4_NH_content_in(this)" onmouseout="purok_4_NH_content_out(this)" class="purok_4_normal_h">NH</div>
<div id="purok_4_tall" onmouseover="purok_4_T_content_in(this)" onmouseout="purok_4_T_content_out(this)" class="purok_4_tall">T</div>


<div id="purok_4_severely_underweight" onmouseover="purok_4_SU_content_in(this)" onmouseout="purok_4_SU_content_out(this)"  class="purok_4_severely_underweight">SU</div>
<div id="purok_4_underweight" onmouseover="purok_4_U_content_in(this)" onmouseout="purok_4_U_content_out(this)" class="purok_4_underweight">U</div>
<div id="purok_4_normal_w" onmouseover="purok_4_NW_content_in(this)" onmouseout="purok_4_NW_content_out(this)" class="purok_4_normal_w">NW</div>
<div id="purok_4_overweight" onmouseover="purok_4_O_content_in(this)" onmouseout="purok_4_O_content_out(this)" class="purok_4_overweight">O</div>

<div id="purok_4_h_w_data" class="purok_4_h_w_data">

<center><h3 id="purok_4_h_w_status">Title</h3></center>
<center><p id ="purok_4_h_w_data_content">100</p></center>

</div>

<script>


function purok_4_SS_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_4_h_w_status").innerHTML = "Severely Stunted";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Severely_Stunted_total_content_total; ?>";



}

function purok_4_SS_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}


function purok_4_S_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_4_h_w_status").innerHTML = "Stunted";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Stunted_total_content_total; ?>";



}

function purok_4_S_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}


function purok_4_NH_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_4_h_w_status").innerHTML = "Normal Height";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Normal_Height_total_content_total; ?>";



}

function purok_4_NH_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}


function purok_4_T_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#477CBD";

document.getElementById("purok_4_h_w_status").innerHTML = "Tall";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Tall_total_content_total; ?>";



}

function purok_4_T_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}

///////////////////////////////////////////////////

function purok_4_SU_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#D9544D";

document.getElementById("purok_4_h_w_status").innerHTML = "Severely Underweight";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Severely_Underweight_total_content_total; ?>";



}

function purok_4_SU_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}


function purok_4_U_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#F4A848";

document.getElementById("purok_4_h_w_status").innerHTML = "Underweight";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Underweight_total_content_total; ?>";



}

function purok_4_U_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}


function purok_4_NW_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_4_h_w_status").innerHTML = "Normal Weight";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Normal_Weight_total_content_total; ?>";



}

function purok_4_NW_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}


function purok_4_O_content_in(x){


document.getElementById("purok_4_h_w_data").style.display = "block";
document.getElementById("purok_4_h_w_data").style.backgroundColor = "#477CBD";

document.getElementById("purok_4_h_w_status").innerHTML = "Overweight";
document.getElementById("purok_4_h_w_data_content").innerHTML = "<?php echo $Purok_4_Overweight_total_content_total; ?>";



}

function purok_4_O_content_out(x){


document.getElementById("purok_4_h_w_data").style.display = "none";




}









</script>

</div>


<div class="purok_5">

<div id="purok_5_severely_stunted" onmouseover="purok_5_SS_content_in(this)" onmouseout="purok_5_SS_content_out(this)" class="purok_5_severely_stunted">SS</div>
<div id="purok_5_stunted" onmouseover="purok_5_S_content_in(this)" onmouseout="purok_5_S_content_out(this)" class="purok_5_stunted">S</div>
<div id="purok_5_normal_h" onmouseover="purok_5_NH_content_in(this)" onmouseout="purok_5_NH_content_out(this)" class="purok_5_normal_h">NH</div>
<div id="purok_5_tall" onmouseover="purok_5_T_content_in(this)" onmouseout="purok_5_T_content_out(this)" class="purok_5_tall">T</div>


<div id="purok_5_severely_underweight" onmouseover="purok_5_SU_content_in(this)" onmouseout="purok_5_SU_content_out(this)" class="purok_5_severely_underweight">SU</div>
<div id="purok_5_underweight" onmouseover="purok_5_U_content_in(this)" onmouseout="purok_5_U_content_out(this)" class="purok_5_underweight">U</div>
<div id="purok_5_normal_w" onmouseover="purok_5_NW_content_in(this)" onmouseout="purok_5_NW_content_out(this)" class="purok_5_normal_w">NW</div>
<div id="purok_5_overweight" onmouseover="purok_5_O_content_in(this)" onmouseout="purok_5_O_content_out(this)" class="purok_5_overweight">O</div>

<div id="purok_5_h_w_data" class="purok_5_h_w_data">

<center><h3 id="purok_5_h_w_status">Title</h3></center>
<center><p id ="purok_5_h_w_data_content">100</p></center>

</div>

<script>


function purok_5_SS_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#D9555D";

document.getElementById("purok_5_h_w_status").innerHTML = "Severely Stunted";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Severely_Stunted_total_content_total; ?>";



}

function purok_5_SS_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}


function purok_5_S_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#F5A858";

document.getElementById("purok_5_h_w_status").innerHTML = "Stunted";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Stunted_total_content_total; ?>";



}

function purok_5_S_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}


function purok_5_NH_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_5_h_w_status").innerHTML = "Normal Height";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Normal_Height_total_content_total; ?>";



}

function purok_5_NH_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}


function purok_5_T_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#577CBD";

document.getElementById("purok_5_h_w_status").innerHTML = "Tall";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Tall_total_content_total; ?>";



}

function purok_5_T_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}

///////////////////////////////////////////////////

function purok_5_SU_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#D9555D";

document.getElementById("purok_5_h_w_status").innerHTML = "Severely Underweight";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Severely_Underweight_total_content_total; ?>";



}

function purok_5_SU_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}


function purok_5_U_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#F5A858";

document.getElementById("purok_5_h_w_status").innerHTML = "Underweight";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Underweight_total_content_total; ?>";



}

function purok_5_U_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}


function purok_5_NW_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_5_h_w_status").innerHTML = "Normal Weight";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Normal_Weight_total_content_total; ?>";



}

function purok_5_NW_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}


function purok_5_O_content_in(x){


document.getElementById("purok_5_h_w_data").style.display = "block";
document.getElementById("purok_5_h_w_data").style.backgroundColor = "#577CBD";

document.getElementById("purok_5_h_w_status").innerHTML = "Overweight";
document.getElementById("purok_5_h_w_data_content").innerHTML = "<?php echo $Purok_5_Overweight_total_content_total; ?>";



}

function purok_5_O_content_out(x){


document.getElementById("purok_5_h_w_data").style.display = "none";




}









</script>

</div>

<div class="purok_6"> 

<div id="purok_6_severely_stunted" onmouseover="purok_6_SS_content_in(this)" onmouseout="purok_6_SS_content_out(this)" class="purok_6_severely_stunted">SS</div>
<div id="purok_6_stunted" onmouseover="purok_6_S_content_in(this)" onmouseout="purok_6_S_content_out(this)" class="purok_6_stunted">S</div>
<div id="purok_6_normal_h" onmouseover="purok_6_NH_content_in(this)" onmouseout="purok_6_NH_content_out(this)" class="purok_6_normal_h">NH</div>
<div id="purok_6_tall" onmouseover="purok_6_T_content_in(this)" onmouseout="purok_6_T_content_out(this)" class="purok_6_tall">T</div>


<div id="purok_6_severely_underweight" onmouseover="purok_6_SU_content_in(this)" onmouseout="purok_6_SU_content_out(this)" class="purok_6_severely_underweight">SU</div>
<div id="purok_6_underweight" onmouseover="purok_6_U_content_in(this)" onmouseout="purok_6_U_content_out(this)" class="purok_6_underweight">U</div>
<div id="purok_6_normal_w" onmouseover="purok_6_NW_content_in(this)" onmouseout="purok_6_NW_content_out(this)" class="purok_6_normal_w">NW</div>
<div id="purok_6_overweight" onmouseover="purok_6_O_content_in(this)" onmouseout="purok_6_O_content_out(this)" class="purok_6_overweight">O</div>

<div id="purok_6_h_w_data" class="purok_6_h_w_data">

<center><h3 id="purok_6_h_w_status">Title</h3></center>
<center><p id ="purok_6_h_w_data_content">100</p></center>

</div>

<script>


function purok_6_SS_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#D9566D";

document.getElementById("purok_6_h_w_status").innerHTML = "Severely Stunted";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Severely_Stunted_total_content_total; ?>";



}

function purok_6_SS_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}


function purok_6_S_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#F6A868";

document.getElementById("purok_6_h_w_status").innerHTML = "Stunted";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Stunted_total_content_total; ?>";



}

function purok_6_S_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}


function purok_6_NH_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_6_h_w_status").innerHTML = "Normal Height";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Normal_Height_total_content_total; ?>";



}

function purok_6_NH_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}


function purok_6_T_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#677CBD";

document.getElementById("purok_6_h_w_status").innerHTML = "Tall";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Tall_total_content_total; ?>";



}

function purok_6_T_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}

///////////////////////////////////////////////////

function purok_6_SU_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#D9566D";

document.getElementById("purok_6_h_w_status").innerHTML = "Severely Underweight";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Severely_Underweight_total_content_total; ?>";



}

function purok_6_SU_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}


function purok_6_U_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#F6A868";

document.getElementById("purok_6_h_w_status").innerHTML = "Underweight";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Underweight_total_content_total; ?>";



}

function purok_6_U_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}


function purok_6_NW_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#56BC56";

document.getElementById("purok_6_h_w_status").innerHTML = "Normal Weight";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Normal_Weight_total_content_total; ?>";



}

function purok_6_NW_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}


function purok_6_O_content_in(x){


document.getElementById("purok_6_h_w_data").style.display = "block";
document.getElementById("purok_6_h_w_data").style.backgroundColor = "#677CBD";

document.getElementById("purok_6_h_w_status").innerHTML = "Overweight";
document.getElementById("purok_6_h_w_data_content").innerHTML = "<?php echo $Purok_6_Overweight_total_content_total; ?>";



}

function purok_6_O_content_out(x){


document.getElementById("purok_6_h_w_data").style.display = "none";




}









</script>


<?php


//PUROK 1 HEIGHT STATUS 

//PUROK 1 SEVERELY STUNTED
$purok_1 = "Purok 1";
$p1_severely_stunted = "Severely Stunted";
$show_p1_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Height_Status LIKE '%".$p1_severely_stunted."%'");
$count_p1_severely_stunted_result = $show_p1_severely_stunted -> rowCount();

if($count_p1_severely_stunted_result == 0) {
	
	$p1_severely_stunted_result = 0;
} else {
	
	$p1_severely_stunted_result = 1;
}




//PUROK 1 STUNTED
$purok_1 = "Purok 1";
$p1_stunted = " Stunted";
$show_p1_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Height_Status LIKE '%".$p1_stunted."%'");
$count_p1_stunted_result = $show_p1_stunted -> rowCount();
if($count_p1_stunted_result == 0) {
	
	$p1_stunted_result = 0;
} else {
	
	$p1_stunted_result = 1;
}



//PUROK 1 NORMAL
$purok_1 = "Purok 1";
$p1_normal_h = "Normal";
$show_p1_normal_h = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Height_Status LIKE '%".$p1_normal_h."%'");
$count_p1_normal__h_result = $show_p1_normal_h -> rowCount();
if($count_p1_normal__h_result == 0) {
	
	$p1_normal_h_result = 0;
} else {
	
	$p1_normal_h_result = 1;
}


//PUROK 1 TALL
$purok_1 = "Purok 1";
$p1_tall = "Tall";
$show_p1_tall = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Height_Status LIKE '%".$p1_tall."%'");
$count_p1_tall_result = $show_p1_tall -> rowCount();
if($count_p1_tall_result == 0) {
	
	$p1_tall_result = 0;
} else {
	
	$p1_tall_result = 1;
}






//PUROK 1 WEIGHT STATUS 

//PUROK 1 SEVERELY UNDERWEIGHT
$purok_1 = "Purok 1";
$p1_severely_underweight = "Severely Underweight";
$show_p1_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Weight_Status LIKE '%".$p1_severely_underweight."%'");
$count_p1_severely_underweight_result = $show_p1_severely_underweight -> rowCount();
if($count_p1_severely_underweight_result == 0) {
	
	$p1_severely_underweight_result = 0;
} else {
	
	$p1_severely_underweight_result = 1;
}




//PUROK 1 UNDERWEIGHT
$purok_1 = "Purok 1";
$p1_underweight = "Underweight";
$show_p1_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Weight_Status LIKE '%".$p1_underweight."%'");
$count_p1_underweight_result = $show_p1_underweight -> rowCount();
if($count_p1_underweight_result == 0) {
	
	$p1_underweight_result = 0;
} else {
	
	$p1_underweight_result = 1;
}

//PUROK 1 NORMAL
$purok_1 = "Purok 1";
$p1_normal_w = "Normal";
$show_p1_normal_w = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Weight_Status LIKE '%".$p1_normal_w."%'");
$count_p1_normal_w_result = $show_p1_normal_w -> rowCount();
if($count_p1_normal_w_result == 0) {
	
	$p1_normal_w_result = 0;
} else {
	
	$p1_normal_w_result = 1;
}

//PUROK 1 OVERWEIGHT
$purok_1 = "Purok 1";
$p1_overweight = "Overweight";
$show_p1_overweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_1."%' AND Weight_Status LIKE '%".$p1_overweight."%'");
$count_p1_overweight_result = $show_p1_overweight -> rowCount();
if($count_p1_overweight_result == 0) {
	
	$p1_overweight_result = 0;
} else {
	
	$p1_overweight_result = 1;
}





//PUROK 2 HEIGHT STATUS 

//PUROK 2 SEVERELY STUNTED
$purok_2 = "Purok 2";
$p2_severely_stunted = "Severely Stunted";
$show_p2_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Height_Status LIKE '%".$p2_severely_stunted."%'");
$count_p2_severely_stunted_result = $show_p2_severely_stunted -> rowCount();
if($count_p2_severely_stunted_result == 0) {
	
	$p2_severely_stunted_result = 0;
} else {
	
	$p2_severely_stunted_result = 1;
}


//PUROK 2 STUNTED
$purok_2 = "Purok 2";
$p2_stunted = " Stunted";
$show_p2_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Height_Status LIKE '%".$p2_stunted."%'");
$count_p2_stunted_result = $show_p2_stunted -> rowCount();
if($count_p2_stunted_result == 0) {
	
	$p2_stunted_result = 0;
} else {
	
	$p2_stunted_result = 1;
}

//PUROK 2 NORMAL
$purok_2 = "Purok 2";
$p2_normal_h = "Normal";
$show_p2_normal_h = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Height_Status LIKE '%".$p2_normal_h."%'");
$count_p2_normal__h_result = $show_p2_normal_h -> rowCount();
if($count_p2_normal__h_result == 0) {
	
	$p2_normal_h_result = 0;
} else {
	
	$p2_normal_h_result = 1;
}

//PUROK 2 TALL
$purok_2 = "Purok 2";
$p2_tall = "Tall";
$show_p2_tall = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Height_Status LIKE '%".$p2_tall."%'");
$count_p2_tall_result = $show_p2_tall -> rowCount();
if($count_p2_tall_result == 0) {
	
	$p2_tall_result = 0;
} else {
	
	$p2_tall_result = 1;
}




//PUROK 2 WEIGHT STATUS 

//PUROK 2 SEVERELY UNDERWEIGHT
$purok_2 = "Purok 2";
$p2_severely_underweight = "Severely Underweight";
$show_p2_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Weight_Status LIKE '%".$p2_severely_underweight."%'");
$count_p2_severely_underweight_result = $show_p2_severely_underweight -> rowCount();
if($count_p2_severely_underweight_result == 0) {
	
	$p2_severely_underweight_result = 0;
} else {
	
	$p2_severely_underweight_result = 1;
}





//PUROK 2 UNDERWEIGHT
$purok_2 = "Purok 2";
$p2_underweight = "Underweight";
$show_p2_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Weight_Status LIKE '%".$p2_underweight."%'");
$count_p2_underweight_result = $show_p2_underweight -> rowCount();
if($count_p2_underweight_result == 0) {
	
	$p2_underweight_result = 0;
} else {
	
	$p2_underweight_result = 1;
}


//PUROK 2 NORMAL
$purok_2 = "Purok 2";
$p2_normal_w = "Normal";
$show_p2_normal_w = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Weight_Status LIKE '%".$p2_normal_w."%'");
$count_p2_normal_w_result = $show_p2_normal_w -> rowCount();
if($count_p2_normal_w_result == 0) {
	
	$p2_normal_w_result = 0;
} else {
	
	$p2_normal_w_result = 1;
}

//PUROK 2 OVERWEIGHT
$purok_2 = "Purok 1";
$p2_overweight = "Overweight";
$show_p2_overweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_2."%' AND Weight_Status LIKE '%".$p2_overweight."%'");
$count_p2_overweight_result = $show_p2_overweight -> rowCount();
if($count_p2_overweight_result == 0) {
	
	$p2_overweight_result = 0;
} else {
	
	$p2_overweight_result = 1;
}







//PUROK 3 HEIGHT STATUS 

//PUROK 3 SEVERELY STUNTED
$purok_3 = "Purok 3";
$p3_severely_stunted = "Severely Stunted";
$show_p3_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Height_Status LIKE '%".$p3_severely_stunted."%'");
$count_p3_severely_stunted_result = $show_p3_severely_stunted -> rowCount();
if($count_p3_severely_stunted_result == 0) {
	
	$p3_severely_stunted_result = 0;
} else {
	
	$p3_severely_stunted_result = 1;
}



//PUROK 3 STUNTED
$purok_3 = "Purok 3";
$p3_stunted = " Stunted";
$show_p3_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Height_Status LIKE '%".$p3_stunted."%'");
$count_p3_stunted_result = $show_p3_stunted -> rowCount();
if($count_p3_stunted_result == 0) {
	
	$p3_stunted_result = 0;
} else {
	
	$p3_stunted_result = 1;
}


//PUROK 3 NORMAL
$purok_3 = "Purok 3";
$p3_normal_h = "Normal";
$show_p3_normal_h = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Height_Status LIKE '%".$p3_normal_h."%'");
$count_p3_normal__h_result = $show_p3_normal_h -> rowCount();
if($count_p3_normal__h_result == 0) {
	
	$p3_normal_h_result = 0;
} else {
	
	$p3_normal_h_result = 1;
}

//PUROK 3 TALL
$purok_3 = "Purok 3";
$p3_tall = "Tall";
$show_p3_tall = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Height_Status LIKE '%".$p3_tall."%'");
$count_p3_tall_result = $show_p3_tall -> rowCount();
if($count_p3_tall_result == 0) {
	
	$p3_tall_result = 0;
} else {
	
	$p3_tall_result = 1;
}





//PUROK 3 WEIGHT STATUS 

//PUROK 3 SEVERELY UNDERWEIGHT
$purok_3 = "Purok 3";
$p3_severely_underweight = "Severely Underweight";
$show_p3_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Weight_Status LIKE '%".$p3_severely_underweight."%'");
$count_p3_severely_underweight_result = $show_p3_severely_underweight -> rowCount();
if($count_p3_severely_underweight_result == 0) {
	
	$p3_severely_underweight_result = 0;
} else {
	
	$p3_severely_underweight_result = 1;
}


//PUROK 3 UNDERWEIGHT
$purok_3 = "Purok 3";
$p3_underweight = "Underweight";
$show_p3_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Weight_Status LIKE '%".$p3_underweight."%'");
$count_p3_underweight_result = $show_p3_underweight -> rowCount();
if($count_p3_underweight_result == 0) {
	
	$p3_underweight_result = 0;
} else {
	
	$p3_underweight_result = 1;
}

//PUROK 2 NORMAL
$purok_3 = "Purok 3";
$p3_normal_w = "Normal";
$show_p3_normal_w = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Weight_Status LIKE '%".$p3_normal_w."%'");
$count_p3_normal_w_result = $show_p3_normal_w -> rowCount();
if($count_p3_normal_w_result == 0) {
	
	$p3_normal_w_result = 0;
} else {
	
	$p3_normal_w_result = 1;
}

//PUROK 3 OVERWEIGHT
$purok_3 = "Purok 3";
$p3_overweight = "Overweight";
$show_p3_overweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_3."%' AND Weight_Status LIKE '%".$p3_overweight."%'");
$count_p3_overweight_result = $show_p3_overweight -> rowCount();
if($count_p3_overweight_result == 0) {
	
	$p3_overweight_result = 0;
} else {
	
	$p3_overweight_result = 1;
}










//PUROK 4 HEIGHT STATUS 

//PUROK 4 SEVERELY STUNTED
$purok_4 = "Purok 4";
$p4_severely_stunted = "Severely Stunted";
$show_p4_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Height_Status LIKE '%".$p4_severely_stunted."%'");
$count_p4_severely_stunted_result = $show_p4_severely_stunted -> rowCount();
if($count_p4_severely_stunted_result == 0) {
	
	$p4_severely_stunted_result = 0;
} else {
	
	$p4_severely_stunted_result = 1;
}





//PUROK 4 STUNTED
$purok_4 = "Purok 4";
$p4_stunted = " Stunted";
$show_p4_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Height_Status LIKE '%".$p4_stunted."%'");
$count_p4_stunted_result = $show_p4_stunted -> rowCount();
if($count_p4_stunted_result == 0) {
	
	$p4_stunted_result = 0;
} else {
	
	$p4_stunted_result = 1;
}


//PUROK 4 NORMAL
$purok_4 = "Purok 4";
$p4_normal_h = "Normal";
$show_p4_normal_h = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Height_Status LIKE '%".$p4_normal_h."%'");
$count_p4_normal__h_result = $show_p4_normal_h -> rowCount();
if($count_p4_normal__h_result == 0) {
	
	$p4_normal_h_result = 0;
} else {
	
	$p4_normal_h_result = 1;
}

//PUROK 4 TALL
$purok_4 = "Purok 4";
$p4_tall = "Tall";
$show_p4_tall = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Height_Status LIKE '%".$p4_tall."%'");
$count_p4_tall_result = $show_p4_tall -> rowCount();
if($count_p4_tall_result == 0) {
	
	$p4_tall_result = 0;
} else {
	
	$p4_tall_result = 1;
}





//PUROK 4 WEIGHT STATUS 

//PUROK 4 SEVERELY UNDERWEIGHT
$purok_4 = "Purok 4";
$p4_severely_underweight = "Severely Underweight";
$show_p4_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Weight_Status LIKE '%".$p4_severely_underweight."%'");
$count_p4_severely_underweight_result = $show_p4_severely_underweight -> rowCount();
if($count_p4_severely_underweight_result == 0) {
	
	$p4_severely_underweight_result = 0;
} else {
	
	$p4_severely_underweight_result = 1;
}


//PUROK 2 UNDERWEIGHT
$purok_4 = "Purok 4";
$p4_underweight = "Underweight";
$show_p4_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Weight_Status LIKE '%".$p4_underweight."%'");
$count_p4_underweight_result = $show_p4_underweight -> rowCount();
if($count_p4_underweight_result == 0) {
	
	$p4_underweight_result = 0;
} else {
	
	$p4_underweight_result = 1;
}


//PUROK 4 NORMAL
$purok_4 = "Purok 2";
$p4_normal_w = "Normal";
$show_p4_normal_w = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Weight_Status LIKE '%".$p4_normal_w."%'");
$count_p4_normal_w_result = $show_p4_normal_w -> rowCount();
if($count_p4_normal_w_result == 0) {
	
	$p4_normal_w_result = 0;
} else {
	
	$p4_normal_w_result = 1;
}


//PUROK 2 OVERWEIGHT
$purok_4 = "Purok 1";
$p4_overweight = "Overweight";
$show_p4_overweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_4."%' AND Weight_Status LIKE '%".$p4_overweight."%'");
$count_p4_overweight_result = $show_p4_overweight -> rowCount();
if($count_p4_overweight_result == 0) {
	
	$p4_overweight_result = 0;
} else {
	
	$p4_overweight_result = 1;
}








//PUROK 5 HEIGHT STATUS 

//PUROK 5 SEVERELY STUNTED
$purok_5 = "Purok 5";
$p5_severely_stunted = "Severely Stunted";
$show_p5_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Height_Status LIKE '%".$p5_severely_stunted."%'");
$count_p5_severely_stunted_result = $show_p5_severely_stunted -> rowCount();
if($count_p5_severely_stunted_result == 0) {
	
	$p5_severely_stunted_result = 0;
} else {
	
	$p5_severely_stunted_result = 1;
}


//PUROK 5 STUNTED
$purok_5 = "Purok 5";
$p5_stunted = " Stunted";
$show_p5_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Height_Status LIKE '%".$p5_stunted."%'");
$count_p5_stunted_result = $show_p5_stunted -> rowCount();
if($count_p5_stunted_result == 0) {
	
	$p5_stunted_result = 0;
} else {
	
	$p5_stunted_result = 1;
}


//PUROK 5 NORMAL
$purok_5 = "Purok 5";
$p5_normal_h = "Normal";
$show_p5_normal_h = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Height_Status LIKE '%".$p5_normal_h."%'");
$count_p5_normal__h_result = $show_p5_normal_h -> rowCount();
if($count_p5_normal__h_result == 0) {
	
	$p5_normal_h_result = 0;
} else {
	
	$p5_normal_h_result = 1;
}

//PUROK 5 TALL
$purok_5 = "Purok 5";
$p5_tall = "Tall";
$show_p5_tall = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Height_Status LIKE '%".$p5_tall."%'");
$count_p5_tall_result = $show_p5_tall -> rowCount();
if($count_p5_tall_result == 0) {
	
	$p5_tall_result = 0;
} else {
	
	$p5_tall_result = 1;
}





//PUROK 5 WEIGHT STATUS 

//PUROK 5 SEVERELY UNDERWEIGHT
$purok_5 = "Purok 5";
$p5_severely_underweight = "Severely Underweight";
$show_p5_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Weight_Status LIKE '%".$p5_severely_underweight."%'");
$count_p5_severely_underweight_result = $show_p5_severely_underweight -> rowCount();
if($count_p5_severely_underweight_result == 0) {
	
	$p5_severely_underweight_result = 0;
} else {
	
	$p5_severely_underweight_result = 1;
}


//PUROK 2 UNDERWEIGHT
$purok_5 = "Purok 5";
$p5_underweight = "Underweight";
$show_p5_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Weight_Status LIKE '%".$p5_underweight."%'");
$count_p5_underweight_result = $show_p5_underweight -> rowCount();
if($count_p5_underweight_result == 0) {
	
	$p5_underweight_result = 0;
} else {
	
	$p5_underweight_result = 1;
}

//PUROK 5 NORMAL
$purok_5 = "Purok 5";
$p5_normal_w = "Normal";
$show_p5_normal_w = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Weight_Status LIKE '%".$p5_normal_w."%'");
$count_p5_normal_w_result = $show_p5_normal_w -> rowCount();
if($count_p5_normal_w_result == 0) {
	
	$p5_normal_w_result = 0;
} else {
	
	$p5_normal_w_result = 1;
}

//PUROK 2 OVERWEIGHT
$purok_5 = "Purok 5";
$p5_overweight = "Overweight";
$show_p5_overweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_5."%' AND Weight_Status LIKE '%".$p5_overweight."%'");
$count_p5_overweight_result = $show_p5_overweight -> rowCount();
if($count_p5_overweight_result == 0) {
	
	$p5_overweight_result = 0;
} else {
	
	$p5_overweight_result = 1;
}








//PUROK 6 HEIGHT STATUS 

//PUROK 6 SEVERELY STUNTED
$purok_6 = "Purok 6";
$p6_severely_stunted = "Severely Stunted";
$show_p6_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Height_Status LIKE '%".$p6_severely_stunted."%'");
$count_p6_severely_stunted_result = $show_p6_severely_stunted -> rowCount();
if($count_p6_severely_stunted_result == 0) {
	
	$p6_severely_stunted_result = 0;
} else {
	
	$p6_severely_stunted_result = 1;
}



//PUROK 6 STUNTED
$purok_6 = "Purok 6";
$p6_stunted = " Stunted";
$show_p6_stunted = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Height_Status LIKE '%".$p6_stunted."%'");
$count_p6_stunted_result = $show_p6_stunted -> rowCount();
if($count_p6_stunted_result == 0) {
	
	$p6_stunted_result = 0;
} else {
	
	$p6_stunted_result = 1;
}

//PUROK 6 NORMAL
$purok_6 = "Purok 6";
$p6_normal_h = "Normal";
$show_p6_normal_h = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Height_Status LIKE '%".$p6_normal_h."%'");
$count_p6_normal__h_result = $show_p6_normal_h -> rowCount();
if($count_p6_normal__h_result == 0) {
	
	$p6_normal_h_result = 0;
} else {
	
	$p6_normal_h_result = 1;
}

//PUROK 6 TALL
$purok_6 = "Purok 6";
$p6_tall = "Tall";
$show_p6_tall = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Height_Status LIKE '%".$p6_tall."%'");
$count_p6_tall_result = $show_p6_tall -> rowCount();
if($count_p6_tall_result == 0) {
	
	$p6_tall_result = 0;
} else {
	
	$p6_tall_result = 1;
}





//PUROK 6 WEIGHT STATUS 

//PUROK 6 SEVERELY UNDERWEIGHT
$purok_6 = "Purok 6";
$p6_severely_underweight = "Severely Underweight";
$show_p6_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Weight_Status LIKE '%".$p6_severely_underweight."%'");
$count_p6_severely_underweight_result = $show_p6_severely_underweight -> rowCount();
if($count_p6_severely_underweight_result == 0) {
	
	$p6_severely_underweight_result = 0;
} else {
	
	$p6_severely_underweight_result = 1;
}



//PUROK 6 UNDERWEIGHT
$purok_6 = "Purok 6";
$p6_underweight = "Underweight";
$show_p6_underweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Weight_Status LIKE '%".$p6_underweight."%'");
$count_p6_underweight_result = $show_p6_underweight -> rowCount();
if($count_p6_underweight_result == 0) {
	
	$p6_underweight_result = 0;
} else {
	
	$p6_underweight_result = 1;
}


//PUROK 6 NORMAL
$purok_6 = "Purok 6";
$p6_normal_w = "Normal";
$show_p6_normal_w = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Weight_Status LIKE '%".$p6_normal_w."%'");
$count_p6_normal_w_result = $show_p6_normal_w -> rowCount();
if($count_p6_normal_w_result == 0) {
	
	$p6_normal_w_result = 0;
} else {
	
	$p6_normal_w_result = 1;
}


//PUROK 6 OVERWEIGHT
$purok_6 = "Purok 6";
$p6_overweight = "Overweight";
$show_p6_overweight = $conn->query("SELECT *FROM child_information WHERE Address LIKE '%".$purok_6."%' AND Weight_Status LIKE '%".$p6_overweight."%'");
$count_p6_overweight_result = $show_p6_overweight -> rowCount();
if($count_p6_overweight_result == 0) {
	
	$p6_overweight_result = 0;
} else {
	
	$p6_overweight_result = 1;
}















?>






</div>



</div>

<div class="spotmap_legend">



</div>


</div>

<!--FOOTER-->
<div id="mainfooter" class="fotter_user">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->
</div>


<script>

//PUROK 1 HEIGHT STATUS
var purok_1_severely_stunted = <?php echo $p1_severely_stunted_result ?>;

if(purok_1_severely_stunted == 0) {
	
document.getElementById("purok_1_severely_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_1_severely_stunted").style.display = "block";
}


var purok_1_stunted = <?php echo $p1_stunted_result ?>;

if(purok_1_stunted == 0) {
	
document.getElementById("purok_1_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_1_stunted").style.display = "block";
}


var purok_1_normal_h = <?php echo $p1_normal_h_result ?>;


if(purok_1_normal_h == 0) {
	
document.getElementById("purok_1_normal_h").style.display = "none";
}else {
	
	document.getElementById("purok_1_normal_h").style.display = "block";
}

var purok_1_tall = <?php echo $p1_tall_result ?>;


if(purok_1_tall == 0) {
	
	document.getElementById("purok_1_tall").style.display = "none";
}else {
	
	document.getElementById("purok_1_tall").style.display = "block";
}


// PUROK 1 WEIGHT STANDARD
var purok_1_severely_underweight = <?php echo $p1_severely_underweight_result ?>;
var purok_1_underweight = <?php echo $p1_underweight_result ?>;
var purok_1_normal_w = <?php echo $p1_normal_h_result ?>;
var purok_1_overweight = <?php echo $p1_overweight_result ?>;



if(purok_1_severely_underweight == 0) {
	
document.getElementById("purok_1_severely_underweight").style.display = "none";
}else {
	
	document.getElementById("purok_1_severely_underweight").style.display = "block";
}


if(purok_1_underweight == 0) {
	
document.getElementById("purok_1_underweight").style.display = "none";
}else {
	
document.getElementById("purok_1_underweight").style.display = "block";
}




if(purok_1_normal_w == 0) {
	
document.getElementById("purok_1_normal_w").style.display = "none";
}else {
	
	document.getElementById("purok_1_normal_w").style.display = "block";
}



if(purok_1_overweight == 0) {
	
document.getElementById("purok_1_overweight").style.display = "none";
}else {
	
document.getElementById("purok_1_overweight").style.display = "block";
}



//PUROK 2 HEIGHT STATUS
var purok_2_severely_stunted = <?php echo $p2_severely_stunted_result ?>;

if(purok_2_severely_stunted == 0) {
	
document.getElementById("purok_2_severely_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_2_severely_stunted").style.display = "block";
}


var purok_2_stunted = <?php echo $p2_stunted_result ?>;

if(purok_2_stunted == 0) {
	
document.getElementById("purok_2_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_2_stunted").style.display = "block";
}


var purok_2_normal_h = <?php echo $p2_normal_h_result ?>;


if(purok_2_normal_h == 0) {
	
document.getElementById("purok_2_normal_h").style.display = "none";
}else {
	
	document.getElementById("purok_2_normal_h").style.display = "block";
}

var purok_2_tall = <?php echo $p2_tall_result ?>;


if(purok_2_tall == 0) {
	
	document.getElementById("purok_2_tall").style.display = "none";
}else {
	
	document.getElementById("purok_2_tall").style.display = "block";
}


// PUROK 2 WEIGHT STANDARD
var purok_2_severely_underweight = <?php echo $p2_severely_underweight_result ?>;
var purok_2_underweight = <?php echo $p2_underweight_result ?>;
var purok_2_normal_w = <?php echo $p2_normal_h_result ?>;
var purok_2_overweight = <?php echo $p2_overweight_result ?>;



if(purok_2_severely_underweight == 0) {
	
document.getElementById("purok_2_severely_underweight").style.display = "none";
}else {
	
	document.getElementById("purok_2_severely_underweight").style.display = "block";
}


if(purok_2_underweight == 0) {
	
document.getElementById("purok_2_underweight").style.display = "none";
}else {
	
document.getElementById("purok_2_underweight").style.display = "block";
}




if(purok_2_normal_w == 0) {
	
document.getElementById("purok_2_normal_w").style.display = "none";
}else {
	
	document.getElementById("purok_2_normal_w").style.display = "block";
}



if(purok_2_overweight == 0) {
	
document.getElementById("purok_2_overweight").style.display = "none";
}else {
	
document.getElementById("purok_2_overweight").style.display = "block";
}


//PUROK 3 HEIGHT STATUS
var purok_3_severely_stunted = <?php echo $p3_severely_stunted_result ?>;

if(purok_3_severely_stunted == 0) {
	
document.getElementById("purok_3_severely_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_3_severely_stunted").style.display = "block";
}


var purok_3_stunted = <?php echo $p3_stunted_result ?>;

if(purok_3_stunted == 0) {
	
document.getElementById("purok_3_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_3_stunted").style.display = "block";
}


var purok_3_normal_h = <?php echo $p3_normal_h_result ?>;


if(purok_3_normal_h == 0) {
	
document.getElementById("purok_3_normal_h").style.display = "none";
}else {
	
	document.getElementById("purok_3_normal_h").style.display = "block";
}

var purok_3_tall = <?php echo $p3_tall_result ?>;


if(purok_3_tall == 0) {
	
	document.getElementById("purok_3_tall").style.display = "none";
}else {
	
	document.getElementById("purok_3_tall").style.display = "block";
}


// PUROK 3 WEIGHT STANDARD
var purok_3_severely_underweight = <?php echo $p3_severely_underweight_result ?>;
var purok_3_underweight = <?php echo $p3_underweight_result ?>;
var purok_3_normal_w = <?php echo $p3_normal_h_result ?>;
var purok_3_overweight = <?php echo $p3_overweight_result ?>;



if(purok_3_severely_underweight == 0) {
	
document.getElementById("purok_3_severely_underweight").style.display = "none";
}else {
	
	document.getElementById("purok_3_severely_underweight").style.display = "block";
}


if(purok_3_underweight == 0) {
	
document.getElementById("purok_3_underweight").style.display = "none";
}else {
	
document.getElementById("purok_3_underweight").style.display = "block";
}




if(purok_3_normal_w == 0) {
	
document.getElementById("purok_3_normal_w").style.display = "none";
}else {
	
	document.getElementById("purok_3_normal_w").style.display = "block";
}



if(purok_3_overweight == 0) {
	
document.getElementById("purok_3_overweight").style.display = "none";
}else {
	
document.getElementById("purok_3_overweight").style.display = "block";
}

//PUROK 4 HEIGHT STATUS
var purok_4_severely_stunted = <?php echo $p4_severely_stunted_result ?>;

if(purok_4_severely_stunted == 0) {
	
document.getElementById("purok_4_severely_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_4_severely_stunted").style.display = "block";
}


var purok_4_stunted = <?php echo $p4_stunted_result ?>;

if(purok_4_stunted == 0) {
	
document.getElementById("purok_4_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_4_stunted").style.display = "block";
}


var purok_4_normal_h = <?php echo $p4_normal_h_result ?>;


if(purok_4_normal_h == 0) {
	
document.getElementById("purok_4_normal_h").style.display = "none";
}else {
	
	document.getElementById("purok_4_normal_h").style.display = "block";
}

var purok_4_tall = <?php echo $p4_tall_result ?>;


if(purok_4_tall == 0) {
	
	document.getElementById("purok_4_tall").style.display = "none";
}else {
	
	document.getElementById("purok_4_tall").style.display = "block";
}


// PUROK 4 WEIGHT STANDARD
var purok_4_severely_underweight = <?php echo $p4_severely_underweight_result ?>;
var purok_4_underweight = <?php echo $p4_underweight_result ?>;
var purok_4_normal_w = <?php echo $p4_normal_h_result ?>;
var purok_4_overweight = <?php echo $p4_overweight_result ?>;



if(purok_4_severely_underweight == 0) {
	
document.getElementById("purok_4_severely_underweight").style.display = "none";
}else {
	
	document.getElementById("purok_4_severely_underweight").style.display = "block";
}


if(purok_4_underweight == 0) {
	
document.getElementById("purok_4_underweight").style.display = "none";
}else {
	
document.getElementById("purok_4_underweight").style.display = "block";
}




if(purok_4_normal_w == 0) {
	
document.getElementById("purok_4_normal_w").style.display = "none";
}else {
	
	document.getElementById("purok_4_normal_w").style.display = "block";
}



if(purok_4_overweight == 0) {
	
document.getElementById("purok_4_overweight").style.display = "none";
}else {
	
document.getElementById("purok_4_overweight").style.display = "block";
}


//PUROK 5 HEIGHT STATUS
var purok_5_severely_stunted = <?php echo $p5_severely_stunted_result ?>;

if(purok_5_severely_stunted == 0) {
	
document.getElementById("purok_5_severely_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_5_severely_stunted").style.display = "block";
}


var purok_5_stunted = <?php echo $p5_stunted_result ?>;

if(purok_5_stunted == 0) {
	
document.getElementById("purok_5_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_5_stunted").style.display = "block";
}


var purok_5_normal_h = <?php echo $p5_normal_h_result ?>;


if(purok_5_normal_h == 0) {
	
document.getElementById("purok_5_normal_h").style.display = "none";
}else {
	
	document.getElementById("purok_5_normal_h").style.display = "block";
}

var purok_5_tall = <?php echo $p5_tall_result ?>;


if(purok_5_tall == 0) {
	
	document.getElementById("purok_5_tall").style.display = "none";
}else {
	
	document.getElementById("purok_5_tall").style.display = "block";
}


// PUROK 5 WEIGHT STANDARD
var purok_5_severely_underweight = <?php echo $p5_severely_underweight_result ?>;
var purok_5_underweight = <?php echo $p5_underweight_result ?>;
var purok_5_normal_w = <?php echo $p5_normal_h_result ?>;
var purok_5_overweight = <?php echo $p5_overweight_result ?>;



if(purok_5_severely_underweight == 0) {
	
document.getElementById("purok_5_severely_underweight").style.display = "none";
}else {
	
	document.getElementById("purok_5_severely_underweight").style.display = "block";
}


if(purok_5_underweight == 0) {
	
document.getElementById("purok_5_underweight").style.display = "none";
}else {
	
document.getElementById("purok_5_underweight").style.display = "block";
}




if(purok_5_normal_w == 0) {
	
document.getElementById("purok_5_normal_w").style.display = "none";
}else {
	
	document.getElementById("purok_5_normal_w").style.display = "block";
}



if(purok_5_overweight == 0) {
	
document.getElementById("purok_5_overweight").style.display = "none";
}else {
	
document.getElementById("purok_5_overweight").style.display = "block";
}




//PUROK 6 HEIGHT STATUS
var purok_6_severely_stunted = <?php echo $p6_severely_stunted_result ?>;

if(purok_6_severely_stunted == 0) {
	
document.getElementById("purok_6_severely_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_6_severely_stunted").style.display = "block";
}


var purok_6_stunted = <?php echo $p6_stunted_result ?>;

if(purok_6_stunted == 0) {
	
document.getElementById("purok_6_stunted").style.display = "none";
}else {
	
	document.getElementById("purok_6_stunted").style.display = "block";
}


var purok_6_normal_h = <?php echo $p6_normal_h_result ?>;


if(purok_6_normal_h == 0) {
	
document.getElementById("purok_6_normal_h").style.display = "none";
}else {
	
	document.getElementById("purok_6_normal_h").style.display = "block";
}

var purok_6_tall = <?php echo $p6_tall_result ?>;


if(purok_6_tall == 0) {
	
	document.getElementById("purok_6_tall").style.display = "none";
}else {
	
	document.getElementById("purok_6_tall").style.display = "block";
}


// PUROK 6 WEIGHT STANDARD
var purok_6_severely_underweight = <?php echo $p6_severely_underweight_result ?>;
var purok_6_underweight = <?php echo $p6_underweight_result ?>;
var purok_6_normal_w = <?php echo $p6_normal_h_result ?>;
var purok_6_overweight = <?php echo $p6_overweight_result ?>;



if(purok_6_severely_underweight == 0) {
	
document.getElementById("purok_6_severely_underweight").style.display = "none";
}else {
	
	document.getElementById("purok_6_severely_underweight").style.display = "block";
}


if(purok_6_underweight == 0) {
	
document.getElementById("purok_6_underweight").style.display = "none";
}else {
	
document.getElementById("purok_6_underweight").style.display = "block";
}




if(purok_6_normal_w == 0) {
	
document.getElementById("purok_6_normal_w").style.display = "none";
}else {
	
	document.getElementById("purok_6_normal_w").style.display = "block";
}



if(purok_6_overweight == 0) {
	
document.getElementById("purok_6_overweight").style.display = "none";
}else {
	
document.getElementById("purok_6_overweight").style.display = "block";
}






function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
	document.getElementById("mainfooter").style.marginLeft = "250px";


}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("mainfooter").style.marginLeft = "0";


}

















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


	var viewportwidth_min = 300;
	var viewportwidth_max = 800;
 
 
  var viewportheight_min = 600 ;
  var viewportheight_max = 800;
  
  
  if( viewportwidth_min <=  viewportwidth && viewportwidth <= viewportwidth_max && viewportheight_min <= viewportheight && viewportheight <= viewportheight_max) {
	  
	  
	  
	function openNav() {
    document.getElementById("mySidenav").style.width = "525px";
    document.getElementById("main").style.marginLeft = "525px";
	document.getElementById("mainfooter").style.marginLeft = "525px";
	

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


<script src="local_stylesheet/jquery-1.9.1.min.js">


</script>
</body>
</html>