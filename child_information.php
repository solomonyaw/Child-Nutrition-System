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
	<title>Input Child Information</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>


</script>

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
<li><span  class="fa fa-book "></span> <a href="about.php">About </a></li>
<li><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li><span  class="fa fa-exclamation"></span> <a href="announcement.php">Announcement</a></li>
<li class="active"><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
<li><span  class="fa  fa-table "></span> <a href="child_information_table.php">Table</a></li>
<li><span  class="fa fa-map-marker "></span> <a href="spotmap.php">Spot Map </a></li>
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

	<!--TOP BAR USER NAME ENDS HERE-->

<div class="cp_responsive">

<div class="child_information_container">

<span>Enter Child Information</span>

<div class="responsive1">
<div class="child_information_content">

<div class="child_information_input">


<?php 

			global $create_child_information ;
			
			$create_child_information = 0;
			
			if(isset($_POST['submit'])){
				
				$create_child_information = 1;
				
				
		
			$height_input = $_POST['Height'];
			$weight_input = $_POST['Weight'];
			$age_input = $_POST['Age'];
			$sex_input = $_POST['Sex'];
			
				//UPLOAD THE DATA INTO THE DATABASE
				
					$Name = $_POST['Name'];
					
					
					$show_name = $conn->query("SELECT *FROM child_information WHERE Name='$Name'");
							
							while($row=$show_name ->fetch()){
								
							}
							
							if($show_name->rowCount() > 0 ) {
								
								echo '<script >';
								echo 'alert("Name already in the list.")';
								echo '</script>';
								
							}else {
					
					
					
					$Age  = $_POST['Age'];
					$Sex  = $_POST['Sex'];
					$Address  = $_POST['Address'];
					$Height = $_POST['Height'];
					$Weight = $_POST['Weight'];
					$Guardian = $_POST['Guardian'];
					


if ($sex_input == "Male"){

// CHILD GROWTH STANDARD TABLE HEIGHT (BOY) ////////////////////////////////////////////////////////////////////////////////////////////////////////////

//ZERO severely STUNDED
$b_h_zero_severely_stunted= 44.1;

//ZERO STUNDED
$b_h_zero_stunted_min = 44.2;
$b_h_zero_stunted_max = 46.0;

//ZERO NORMAL 
$b_h_zero_normal_min = 46.1;
$b_h_zero_normal_max = 53.7;

//ZERO TALL
$b_h_zero_tall = 53.8;

//ONE severely STUNDED
$b_h_one_severely_stunted= 48.8;

//ONE STUNDED
$b_h_one_stunted_min = 48.9;
$b_h_one_stunted_max = 50.7;

//ONE NORMAL 
$b_h_one_normal_min = 50.8;
$b_h_one_normal_max = 58.6;

//ONE TALL
$b_h_one_tall = 58.7;

//TWO severely STUNDED
$b_h_two_severely_stunted= 52.3;

//TWO STUNDED
$b_h_two_stunted_min = 52.4;
$b_h_one_stunted_max = 54.3;

//TWO NORMAL 
$b_h_two_normal_min = 54.4;
$b_h_two_normal_max = 62.4;

//TWO TALL
$b_h_two_tall = 62.5;


//3 severely STUNDED
$b_h_three_severely_stunted= 55.2;

//3 STUNTED 
$b_h_three_stunted_min = 55.3;
$b_h_three_stunted_max = 57.2;

//3 NORMAL
$b_h_three_normal_min = 57.3;
$b_h_three_normal_max = 65.5;

//3 TALL
$b_h_three_tall = 65.6;


//4 severely STUNDED
$b_h_four_severely_stunted= 57.5;

//4 STUNDED
$b_h_four_stunted_min = 57.6;
$b_h_four_stunted_max  = 59.6;

//4 NORMAL
$b_h_four_normal_min = 59.7;
$b_h_four_normal_max = 68.0;

//4 TALL
$b_h_four_tall = 68.1;

//5 severely STUNDED
$b_h_five_severely_stunted= 59.5;

//5 STUNTED 
$b_h_five_stunted_min = 59.6;
$b_h_five_stunted_max = 61.6;

//5 NORMAL 
$b_h_five_normal_mix = 61.7;
$b_h_five_normal_max = 70.1;

//5 TALL
$b_h_five_tall = 70.2;

//6 severely STUNTED 
$b_h_six_severely_stunted= 61.1;

//6 STUNTED  
$b_h_six_stunted_min = 61.2;
$b_h_six_stunted_max = 63.2;

//6 NORMAL 
$b_h_six_normal_min = 63.3;
$b_h_six_normal_max = 71.9;

//6 TALL 
$b_h_six_tall = 72.0;

//7 severely STUNDED
$b_h_seven_severely_stunted= 62.6;

//7 STUNTED 
$b_h_seven_stunted_min = 62.7;
$b_h_seven_stunted_max = 64.7;

//7 NORMAL 
$b_h_seven_normal_min = 64.8;
$b_h_seven_normal_max = 73.5;

//7 TALL 
$b_h_seven_tall = 73.6;

//8 severely STUNDED
$b_h_eight_severely_stunted= 63.9;

//8 STUNDED
$b_h_eight_stunted_min = 64.0;
$b_h_eight_stunted_max = 66.1;

//8 NORMAL 
$b_h_eight_normal_min = 66.2;
$b_h_eight_normal_max = 75.0;

//8 TALL 
$b_h_eight_tall = 75.1;

//9 severely STUNTED 
$b_h_nine_severely_stunted= 65.1;

//9 STUNDED
$b_h_nine_stunted_min = 65.2;
$b_h_nine_stunted_max = 67.4;

//9 NORMAL
$b_h_nine_normal_min = 67.5;
$b_h_nine_normal_max = 76.5;

//9 TALL
$b_h_nine_tall = 76.6;

//10 severely STUNTED 
$b_h_ten_severely_stunted= 66.3;

//10 STUNDED
$b_h_ten_stunted_min = 66.4;
$b_h_ten_stunted_max  = 68.6;

//10 NORMAL 
$b_h_ten_normal_min = 68.7;
$b_h_ten_normal_max = 77.9;

//10 TALL 
$b_h_ten_tall = 78.0;

//11 severely STUNDED
$b_h_eleven_severely_stunted= 67.5;

//11 STUNTED 
$b_h_eleven_stunted_min = 67.6;
$b_h_eleven_stunted_max = 69.8;

//11 NORMAL 
$b_h_eleven_normal_min = 69.9;
$b_h_eleven_normal_max = 79.2;

//11 TALL
$b_h_eleven_tall = 79.3;

//12 severely STUNDED
$b_h_twelve_severely_stunted= 68.5;

//12 STUNTED 
$b_h_twelve_stunted_min = 68.6;
$b_h_twelve_stunted_max = 70.9;

//12 NORMAL
$b_h_twelve_normal_min = 71.0;
$b_h_twelve_normal_max = 80.5;

//12 TALL 
$b_h_twelve_tall = 80.6;

//13 severely STUNDED
$b_h_thirteen_severely_stunted= 69.5;

//13 STUNDED
$b_h_thirteen_stunted_min = 69.6;
$b_h_thirteen_stunted_max = 72.0;

//13 NORMAL 
$b_h_thirteen_normal_min = 72.1;
$b_h_thirteen_normal_max = 81.8;

//13 TALL
$b_h_thirteen_tall = 81.9;

//14 severely STUNTED 
$b_h_fourteen_severely_stunted= 70.5;


//14 STUNDED
$b_h_fourteen_stunted_min = 70.6;
$b_h_fourteen_stunted_max = 73.0;

//14 NORMAL 
$b_h_fourteen_normal_min = 73.1;
$b_h_fourteen_normal_max = 83.0;

//14 TALL
$b_h_fourteen_tall = 83.1;

//15 severely STUNDED
$b_h_fifteen_severely_stunted= 71.5;

//15 STUNDED
$b_h_fifteen_stunted_min = 71.6;
$b_h_fifteen_stunted_max = 74.0;

//15 NORMAL 
$b_h_fifteen_normal_min = 74.1;
$b_h_fifteen_normal_max = 84.2;

//15 TALL 
$b_h_fifteen_tall = 84.3;

//16 severely STUNTED 
$b_h_sixteen_severely_stunted= 72.4;

//16 STUNDED
$b_h_sixteen_stunted_min = 72.5;
$b_h_sixteen_stunted_max = 74.9;

//16 NORMAL 
$b_h_sixteen_normal_min = 75.0;
$b_h_sixteen_normal_max = 85.4;

//16 TALL 
$b_h_sixteen_tall = 85.5;

//17 severely STUNTED 
$b_h_seventeen_severely_stunted= 73.2;

//17 STUNTED 
$b_h_seventeen_stunted_min = 73.3;
$b_h_seventeen_stunted_max = 75.9;

//17 NORMAL 
$b_h_seventeen_normal_min = 76.0;
$b_h_seventeen_normal_max = 86.5;

//17 TALL 
$b_h_seventeen_tall = 86.6;

//18 severely STUNTED 
$b_h_eighteen_severely_stunted= 74.1;

//18 STUNDED
$b_h_eighteen_stunted_min = 74.2;
$b_h_eighteen_stunted_max = 76.8;

//18 NORMAL 
$b_h_eighteen_normal_min = 76.9;
$b_h_eighteen_normal_max = 87.7;

//18 TALL 
$b_h_eighteen_tall = 87.8;

//19 severely STUNTED 
$b_h_nineteen_severely_stunted= 74.9;

//19 STUNTED 
$b_h_nineteen_stunted_min = 75.0;
$b_h_nineteen_stunted_max = 77.6;

//19 NORMAL 
$b_h_nineteen_normal_min = 77.7;
$b_h_nineteen_normal_max = 88.8;

//19 TALL 
$b_h_nineteen_tall = 88.9;

//20 severely STUNDED
$b_h_twenty_severely_stunted= 75.7;

//20 STUNDED
$b_h_twenty_stunted_min = 75.8;
$b_h_twenty_stunted_max = 78.5;

//20 NORMAL 
$b_h_twenty_normal_min = 78.6;
$b_h_twenty_normal_max = 89.8;

//20 TALL 
$b_h_twenty_tall = 89.9;

//21 severely STUNDED
$b_h_twentyone_severely_stunted= 76.4;

//21 STUNTED 
$b_h_twentyone_stunted_min = 76.5;
$b_h_twentyone_stunted_max = 79.3;

//21 NORMAL 
$b_h_twentyone_normal_min = 79.4;
$b_h_twentyone_normal_max = 90.9;

//21 TALL 
$b_h_twentyone_tall = 91.0;

//22 severely STUNDED
$b_h_twentytwo_severely_stunted= 77.1;

//22 STUNDED
$b_h_twentytwo_stunted_min = 77.2;
$b_h_twentytwo_stunted_max = 80.1;

//22 NORMAL 
$b_h_twentytwo_normal_min = 80.2;
$b_h_twentytwo_normal_max = 91.9;

//22 TALL
$b_h_twentytwo_tall = 92.0;

//23 severely STUNDED
$b_h_twentythree_severely_stunted= 77.9;

//23 STUNDED
$b_h_twentythree_stunted_min = 78.0;
$b_h_twentythree_stunted_max = 80.9;

//23 NORMAL
$b_h_twentythree_normal_min = 81.0;
$b_h_twentythree_normal_max = 92.9;

//23 TALL 
$b_h_twentythree_tall = 93.0;

//24 severely STUNDED
$b_h_twentyfour_severely_stunted= 77.9;

//24 STUNDED
$b_h_twenty_stunted_min = 78.0;
$b_h_twenty_stunted_max = 80.9;

//24 NORMAL 
$b_h_twenty_normal_min = 81.0;
$b_h_twenty_normal_max = 93.2;

//24 TALL 
$b_h_twenty_tall = 93.3;

//25 severely STUNDED
$b_h_twentyfive_severely_stunted= 78.5;

//25 STUNTED 
$b_h_twentyfive_stunted_min = 78.6;
$b_h_twentyfive_stunted_max = 81.6;

//25 NORMAL 
$b_h_twentyfive_normal_min = 81.7;
$b_h_twentyfive_normal_max = 94.2;

//25 TALL
$b_h_twentyfive_tall = 94.3;

//26 severely STUNDED
$b_h_twentysix_severely_stunted= 79.2;

//26 STUNDED
$b_h_twentysix_stunted_min = 79.3;
$b_h_twentysix_stunted_max = 82.4;

//26 NORMAL
$b_h_twentysix_normal_min = 82.5;
$b_h_twentysix_normal_max = 95.2;

//26 TALL
$b_h_twentysix_tall = 95.3;

//27 severely STUNDED
$b_h_twentyseven_severely_stunted= 79.8;

//27 STUNTED 
$b_h_twenty_stunted_min = 79.9;
$b_h_twenty_stunted_max = 83.0;

//27 NORMAL
$b_h_twenty_normal_min = 83.1;
$b_h_twenty_normal_max = 96.1;

//27 TALL
$b_h_twenty_tall = 96.2;

//28 severely STUNTED 
$b_h_twentyeight_severely_stunted= 80.4;

//28 STUNDED
$b_h_twentyeight_stunted_min = 80.5;
$b_h_twentyeight_stunted_max = 83.7;

//28 NORMAL
$b_h_twentyeight_normal_min = 83.8;
$b_h_twentyeight_normal_max = 97.0;

//28 TALL
$b_h_twentyeight_tall = 97.1;

//29 severely STUNDED
$b_h_twentynine_severely_stunted= 81.0;

//29 STUNDED
$b_h_twentynine_stunted_min = 81.1;
$b_h_twentynine_stunted_max = 84.4;

//29 NORMAL
$b_h_twentynine_normal_min = 84.5;
$b_h_twentynine_normal_max = 97.9;

//29 TALL 
$b_h_twentynine_tall = 9.0;

//30 severely STUNDED
$b_h_thirty_severely_stunted= 81.6;

//30 STUNDED
$b_h_thirty_stunted_min = 81.7;
$b_h_thirty_stunted_max = 85.0;

//30 NORMAL
$b_h_thirty_normal_min = 85.1;
$b_h_thirty_normal_max = 98.7;

//30 TALL 
$b_h_thirty_tall = 98.8;

//31 severely STUNDED
$b_h_thirtyone_severely_stunted= 82.2;

//31 STUNDED
$b_h_thirtyone_stunted_min = 82.3;
$b_h_thirtyone_stunted_max = 85.6;

//31 NORMAL
$b_h_thirtyone_normal_min = 85.7;
$b_h_thirtyone_normal_max = 99.6;

//31 TALL 
$b_h_thirtyone_tall = 99.7;

//32 severely STUNTED 
$b_h_thirtytwo_severely_stunted= 82.7;

//32 STUNDED
$b_h_thirtytwo_stunted_min = 82.8;
$b_h_thirtytwo_stunted_max = 86.3;

//32 NORMAL
$b_h_thirtytwo_normal_min = 86.4;
$b_h_thirtytwo_normal_max = 100.4;

//32 TALL
$b_h_thirtytwo_tall = 100.5;

//33 severely STUNTED 
$b_h_thirtythree_severely_stunted= 83.3;

//33 STUNTED 
$b_h_thirtythree_stunted_min = 83.4;
$b_h_thirtythree_stunted_max = 86.8;

//33 NORMAL
$b_h_thirtythree_normal_min = 86.9;
$b_h_thirtythree_normal_max = 101.2;

//33 TALL 
$b_h_thirtythree_tall = 101.3;

//34 severely STUNDED
$b_h_thirtyfour_severely_stunted= 83.8;

//34 STUNTED 
$b_h_thirtyfour_stunted_min = 83.9;
$b_h_thirtyfour_stunted_max = 87.4;

//34 NORMAL 
$b_h_thirtyfour_normal_min = 87.5;
$b_h_thirtyfour_normal_max = 102.0;

//34 TALL
$b_h_thirtyfour_tall = 102.1;

//35 severely STUNTED 
$b_h_thirtyfive_severely_stunted= 84.3;

//35 STUNTED 
$b_h_thirtyfive_stunted_min = 84.4;
$b_h_thirtyfive_stunted_max = 88.0;

//35 NORMAL 
$b_h_thirtyfive_normal_min = 88.1;
$b_h_thirtyfive_normal_max = 102.7;

//35 TALL
$b_h_thirtyfive_tall = 102.8;

//36 severely STUNDED
$b_h_thirtysix_severely_stunted= 84.9;

//36 STUNDED
$b_h_thirtysix_stunted_min = 85.0;
$b_h_thirtysix_stunted_max = 88.6;

//36 NORMAL
$b_h_thirtysix_normal_min = 88.7;
$b_h_thirtysix_normal_max = 103.5;

//36 TALL
$b_h_thirtysix_tall = 103.6;

//37 severely STUNDED
$b_h_thirtyseven_severely_stunted= 85.4;

//37 STUNDED
$b_h_thirtyseven_stunted_min = 85.5;
$b_h_thirtyseven_stunted_max = 89.1;

//37 NORMAL 
$b_h_thirtyseven_normal_min = 89.2;
$b_h_thirtyseven_normal_max = 104.2;

//37 TALL 
$b_h_thirtyseven_tall = 104.5;

//38 severely STUNTED 
$b_h_thirtyeight_severely_stunted= 85.9;

//38 STUNDED
$b_h_thirtyeight_stunted_min = 86.0;
$b_h_thirtyeight_stunted_max = 89.7;

//38 NORMAL 
$b_h_thirtyeight_normal_min = 89.8;
$b_h_thirtyeight_normal_max = 105.0;

//38 TALL 
$b_h_thirtyeight_tall = 105.1;

//39 severely STUNDED
$b_h_thirtynine_severely_stunted= 86.4;

//39 STUNDED
$b_h_thirtynine_stunted_min = 86.5;
$b_h_thirtynine_stunted_max = 90.2;

//39 NORMAL
$b_h_thirtynine_normal_min = 90.3;
$b_h_thirtynine_normal_max = 105.7;

//39 TALL
$b_h_thirtynine_tall = 105.8;


//40 severely STUNDED
$b_h_fourty_severely_stunted= 86.9;


//40 STUNDED
$b_h_fourty_stunted_min = 87.0;
$b_h_fourty_stunted_max = 90.8;

//40 NORMAL
$b_h_fourty_normal_min = 90.9;
$b_h_fourty_normal_max = 106.4;

//40 TALL 
$b_h_fourty_tall = 106.5;

//41 severely STUNDED
$b_h_fourtyone_severely_stunted= 87.4;

//41 STUNTED 
$b_h_fourtyone_stunted_min = 87.5;
$b_h_fourtyone_stunted_max = 91.3;

//41 NORMAL 
$b_h_fourtyone_normal_min = 91.4;
$b_h_fourtyone_normal_max = 107.1;

//41 TALL
$b_h_fourtyone_tall = 107.2;

//42 severely STUNDED
$b_h_fourtytwo_severely_stunted= 87.9;

//42 STUNTED 
$b_h_fourtytwo_stunted_min = 88.0;
$b_h_fourtytwo_stunted_max = 91.8;

//42 NORMAL 
$b_h_fourtytwo_normal_min = 91.9;
$b_h_fourtytwo_normal_max = 107.8;

//42 TALL
$b_h_fourtytwo_tall = 107.9;

//43 severely STUNDED
$b_h_fourtythree_severely_stunted= 88.3;

//43 STUNDED
$b_h_fourtythree_stunted_min = 88.4;
$b_h_fourtythree_stunted_max = 92.3;

//43 NORMAL 
$b_h_fourtythree_normal_min = 92.4;
$b_h_fourtythree_normal_max = 108.5;

//43 TALL 
$b_h_fourtythree_tall = 108.6;

//44 severely STUNDED
$b_h_fourtyfour_severely_stunted= 88.8;

//44 STUNTED 
$b_h_fourtyfour_stunted_min = 88.9;
$b_h_fourtyfour_stunted_max = 92.9;

//44 NORMAL 
$b_h_fourtyfour_normal_min = 93.0;
$b_h_fourtyfour_normal_max = 109.1;

//44 TALL
$b_h_fourtyfour_tall = 109.2;

//45 severely STUNTED 
$b_h_fourtyfive_severely_stunted= 89.3;

//45 STUNDED
$b_h_fourtyfive_stunted_min = 89.4;
$b_h_fourtyfive_stunted_max = 93.4;

//45 NORMAL 
$b_h_fourtyfive_normal_min = 93.5;
$b_h_fourtyfive_normal_max = 109.8;

//45 TALL
$b_h_fourtyfive_tall = 109.9;

//46 severely STUNTED 
$b_h_fourtyfive_severely_stunted= 89.7;

//46 STUNDED
$b_h_fourtysix_stunted_min = 89.8;
$b_h_fourtysix_stunted_max = 93.9;

//46 NORMAL 
$b_h_fourtysix_normal_min = 94.0;
$b_h_fourtysix_normal_max = 110.4;

//46 TALL
$b_h_fourtysix_tall = 110.5;

//47 severely STUNDED
$b_h_fourtyseven_severely_stunted= 90.2;

//47 STUNTED 
$b_h_fourtyseven_stunted_min = 90.3;
$b_h_fourtyseven_stunted_max = 94.3;

//47 NORMAL 
$b_h_fourtyseven_normal_min = 94.4;
$b_h_fourtyseven_normal_max = 111.1;

//47 TALL 
$b_h_fourtyseven_tall = 111.2;


//48 severely STUNDED
$b_h_fourtyeight_severely_stunted= 90.6;

//48 STUNDED
$b_h_fourtyeight_stunted_min = 90.7;
$b_h_fourtyeight_stunted_max = 94.8;

//48 NORMAL
$b_h_fourtyeight_normal_min = 94.9;
$b_h_fourtyeight_normal_max = 111.7;

//48 TALL
$b_h_fourtyeight_tall = 111.8;

//49 severely STUNTED 
$b_h_fourtynine_severely_stunted= 91.1;

//49 STUNDED
$b_h_fourtynine_stunted_min = 91.2;
$b_h_fourtynine_stunted_max = 95.3;

//49 NORMAL 
$b_h_fourtynine_normal_min = 95.4;
$b_h_fourtynine_normal_max = 112.4;

//49 TALL
$b_h_fourtynine_tall = 112.5;

//50 severely STUNTED 
$b_h_fiftty_severely_stunted= 91.5;

//50 STUNDED
$b_h_fifty_stunted_min = 91.6;
$b_h_fifty_stunted_max = 95.8;

//50 NORMAL
$b_h_fifty_normal_min = 95.9;
$b_h_fifty_normal_max = 113.0;

//50 TALL
$b_h_fifty_tall = 113.1;

//51 severely STUNTED 
$b_h_fiftyone_severely_stunted= 92.0;

//51 STUNDED
$b_h_fiftyone_stunted_min = 92.1;
$b_h_fiftyone_stunted_max = 96.3;

//51 NORMAL
$b_h_fiftyone_normal_min = 96.4;
$b_h_fiftyone_normal_max = 113.6;

//51 TALL
$b_h_fiftyone_tall = 113.7;

//52 severely STUNDED
$b_h_fiftytwo_severely_stunted= 92.4;


//52 STUNDED
$b_h_fiftytwo_stunted_min = 92.5;
$b_h_fiftytwo_stunted_max = 96.8;

//52 NORMAL
$b_h_fiftytwo_normal_min = 96.9;
$b_h_fiftytwo_normal_max = 114.2;

//52 TALL
$b_h_fiftytwo_tall = 114.2;

//53 severely STUNDED
$b_h_fiftythree_severely_stunted= 92.9;

//53 STUNDED
$b_h_fiftythree_stunted_min = 93.0;
$b_h_fiftythree_stunted_max = 97.3;

//53 NORMAL 
$b_h_fiftythree_normal_min = 97.4;
$b_h_fiftythree_normal_max = 114.9;

//53 TALL
$b_h_fiftythree_tall = 115.0;

//54 severely STUNTED 
$b_h_fiftyfour_severely_stunted= 93.3;

//54 STUNDED
$b_h_fiftyfour_stunted_min = 93.4;
$b_h_fiftyfour_stunted_max = 97.7;

//54 NORMAL 
$b_h_fiftyfour_normal_min = 97.8;
$b_h_fiftyfour_normal_max = 115.5;

//54 TALL
$b_h_fiftyfour_tall = 115.6;

//55 severely STUNTED 
$b_h_fiftyfive_severely_stunted= 93.8;

//55 STUNDED
$b_h_fiftyfive_stunted_min = 93.9;
$b_h_fiftyfive_stunted_max = 98.2;

//55 NORMAL 
$b_h_fiftyfive_normal_min = 98.3;
$b_h_fiftyfive_normal_max = 116.1;

//55 TALL 
$b_h_fiftyfive_tall = 116.2;

//56 severely STUNTED 
$b_h_fiftysix_severely_stunted= 94.2;

//56 STUNDED
$b_h_fiftysix_stunted_min = 94.3;
$b_h_fiftysix_stunted_max = 98.7;

//56 NORMAL
$b_h_fiftysix_normal_min = 98.8;
$b_h_fiftysix_normal_max = 116.7;

//56 TALL
$b_h_fiftysix_tall = 116.8;

//57 severely STUNTED 
$b_h_fiftyseven_severely_stunted= 94.6;

//57 STUNTED 
$b_h_fiftyseven_stunted_min = 94.7;
$b_h_fiftyseven_stunted_max = 99.2;

//57 NORMAL
$b_h_fiftyseven_normal_min = 99.3;
$b_h_fiftyseven_normal_max = 117.4;

//57 TALL
$b_h_fiftyseven_tall = 117.5;

//58 severely STUNDED
$b_h_fiftyeight_severely_stunted= 95.1;

//58 STUNTED 
$b_h_fiftyeight_stunted_min = 95.2;
$b_h_fiftyeight_stunted_max = 99.6;

//58 NORMAL
$b_h_fiftyeight_normal_min = 99.7;
$b_h_fiftyeight_normal_max = 118.0;

//58 TALL
$b_h_fiftyeight_tall = 118.1;

//59 severely STUNDED
$b_h_fiftynine_severely_stunted= 95.5;

//59 STUNDED
$b_h_fiftynine_stunted_min = 95.6;
$b_h_fiftynine_stunted_max = 100.1;

//59 NORMAL
$b_h_fiftynine_normal_min = 100.2;
$b_h_fiftynine_normal_max = 118.6;

//59 TALL
$b_h_fiftynine_tall = 118.6;

//60 severely STUNDED
$b_h_sixty_severely_stunted= 96.0;

//60 STUNDED
$b_h_sixty_stunted_min = 96.1;
$b_h_sixty_stunted_max = 100.6;

//60 NORMAL
$b_h_sixty_normal_min = 100.7;
$b_h_sixty_normal_max = 119.2;

//60 TALL 
$b_h_sixty_normal_tall = 119.3;


//61 severely STUNTED 
$b_h_sixtyone_severely_stunted= 96.4;

//61 STUNDED
$b_h_sixtyone_stunted_min = 96.5;
$b_h_sixtyone_stunted_max = 101.0;

//61 NORMAL
$b_h_sixtyone_normal_min = 101.1;
$b_h_sixtyone_normal_max = 119.4;

//61 TALL 
$b_h_sixtyone_tall = 119.5;

//62 severely STUNDED
$b_h_sixtytwo_severely_stunted= 96.8;

//62 STUNTED 
$b_h_sixtytwo_stunted_min = 96.9;
$b_h_sixtytwo_stunted_max = 101.5;

//62 NORMAL 
$b_h_sixtytwo_normal_min = 101.6;
$b_h_sixtytwo_normal_max = 120.0;

//62 TALL
$b_h_sixtytwo_tall = 120.1;

//63 severely STUNTED 
$b_h_sixtythree_severely_stunted= 97.3;

//63 STUNDED
$b_h_sixtythree_stunted_min = 97.4;
$b_h_sixtythree_stunted_max = 101.9;

//63 NORMAL 
$b_h_sixtythree_normal_min = 102.0;
$b_h_sixtythree_normal_max = 120.6;

//63 TALL 
$b_h_sixtythree_tall = 120.7;

//64 severely STUNDED
$b_h_sixtyfour_severely_stunted= 97.7;

//64 STUNDED
$b_h_sixtyfour_stunted_min = 97.8;
$b_h_sixtyfour_stunted_max = 102.4;

//64 NORMAL
$b_h_sixtyfour_normal_min = 102.5;
$b_h_sixtyfour_normal_max = 121.2;

//64 TALL
$b_h_sixtyfour_tall = 121.3;

//65 severely STUNTED 
$b_h_sixtyfive_severely_stunted= 98.1;

//65 STUNTED 
$b_h_sixtyfive_stunted_min = 98.2;
$b_h_sixtyfive_stunted_max = 102.9;

//65 NORMAL 
$b_h_sixtyfive_normal_min = 103.0;
$b_h_sixtyfive_normal_five = 121.8;

//65 TALL 
$b_h_sixtyfive_tall = 121.9;

//66 severely STUNTED 
$b_h_sixtysix_severely_stunted= 98.6;

//66 STUNTED 
$b_h_sixtysix_stunted_min = 98.7;
$b_h_sixtysix_stunted_max = 103.3;

//66 NORMAL 
$b_h_sixtysix_normal_min = 103.4;
$b_h_sixtysix_normal_max = 122.4;

//66 TALL 
$b_h_sixtysix_tall = 122.5;

//67 severely STUNDED
$b_h_sixtyseven_severely_stunted= 99.0;

//67 STUNTED 
$b_h_sixtyseven_stunted_min = 99.1;
$b_h_sixtyseven_stunted_max = 103.8;

//67 NORMAL 
$b_h_sixtyseven_normal_min = 103.9;
$b_h_sixtyseven_normal_max = 123.0;

//67 TALL
$b_h_sixtyseven_tall = 123.1;

//68 severely STUNDED
$b_h_sixtyeight_severely_stunted= 99.4;

//68 STUNDED
$b_h_sixtyeight_stunted_min = 99.5;
$b_h_sixtyeight_stunted_max = 104.2;

//68 NORMAL 
$b_h_sixtyeight_normal_min = 104.3;
$b_h_sixtyeight_normal_max = 123.6;

//68 TALL
$b_h_sixtyeight_tall = 123.7;

//69 severely STUNDED
$b_h_sixtynine_severely_stunted= 99.8;

//69 STUNDED
$b_h_sixtynine_stunted_min = 99.9;
$b_h_sixtynine_stunted_max = 104.7;

//69 NORMAL 
$b_h_sixtynine_normal_min = 104.8;
$b_h_sixtynine_normal_max = 124.1;

//69 TALL
$b_h_sixtynine_tall = 124.2;

//70 severely STUNTED 
$b_h_seventy_severely_stunted= 100.3;

//70 STUNDED
$b_h_seventy_stunted_min = 100.4;
$b_h_seventy_stunted_max = 105.1;

//70 NORMAL 
$b_h_seventy_normal_min = 105.2;
$b_h_seventy_normal_max = 124.7;

//70 TALL
$b_h_seventy_tall = 124.8;

//71 severely STUNTED 
$b_h_seventyone_severely_stunted= 100.7;

//71 STUNDED
$b_h_seventyone_stunted_min = 100.8;
$b_h_seventyone_stunted_max = 105.6;

//71 NORMAL 
$b_h_seventyone_normal_min = 105.7;
$b_h_seventyone_normal_max = 125.2;

//71 TALL
$b_h_seventyone_tall = 125.3;




switch($age_input){
	
	
	case 0:
	
		if($height_input == $b_h_zero_severely_stunted){

		$b_h_status = "Severely Stunted";


		}else if($b_h_zero_stunted_min <= $height_input && $height_input <= $b_h_zero_stunted_max) {

		$b_h_status = "Stunted";


		}else if($b_h_zero_normal_min  <= $height_input && $height_input <= $b_h_zero_normal_max) {

		$b_h_status = "Normal";
	

		}else if($height_input >= $b_h_zero_tall){

		$b_h_status = "Tall";


		} else {

		$b_h_status = "Invalid Height";


		}

		break;
		
	case 1:
	
		if($height_input == $b_h_one_severely_stunted){

		$b_h_status = "severely Stunded";


		}else if($b_h_one_stunted_min <= $height_input && $height_input <= $b_h_one_stunted_max) {

		$g_h_status= "Stunted";

		}else if($b_h_one_normal_min   <= $height_input && $height_input <= $b_h_one_normal_max) {

		$b_h_status = "Normal";
	
		}else if($height_input >= $b_h_one_tall){

		$b_h_status = "Tall";

		} else {

		$b_h_status = "Invalid Height";

		}

	
		break;	
	
	case 2:
	
		if($height_input == $b_h_two_severely_stunted){

		$b_h_status = "Severely Stunted";

	

		}else if($b_h_two_stunted_min <= $height_input && $height_input <= $b_h_two_stunted_max) {

		$g_h_status= "Stunted";

	

		}else if($b_h_two_normal_min   <= $height_input && $height_input <= $b_h_two_normal_max) {

		$b_h_status = "Normal";



		}else if($height_input >= $b_h_two_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 3:
		
		if($height_input == $b_h_three_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_three_stunted_min <= $height_input && $height_input <= $b_h_three_stunted_max) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_three_normal_min   <= $height_input && $height_input <= $b_h_three_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_three_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 4:
	
		if($height_input == $b_h_four_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_four_stunted_min <= $height_input && $height_input <= $b_h_four_stunted_max) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_four_normal_min   <= $height_input && $height_input <= $b_h_four_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_four_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 5:
	
		if($height_input == $b_h_five_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_five_stunted_min <= $height_input && $height_input <= $b_h_five_stunted_max) {

		$b_h_status= "Stunted";

		
	

		}else if($b_h_five_normal_mix   <= $height_input && $height_input <= $b_h_five_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_five_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 6:
		
		if($height_input == $b_h_six_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_six_stunted_min <= $height_input && $height_input <= $b_h_six_stunted_max) {

		$b_h_status= "Stunted";

		
	

		}else if($b_h_six_normal_min   <= $height_input && $height_input <= $b_h_six_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_six_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";


		}	
		
		break;
		
	case 7:
	
		if($height_input == $b_h_seven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_seven_stunted_min <= $height_input && $height_input <= $b_h_seven_stunted_max) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_seven_normal_min   <= $height_input && $height_input <= $b_h_seven_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_seven_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 8:
	
		if($height_input == $b_h_eight_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_eight_stunted_min <= $height_input && $height_input <= $b_h_eight_stunted_max) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_eight_normal_min   <= $height_input && $height_input <= $b_h_eight_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_eight_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 9:
	
		if($height_input == $b_h_nine_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_nine_stunted_min <= $height_input && $height_input <= $b_h_nine_stunted_max) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_nine_normal_min   <= $height_input && $height_input <= $b_h_nine_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_nine_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 10:
	
		if($height_input == $b_h_ten_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_ten_stunted_min <= $height_input && $height_input <= $b_h_ten_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_ten_normal_min   <= $height_input && $height_input <= $b_h_ten_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_ten_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 11:
	
		if($height_input == $b_h_eleven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_eleven_stunted_min <= $height_input && $height_input <= $b_h_eleven_stunted_max ) {

		$b_h_status= "Stunted";

		
	

		}else if($b_h_eleven_normal_min   <= $height_input && $height_input <= $b_h_eleven_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_eleven_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	
	case 12:
	
		if($height_input == $b_h_twelve_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twelve_stunted_min <= $height_input && $height_input <= $b_h_twelve_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_eleven_normal_min   <= $height_input && $height_input <= $b_h_twelve_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twelve_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
		
	case 13:
	
		if($height_input == $b_h_thirteen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirteen_stunted_min <= $height_input && $height_input <= $b_h_thirteen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirteen_normal_min   <= $height_input && $height_input <= $b_h_thirteen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirteen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
		
	case 14:
	
		if($height_input == $b_h_fourteen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourteen_stunted_min <= $height_input && $height_input <= $b_h_fourteen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourteen_normal_min   <= $height_input && $height_input <= $b_h_fourteen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourteen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 15:

		if($height_input == $b_h_fifteen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fifteen_stunted_min <= $height_input && $height_input <= $b_h_fifteen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fifteen_normal_min   <= $height_input && $height_input <= $b_h_fifteen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fifteen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 16:

		if($height_input == $b_h_sixteen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixteen_stunted_min <= $height_input && $height_input <= $b_h_sixteen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixteen_normal_min   <= $height_input && $height_input <= $b_h_sixteen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixteen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 17:

		if($height_input == $b_h_seventeen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_seventeen_stunted_min <= $height_input && $height_input <= $b_h_seventeen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_seventeen_normal_min   <= $height_input && $height_input <= $b_h_seventeen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_seventeen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;

	case 18:

		if($height_input == $b_h_eighteen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_eighteen_stunted_min <= $height_input && $height_input <= $b_h_eighteen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_eighteen_normal_min   <= $height_input && $height_input <= $b_h_eighteen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_eighteen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}
	
	
		break;	
		
	case 19:

		if($height_input == $b_h_nineteen_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_nineteen_stunted_min <= $height_input && $height_input <= $b_h_nineteen_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_nineteen_normal_min <= $height_input && $height_input <= $b_h_nineteen_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_nineteen_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 20:

		if($height_input == $b_h_twenty_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twenty_stunted_min <= $height_input && $height_input <= $b_h_twenty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twenty_normal_min <= $height_input && $height_input <= $b_h_twenty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twenty_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	

	case 21:

		if($height_input == $b_h_twentyone_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentyone_stunted_min <= $height_input && $height_input <= $b_h_twentyone_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentyone_normal_min <= $height_input && $height_input <= $b_h_twentyone_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentyone_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;		
	
	case 22:

		if($height_input == $b_h_twentytwo_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentytwo_stunted_min <= $height_input && $height_input <= $b_h_twentytwo_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentytwo_normal_min <= $height_input && $height_input <= $b_h_twentytwo_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentytwo_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 23:

		if($height_input == $b_h_twentythree_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentythree_stunted_min <= $height_input && $height_input <= $b_h_twentythree_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentythree_normal_min <= $height_input && $height_input <= $b_h_twentythree_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentythree_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 24:

		if($height_input == $b_h_twentyfour_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twenty_stunted_min <= $height_input && $height_input <= $b_h_twenty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twenty_normal_min <= $height_input && $height_input <= $b_h_twenty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twenty_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 25:

		if($height_input == $b_h_twentyfive_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentyfive_stunted_min <= $height_input && $height_input <= $b_h_twentyfive_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentyfive_normal_min <= $height_input && $height_input <= $b_h_twentyfive_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentyfive_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 26:

		if($height_input == $b_h_twentysix_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentysix_stunted_min <= $height_input && $height_input <= $b_h_twentysix_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentysix_normal_min <= $height_input && $height_input <= $b_h_twentysix_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentysix_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
		
	case 27:

		if($height_input == $b_h_twentyseven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twenty_stunted_min <= $height_input && $height_input <= $b_h_twenty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twenty_normal_min <= $height_input && $height_input <= $b_h_twenty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twenty_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 28:

		if($height_input == $b_h_twentyeight_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentyeight_stunted_min <= $height_input && $height_input <= $b_h_twentyeight_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentyeight_normal_min <= $height_input && $height_input <= $b_h_twentyeight_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentyeight_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 29:

		if($height_input == $b_h_twentynine_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_twentynine_stunted_min <= $height_input && $height_input <= $b_h_twentynine_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_twentynine_normal_min <= $height_input && $height_input <= $b_h_twentynine_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_twentynine_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 30:

		if($height_input == $b_h_thirty_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirty_stunted_min <= $height_input && $height_input <= $b_h_thirty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirty_normal_min <= $height_input && $height_input <= $b_h_thirty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirty_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 31:

		if($height_input == $b_h_thirtyone_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtyone_stunted_min <= $height_input && $height_input <= $b_h_thirtyone_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtyone_normal_min <= $height_input && $height_input <= $b_h_thirtyone_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtyone_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 32:

		if($height_input == $b_h_thirtytwo_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtytwo_stunted_min <= $height_input && $height_input <= $b_h_thirtytwo_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtytwo_normal_min <= $height_input && $height_input <= $b_h_thirtytwo_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtytwo_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 33:

		if($height_input == $b_h_thirtythree_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtythree_stunted_min <= $height_input && $height_input <= $b_h_thirtythree_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtythree_normal_min <= $height_input && $height_input <= $b_h_thirtythree_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $_h_thirtythree_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	
	case 34:

		if($height_input == $b_h_thirtyfour_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtyfour_stunted_min <= $height_input && $height_input <= $b_h_thirtyfour_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtyfour_normal_min <= $height_input && $height_input <= $b_h_thirtyfour_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtyfour_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
		
	case 35:

		if($height_input == $b_h_thirtyfive_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtyfive_stunted_min <= $height_input && $height_input <= $b_h_thirtyfive_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtyfive_normal_min <= $height_input && $height_input <= $b_h_thirtyfive_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtyfive_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
		
	case 36:

		if($height_input == $b_h_thirtysix_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtysix_stunted_min <= $height_input && $height_input <= $b_h_thirtysix_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtysix_normal_min <= $height_input && $height_input <= $b_h_thirtysix_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtysix_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 37:

		if($height_input == $b_h_thirtyseven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtyseven_stunted_min <= $height_input && $height_input <= $b_h_thirtyseven_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtyseven_normal_min <= $height_input && $height_input <= $b_h_thirtyseven_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtyseven_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 38:

		if($height_input == $b_h_thirtyeight_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtyeight_stunted_min <= $height_input && $height_input <= $b_h_thirtyeight_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtyeight_normal_min <= $height_input && $height_input <= $b_h_thirtyeight_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtyeight_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 39:

		if($height_input == $b_h_thirtynine_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_thirtynine_stunted_min <= $height_input && $height_input <= $b_h_thirtynine_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_thirtynine_normal_min <= $height_input && $height_input <= $b_h_thirtynine_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_thirtynine_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;

	case 40:

		if($height_input == $b_h_fourty_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourty_stunted_min <= $height_input && $height_input <= $b_h_fourty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourty_normal_min <= $height_input && $height_input <= $b_h_fourty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourty_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 41:

		if($height_input == $b_h_fourtyone_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtyone_stunted_min <= $height_input && $height_input <= $_h_fourtyone_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtyone_normal_min <= $height_input && $height_input <= $b_h_fourtyone_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtyone_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 42:

		if($height_input == $b_h_fourtytwo_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtytwo_stunted_min <= $height_input && $height_input <= $b_h_fourtytwo_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtytwo_normal_min <= $height_input && $height_input <= $b_h_fourtytwo_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtytwo_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	

	case 43:

		if($height_input == $b_h_fourtythree_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtythree_stunted_min <= $height_input && $height_input <= $b_h_fourtythree_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtythree_normal_min <= $height_input && $height_input <= $b_h_fourtythree_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtythree_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 44:

		if($height_input == $b_h_fourtyfour_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtyfour_stunted_min <= $height_input && $height_input <= $b_h_fourtyfour_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtyfour_normal_min <= $height_input && $height_input <= $b_h_fourtyfour_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtyfour_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 45:

		if($height_input == $b_h_fourtyfive_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtyfive_stunted_min <= $height_input && $height_input <= $b_h_fourtyfive_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtyfive_normal_min <= $height_input && $height_input <= $b_h_fourtyfive_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtyfive_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 46:

		if($height_input == $b_h_fourtyfive_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtysix_stunted_min <= $height_input && $height_input <= $b_h_fourtysix_stunted_min ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtysix_normal_min <= $height_input && $height_input <= $b_h_fourtysix_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtysix_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	

	case 47:

		if($height_input == $b_h_fourtyseven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtyseven_stunted_min <= $height_input && $height_input <= $b_h_fourtyseven_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtyseven_normal_min <= $height_input && $height_input <= $b_h_fourtyseven_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtyseven_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
		
	
		break;		
	
	case 48:

		if($height_input == $b_h_fourtyeight_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtyeight_stunted_min <= $height_input && $height_input <= $b_h_fourtyeight_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtyeight_normal_min <= $height_input && $height_input <= $b_h_fourtyeight_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtyeight_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 49:

		if($height_input == $b_h_fourtynine_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fourtynine_stunted_min <= $height_input && $height_input <= $b_h_fourtynine_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fourtynine_normal_min <= $height_input && $height_input <= $b_h_fourtynine_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fourtynine_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 50:

		if($height_input == $b_h_fiftty_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fifty_stunted_min <= $height_input && $height_input <= $b_h_fifty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fifty_normal_min <= $height_input && $height_input <= $b_h_fifty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fifty_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 51:

		if($height_input == $b_h_fiftyone_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftyone_stunted_min <= $height_input && $height_input <= $b_h_fiftyone_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftyone_normal_min <= $height_input && $height_input <= $b_h_fiftyone_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftyone_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 52:

		if($height_input == $b_h_fiftytwo_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftytwo_stunted_min <= $height_input && $height_input <= $b_h_fiftytwo_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftytwo_normal_min <= $height_input && $height_input <= $b_h_fiftytwo_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftytwo_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 53:

		if($height_input == $b_h_fiftythree_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftythree_stunted_min <= $height_input && $height_input <= $b_h_fiftythree_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftythree_normal_min <= $height_input && $height_input <= $b_h_fiftythree_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftythree_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 54:

		if($height_input == $b_h_fiftyfour_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftyfour_stunted_min <= $height_input && $height_input <= $b_h_fiftyfour_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftyfour_normal_min <= $height_input && $height_input <= $b_h_fiftyfour_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftyfour_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 55:

		if($height_input == $b_h_fiftyfive_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftyfive_stunted_min <= $height_input && $height_input <= $b_h_fiftyfive_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftyfive_normal_min <= $height_input && $height_input <= $b_h_fiftyfive_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftyfive_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 56:

		if($height_input == $b_h_fiftysix_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftysix_stunted_min <= $height_input && $height_input <= $b_h_fiftysix_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftysix_normal_min <= $height_input && $height_input <= $b_h_fiftysix_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftysix_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 57:

		if($height_input == $b_h_fiftyseven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftyseven_stunted_min <= $height_input && $height_input <= $b_h_fiftyseven_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftyseven_normal_min <= $height_input && $height_input <= $b_h_fiftyseven_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftyseven_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 58:

		if($height_input == $b_h_fiftyeight_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftyeight_stunted_min <= $height_input && $height_input <= $b_h_fiftyeight_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftyeight_normal_min <= $height_input && $height_input <= $b_h_fiftyeight_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftyeight_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 59:

		if($height_input == $b_h_fiftynine_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_fiftynine_stunted_min <= $height_input && $height_input <= $b_h_fiftynine_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_fiftynine_normal_min <= $height_input && $height_input <= $b_h_fiftynine_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_fiftynine_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	
	case 60:

		if($height_input == $b_h_sixty_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixty_stunted_min <= $height_input && $height_input <= $b_h_sixty_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixty_normal_min <= $height_input && $height_input <= $b_h_sixty_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixty_normal_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
		
		
	case 61:

		if($height_input == $b_h_sixtyone_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtyone_stunted_min <= $height_input && $height_input <= $b_h_sixtyone_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtyone_normal_min <= $height_input && $height_input <= $b_h_sixtyone_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtyone_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 62:

		if($height_input == $b_h_sixtytwo_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtytwo_stunted_min <= $height_input && $height_input <= $b_h_sixtytwo_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtytwo_normal_min <= $height_input && $height_input <= $b_h_sixtytwo_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtytwo_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 63:

		if($height_input == $b_h_sixtythree_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtythree_stunted_min <= $height_input && $height_input <= $b_h_sixtythree_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtythree_normal_min <= $height_input && $height_input <= $b_h_sixtythree_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtythree_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 64:

		if($height_input == $b_h_sixtyfour_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtyfour_stunted_min <= $height_input && $height_input <= $b_h_sixtyfour_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtyfour_normal_min <= $height_input && $height_input <= $b_h_sixtyfour_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtyfour_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}			
	
		break;	
	
	case 65:

		if($height_input == $b_h_sixtyfive_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtyfive_stunted_min <= $height_input && $height_input <= $b_h_sixtyfive_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtyfive_normal_min <= $height_input && $height_input <= $b_h_sixtyfive_normal_five) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtyfive_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;

	case 66:

		if($height_input == $b_h_sixtysix_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtysix_stunted_min <= $height_input && $height_input <= $b_h_sixtysix_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtysix_normal_min <= $height_input && $height_input <= $b_h_sixtysix_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtysix_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 67:

		if($height_input == $b_h_sixtyseven_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtyseven_stunted_min <= $height_input && $height_input <= $b_h_sixtyseven_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtyseven_normal_min <= $height_input && $height_input <= $b_h_sixtyseven_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtyseven_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 68:

		if($height_input == $b_h_sixtyeight_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtyeight_stunted_min <= $height_input && $height_input <= $b_h_sixtyeight_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtyeight_normal_min <= $height_input && $height_input <= $b_h_sixtyeight_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtyeight_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;	

	case 69:

		if($height_input == $b_h_sixtynine_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_sixtynine_stunted_min <= $height_input && $height_input <= $b_h_sixtynine_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_sixtynine_normal_min <= $height_input && $height_input <= $b_h_sixtynine_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_sixtynine_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 70:

		if($height_input == $b_h_seventy_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_seventy_stunted_min <= $height_input && $height_input <= $b_h_seventy_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_seventy_normal_min <= $height_input && $height_input <= $b_h_seventy_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_seventy_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 71:

		if($height_input == $b_h_seventyone_severely_stunted){

		$b_h_status = "Severely Stunted";

	
	

		}else if($b_h_seventyone_stunted_min <= $height_input && $height_input <= $b_h_seventyone_stunted_max ) {

		$g_h_status= "Stunted";

		
	

		}else if($b_h_seventyone_normal_min <= $height_input && $height_input <= $b_h_seventyone_normal_max) {

		$b_h_status = "Normal";
	
	


		}else if($height_input >= $b_h_seventyone_tall){

		$b_h_status = "Tall";

	

		} else {

		$b_h_status = "Invalid Height";

	

		}		
	
		break;	
		
		default:
		
		$b_h_status = "Invalid Age";

	
		
			
}


// CHILD GROWTH STANDARD TABLE WEIGHT (BOY) ////////////////////////////////////////////////////////////////////////////////////////////////////////////

//ZERO Severely UNDERWEIGHT
$b_w_zero_severely_underweight = 2.1;

//ZERO UNDERWEIGHT
$b_w_zero_underweight_min = 2.2;
$b_w_zero_underweight_max = 2.4;

//ZERO NORMAL 
$b_w_zero_normal_min = 2.5;
$b_w_zero_normal_max = 4.4;

//ZERO OVERWEIGHT
$b_w_zero_overweight = 4.5;

//ONE  Severely UNDERWEIGHT
$b_w_one_severely_underweight = 2.9;

//ONE UNDERWEIGHT
$b_w_one_underweight_min = 3.0;
$b_w_one_underweight_max = 3.3;

//ONE NORMAL 
$b_w_one_normal_min = 3.4;
$b_w_one_normal_max = 5.8;

//ONE OVERWEIGHT
$b_w_one_overweight = 5.9;


//3  Severely UNDERWEIGHT
$b_w_three_severely_underweight = 4.4;

//3 UNDERWEIGHT 
$b_w_three_underweight_min = 4.5;
$b_w_three_underweight_max = 4.9;

//3 NORMAL
$b_w_three_normal_min = 5.0;
$b_w_three_normal_max = 8.0;

//3 OVERWEIGHT
$b_w_three_overweight = 8.1;


//4  Severely UNDERWEIGHT
$b_w_four_severely_underweight = 4.9;

//4 UNDERWEIGHT
$b_w_four_underweight_min = 5.0;
$b_w_four_underweight_max  = 5.5;

//4 NORMAL
$b_w_four_normal_min = 5.6;
$b_w_four_normal_max = 8.7;

//4 OVERWEIGHT
$b_w_four_overweight = 8.8;

//5  Severely UNDERWEIGHT
$b_w_five_severely_underweight = 5.3;

//5 UNDERWEIGHT 
$b_w_five_underweight_min = 5.4;
$b_w_five_underweight_max = 5.9;

//5 NORMAL 
$b_w_five_normal_mix = 6.0;
$b_w_five_normal_max = 9.3;

//5 OVERWEIGHT
$b_w_five_overweight = 9.4;

//6  Severely UNDERWEIGHT 
$b_w_six_severely_underweight = 5.7;

//6 UNDERWEIGHT  
$b_w_six_underweight_min = 5.8;
$b_w_six_underweight_max = 6.3;

//6 NORMAL 
$b_w_six_normal_min = 6.4;
$b_w_six_normal_max = 9.8;

//6 OVERWEIGHT 
$b_w_six_overweight = 9.9;

//7  Severely UNDERWEIGHT
$b_w_seven_severely_underweight = 5.9;

//7 UNDERWEIGHT 
$b_w_seven_underweight_min = 6.0;
$b_w_seven_underweight_max = 6.6;

//7 NORMAL 
$b_w_seven_normal_min = 6.7;
$b_w_seven_normal_max = 10.3;

//7 OVERWEIGHT 
$b_w_seven_overweight = 10.4;

//8  Severely UNDERWEIGHT
$b_w_eight_severely_underweight = 6.2;

//8 UNDERWEIGHT
$b_w_eight_underweight_min = 6.3;
$b_w_eight_underweight_max = 6.8;

//8 NORMAL 
$b_w_eight_normal_min = 6.9;
$b_w_eight_normal_max = 10.7;

//8 OVERWEIGHT 
$b_w_eight_overweight = 10.8;

//9  Severely UNDERWEIGHT 
$b_w_nine_severely_underweight = 6.4;

//9 UNDERWEIGHT
$b_w_nine_underweight_min = 6.5;
$b_w_nine_underweight_max = 7.0;

//9 NORMAL
$b_w_nine_normal_min = 7.1;
$b_w_nine_normal_max = 11.0;

//9 OVERWEIGHT
$b_w_nine_overweight = 11.1;

//10  Severely UNDERWEIGHT 
$b_w_ten_severely_underweight = 6.6;

//10 UNDERWEIGHT
$b_w_ten_underweight_min = 6.7;
$b_w_ten_underweight_max  = 7.3;

//10 NORMAL 
$b_w_ten_normal_min = 7.4;
$b_w_ten_normal_max = 11.4;

//10 OVERWEIGHT 
$b_w_ten_overweight = 11.5;

//11  Severely UNDERWEIGHT
$b_w_eleven_severely_underweight = 6.8;

//11 UNDERWEIGHT 
$b_w_eleven_underweight_min = 6.9;
$b_w_eleven_underweight_max = 7.5;

//11 NORMAL 
$b_w_eleven_normal_min = 7.6;
$b_w_eleven_normal_max = 11.7;

//11 OVERWEIGHT
$b_w_eleven_overweight = 11.8;

//12  Severely UNDERWEIGHT
$b_w_twelve_severely_underweight = 6.9;

//12 UNDERWEIGHT 
$b_w_twelve_underweight_min = 7.0;
$b_w_twelve_underweight_max = 7.6;

//12 NORMAL
$b_w_twelve_normal_min = 7.7;
$b_w_twelve_normal_max = 12.0;

//12 OVERWEIGHT 
$b_w_twelve_overweight = 12.1;

//13  Severely UNDERWEIGHT
$b_w_thirteen_severely_underweight = 7.1;

//13 UNDERWEIGHT
$b_w_thirteen_underweight_min = 7.2;
$b_w_thirteen_underweight_max = 7.8;

//13 NORMAL 
$b_w_thirteen_normal_min = 7.9;
$b_w_thirteen_normal_max = 12.3;

//13 OVERWEIGHT
$b_w_thirteen_overweight = 12.4;

//14  Severely UNDERWEIGHT 
$b_w_fourteen_severely_underweight = 7.2;


//14 UNDERWEIGHT
$b_w_fourteen_underweight_min = 7.3;
$b_w_fourteen_underweight_max = 8.0;

//14 NORMAL 
$b_w_fourteen_normal_min = 8.1;
$b_w_fourteen_normal_max = 12.6;

//14 OVERWEIGHT
$b_w_fourteen_overweight = 12.7;

//15  Severely UNDERWEIGHT
$b_w_fifteen_severely_underweight = 7.4;

//15 UNDERWEIGHT
$b_w_fifteen_underweight_min = 7.5;
$b_w_fifteen_underweight_max = 8.2;

//15 NORMAL 
$b_w_fifteen_normal_min = 8.3;
$b_w_fifteen_normal_max = 12.8;

//15 OVERWEIGHT 
$b_w_fifteen_overweight = 12.9;

//16  Severely UNDERWEIGHT 
$b_w_sixteen_severely_underweight = 7.5;

//16 UNDERWEIGHT
$b_w_sixteen_underweight_min = 7.6;
$b_w_sixteen_underweight_max = 8.3;

//16 NORMAL 
$b_w_sixteen_normal_min = 8.4;
$b_w_sixteen_normal_max = 13.1;

//16 OVERWEIGHT 
$b_w_sixteen_overweight = 13.2;

//17  Severely UNDERWEIGHT 
$b_w_seventeen_severely_underweight = 7.7;

//17 UNDERWEIGHT 
$b_w_seventeen_underweight_min = 7.8;
$b_w_seventeen_underweight_max = 8.5;

//17 NORMAL 
$b_w_seventeen_normal_min = 8.6;
$b_w_seventeen_normal_max = 13.4;

//17 OVERWEIGHT 
$b_w_seventeen_overweight = 13.5;

//18  Severely UNDERWEIGHT 
$b_w_eighteen_severely_underweight = 7.8;

//18 UNDERWEIGHT
$b_w_eighteen_underweight_min = 7.9;
$b_w_eighteen_underweight_max = 8.7;

//18 NORMAL 
$b_w_eighteen_normal_min = 8.8;
$b_w_eighteen_normal_max = 13.7;

//18 OVERWEIGHT 
$b_w_eighteen_overweight = 13.8;

//19  Severely UNDERWEIGHT 
$b_w_nineteen_severely_underweight = 8.0;

//19 UNDERWEIGHT 
$b_w_nineteen_underweight_min = 8.1;
$b_w_nineteen_underweight_max = 8.8;

//19 NORMAL 
$b_w_nineteen_normal_min = 8.9;
$b_w_nineteen_normal_max = 13.9;

//19 OVERWEIGHT 
$b_w_nineteen_overweight = 14.0;

//20  Severely UNDERWEIGHT
$b_w_twenty_severely_underweight = 8.1;

//20 UNDERWEIGHT
$b_w_twenty_underweight_min = 8.2;
$b_w_twenty_underweight_max = 9.0;

//20 NORMAL 
$b_w_twenty_normal_min = 9.1;
$b_w_twenty_normal_max = 14.2;

//20 OVERWEIGHT 
$b_w_twenty_overweight = 14.3;

//21  Severely UNDERWEIGHT
$b_w_twentyone_severely_underweight =8.2;

//21 UNDERWEIGHT 
$b_w_twentyone_underweight_min = 8.3;
$b_w_twentyone_underweight_max = 9.1;

//21 NORMAL 
$b_w_twentyone_normal_min = 9.2;
$b_w_twentyone_normal_max = 14.5;

//21 OVERWEIGHT 
$b_w_twentyone_overweight = 14.6;

//22  Severely UNDERWEIGHT
$b_w_twentytwo_severely_underweight = 8.4;

//22 UNDERWEIGHT
$b_w_twentytwo_underweight_min = 8.5;
$b_w_twentytwo_underweight_max = 9.3;

//22 NORMAL 
$b_w_twentytwo_normal_min = 9.4;
$b_w_twentytwo_normal_max = 14.7;

//22 OVERWEIGHT
$b_w_twentytwo_overweight = 14.8;

//23  Severely UNDERWEIGHT
$b_w_twentythree_severely_underweight = 8.5;

//23 UNDERWEIGHT
$b_w_twentythree_underweight_min = 8.6;
$b_w_twentythree_underweight_max = 9.4;

//23 NORMAL
$b_w_twentythree_normal_min = 9.5;
$b_w_twentythree_normal_max = 15.0;

//23 OVERWEIGHT 
$b_w_twentythree_overweight = 15.1;

//24  Severely UNDERWEIGHT
$b_w_twentyfour_severely_underweight = 8.6;

//24 UNDERWEIGHT
$b_w_twenty_underweight_min = 8.7;
$b_w_twenty_underweight_max = 9.6;

//24 NORMAL 
$b_w_twenty_normal_min = 9.7;
$b_w_twenty_normal_max = 15.3;

//24 OVERWEIGHT 
$b_w_twenty_overweight = 15.4;

//25  Severely UNDERWEIGHT
$b_w_twentyfive_severely_underweight = 8.8;

//25 UNDERWEIGHT 
$b_w_twentyfive_underweight_min = 8.9;
$b_w_twentyfive_underweight_max = 9.7;

//25 NORMAL 
$b_w_twentyfive_normal_min = 9.8;
$b_w_twentyfive_normal_max = 15.5;

//25 OVERWEIGHT
$b_w_twentyfive_overweight = 15.6;

//26  Severely UNDERWEIGHT
$b_w_twentysix_severely_underweight = 8.9;

//26 UNDERWEIGHT
$b_w_twentysix_underweight_min = 9.0;
$b_w_twentysix_underweight_max = 9.9;

//26 NORMAL
$b_w_twentysix_normal_min = 10.0;
$b_w_twentysix_normal_max = 15.8;

//26 OVERWEIGHT
$b_w_twentysix_overweight = 15.9;

//27  Severely UNDERWEIGHT
$b_w_twentyseven_severely_underweight = 79.8;

//27 UNDERWEIGHT 
$b_w_twenty_underweight_min = 9.0;
$b_w_twenty_underweight_max = 9.1;

//27 NORMAL
$b_w_twenty_normal_min = 10.1;
$b_w_twenty_normal_max = 16.1;

//27 OVERWEIGHT
$b_w_twenty_overweight = 16.2;

//28  Severely UNDERWEIGHT 
$b_w_twentyeight_severely_underweight = 9.1;

//28 UNDERWEIGHT
$b_w_twentyeight_underweight_min = 9.2;
$b_w_twentyeight_underweight_max = 10.1;

//28 NORMAL
$b_w_twentyeight_normal_min = 10.2;
$b_w_twentyeight_normal_max = 16.3;

//28 OVERWEIGHT
$b_w_twentyeight_overweight = 16.4;

//29  Severely UNDERWEIGHT
$b_w_twentynine_severely_underweight = 9.2;

//29 UNDERWEIGHT
$b_w_twentynine_underweight_min = 9.3;
$b_w_twentynine_underweight_max = 10.3;

//29 NORMAL
$b_w_twentynine_normal_min = 10.4;
$b_w_twentynine_normal_max = 16.6;

//29 OVERWEIGHT 
$b_w_twentynine_overweight = 16.7;

//30  Severely UNDERWEIGHT
$b_w_thirty_severely_underweight = 9.4;

//30 UNDERWEIGHT
$b_w_thirty_underweight_min = 9.5;
$b_w_thirty_underweight_max = 10.4;

//30 NORMAL
$b_w_thirty_normal_min = 10.5;
$b_w_thirty_normal_max = 16.9;

//30 OVERWEIGHT 
$b_w_thirty_overweight = 17.0;

//31  Severely UNDERWEIGHT
$b_w_thirtyone_severely_underweight = 9.5;

//31 UNDERWEIGHT
$b_w_thirtyone_underweight_min = 9.6;
$b_w_thirtyone_underweight_max = 10.6;

//31 NORMAL
$b_w_thirtyone_normal_min = 10.7;
$b_w_thirtyone_normal_max = 17.1;

//31 OVERWEIGHT 
$b_w_thirtyone_overweight = 17.2;

//32  Severely UNDERWEIGHT 
$b_w_thirtytwo_severely_underweight = 9.6;

//32 UNDERWEIGHT
$b_w_thirtytwo_underweight_min = 9.7;
$b_w_thirtytwo_underweight_max = 10.7;

//32 NORMAL
$b_w_thirtytwo_normal_min = 10.8;
$b_w_thirtytwo_normal_max = 17.4;

//32 OVERWEIGHT
$b_w_thirtytwo_overweight = 17.5;

//33  Severely UNDERWEIGHT 
$b_w_thirtythree_severely_underweight = 9.7;

//33 UNDERWEIGHT 
$b_w_thirtythree_underweight_min = 9.8;
$b_w_thirtythree_underweight_max = 10.8;

//33 NORMAL
$b_w_thirtythree_normal_min = 10.9;
$b_w_thirtythree_normal_max = 17.6;

//33 OVERWEIGHT 
$b_w_thirtythree_overweight = 17.7;

//34  Severely UNDERWEIGHT
$b_w_thirtyfour_severely_underweight = 9.8;

//34 UNDERWEIGHT 
$b_w_thirtyfour_underweight_min = 9.9;
$b_w_thirtyfour_underweight_max = 10.9;

//34 NORMAL 
$b_w_thirtyfour_normal_min = 11.0;
$b_w_thirtyfour_normal_max = 17.8;

//34 OVERWEIGHT
$b_w_thirtyfour_overweight = 17.9;

//35  Severely UNDERWEIGHT 
$b_w_thirtyfive_severely_underweight = 9.9;

//35 UNDERWEIGHT 
$b_w_thirtyfive_underweight_min = 10.0;
$b_w_thirtyfive_underweight_max = 11.1;

//35 NORMAL 
$b_w_thirtyfive_normal_min = 11.2;
$b_w_thirtyfive_normal_max = 18.1;

//35 OVERWEIGHT
$b_w_thirtyfive_overweight = 18.2;

//36  Severely UNDERWEIGHT
$b_w_thirtysix_severely_underweight = 10.0;

//36 UNDERWEIGHT
$b_w_thirtysix_underweight_min = 10.1;
$b_w_thirtysix_underweight_max = 11.2;

//36 NORMAL
$b_w_thirtysix_normal_min = 11.3;
$b_w_thirtysix_normal_max = 18.3;

//36 OVERWEIGHT
$b_w_thirtysix_overweight = 18.4;

//37  Severely UNDERWEIGHT
$b_w_thirtyseven_severely_underweight = 10.1;

//37 UNDERWEIGHT
$b_w_thirtyseven_underweight_min = 10.2;
$b_w_thirtyseven_underweight_max = 11.3;

//37 NORMAL 
$b_w_thirtyseven_normal_min = 11.4;
$b_w_thirtyseven_normal_max = 18.6;

//37 OVERWEIGHT 
$b_w_thirtyseven_overweight = 18.7;

//38  Severely UNDERWEIGHT 
$b_w_thirtyeight_severely_underweight = 10.2;

//38 UNDERWEIGHT
$b_w_thirtyeight_underweight_min = 10.3;
$b_w_thirtyeight_underweight_max = 11.4;

//38 NORMAL 
$b_w_thirtyeight_normal_min = 11.5;
$b_w_thirtyeight_normal_max = 18.8;

//38 OVERWEIGHT 
$b_w_thirtyeight_overweight = 18.9;

//39  Severely UNDERWEIGHT
$b_w_thirtynine_severely_underweight = 10.3;

//39 UNDERWEIGHT
$b_w_thirtynine_underweight_min = 10.4;
$b_w_thirtynine_underweight_max = 11.5;

//39 NORMAL
$b_w_thirtynine_normal_min = 11.6;
$b_w_thirtynine_normal_max = 19.0;

//39 OVERWEIGHT
$b_w_thirtynine_overweight = 19.1;


//40  Severely UNDERWEIGHT
$b_w_fourty_severely_underweight = 10.4;


//40 UNDERWEIGHT
$b_w_fourty_underweight_min = 10.5;
$b_w_fourty_underweight_max = 11.7;

//40 NORMAL
$b_w_fourty_normal_min = 11.8;
$b_w_fourty_normal_max = 19.3;

//40 OVERWEIGHT 
$b_w_fourty_overweight = 19.4;

//41  Severely UNDERWEIGHT
$b_w_fourtyone_severely_underweight = 10.5;

//41 UNDERWEIGHT 
$b_w_fourtyone_underweight_min = 10.6;
$b_w_fourtyone_underweight_max = 11.8;

//41 NORMAL 
$b_w_fourtyone_normal_min = 11.9;
$b_w_fourtyone_normal_max = 19.5;

//41 OVERWEIGHT
$b_w_fourtyone_overweight = 19.6;

//42  Severely UNDERWEIGHT
$b_w_fourtytwo_severely_underweight = 10.6;

//42 UNDERWEIGHT 
$b_w_fourtytwo_underweight_min = 10.7;
$b_w_fourtytwo_underweight_max = 11.9;

//42 NORMAL 
$b_w_fourtytwo_normal_min = 12.0;
$b_w_fourtytwo_normal_max = 19.7;

//42 OVERWEIGHT
$b_w_fourtytwo_overweight = 19.8;

//43  Severely UNDERWEIGHT
$b_w_fourtythree_severely_underweight = 10.7;

//43 UNDERWEIGHT
$b_w_fourtythree_underweight_min = 10.8;
$b_w_fourtythree_underweight_max = 12.0;

//43 NORMAL 
$b_w_fourtythree_normal_min = 12.1;
$b_w_fourtythree_normal_max = 20.0;

//43 OVERWEIGHT 
$b_w_fourtythree_overweight = 20.1;

//44  Severely UNDERWEIGHT
$b_w_fourtyfour_severely_underweight = 10.8;

//44 UNDERWEIGHT 
$b_w_fourtyfour_underweight_min = 10.9;
$b_w_fourtyfour_underweight_max = 12.1;

//44 NORMAL 
$b_w_fourtyfour_normal_min = 12.2;
$b_w_fourtyfour_normal_max = 20.2;

//44 OVERWEIGHT
$b_w_fourtyfour_overweight = 20.3;

//45  Severely UNDERWEIGHT 
$b_w_fourtyfive_severely_underweight = 10.9;

//45 UNDERWEIGHT
$b_w_fourtyfive_underweight_min = 11.0;
$b_w_fourtyfive_underweight_max = 12.3;

//45 NORMAL 
$b_w_fourtyfive_normal_min = 12.4;
$b_w_fourtyfive_normal_max = 20.5;

//45 OVERWEIGHT
$b_w_fourtyfive_overweight = 20.6;

//46  Severely UNDERWEIGHT 
$b_w_fourtyfive_severely_underweight = 11.0;

//46 UNDERWEIGHT
$b_w_fourtysix_underweight_min = 11.1;
$b_w_fourtysix_underweight_max = 12.4;

//46 NORMAL 
$b_w_fourtysix_normal_min = 12.5;
$b_w_fourtysix_normal_max = 20.7;

//46 OVERWEIGHT
$b_w_fourtysix_overweight = 20.8;

//47  Severely UNDERWEIGHT
$b_w_fourtyseven_severely_underweight = 11.1;

//47 UNDERWEIGHT 
$b_w_fourtyseven_underweight_min = 11.2;
$b_w_fourtyseven_underweight_max = 12.5;

//47 NORMAL 
$b_w_fourtyseven_normal_min = 12.6;
$b_w_fourtyseven_normal_max = 20.9;

//47 OVERWEIGHT 
$b_w_fourtyseven_overweight = 21.0;


//48  Severely UNDERWEIGHT
$b_w_fourtyeight_severely_underweight = 11.2;

//48 UNDERWEIGHT
$b_w_fourtyeight_underweight_min = 11.3;
$b_w_fourtyeight_underweight_max = 12.6;

//48 NORMAL
$b_w_fourtyeight_normal_min = 12.7;
$b_w_fourtyeight_normal_max = 21.2;

//48 OVERWEIGHT
$b_w_fourtyeight_overweight = 21.3;

//49  Severely UNDERWEIGHT 
$b_w_fourtynine_severely_underweight = 11.3;

//49 UNDERWEIGHT
$b_w_fourtynine_underweight_min = 11.4;
$b_w_fourtynine_underweight_max = 12.7;

//49 NORMAL 
$b_w_fourtynine_normal_min = 12.8;
$b_w_fourtynine_normal_max = 21.4;

//49 OVERWEIGHT
$b_w_fourtynine_overweight = 21.5;

//50  Severely UNDERWEIGHT 
$b_w_fiftty_severely_underweight = 11.4;

//50 UNDERWEIGHT
$b_w_fifty_underweight_min = 11.5;
$b_w_fifty_underweight_max = 12.8;

//50 NORMAL
$b_w_fifty_normal_min = 12.9;
$b_w_fifty_normal_max = 21.7;

//50 OVERWEIGHT
$b_w_fifty_overweight = 21.8;

//51  Severely UNDERWEIGHT 
$b_w_fiftyone_severely_underweight = 11.5;

//51 UNDERWEIGHT
$b_w_fiftyone_underweight_min = 11.6;
$b_w_fiftyone_underweight_max = 13.0;

//51 NORMAL
$b_w_fiftyone_normal_min = 13.1;
$b_w_fiftyone_normal_min = 21.9;

//51 OVERWEIGHT
$b_w_fiftyone_overweight = 22.0;

//52  Severely UNDERWEIGHT
$b_w_fiftytwo_severely_underweight = 11.6;


//52 UNDERWEIGHT
$b_w_fiftytwo_underweight_min = 11.7;
$b_w_fiftytwo_underweight_max = 13.1;

//52 NORMAL
$b_w_fiftytwo_normal_min = 13.2;
$b_w_fiftytwo_normal_max = 22.2;

//52 OVERWEIGHT
$b_w_fiftytwo_overweight = 22.3;

//53  Severely UNDERWEIGHT
$b_w_fiftythree_severely_underweight = 11.7;

//53 UNDERWEIGHT
$b_w_fiftythree_underweight_min = 11.8;
$b_w_fiftythree_underweight_max = 13.2;

//53 NORMAL 
$b_w_fiftythree_normal_min = 13.3;
$b_w_fiftythree_normal_max = 22.4;

//53 OVERWEIGHT
$b_w_fiftythree_overweight = 22.5;

//54  Severely UNDERWEIGHT 
$b_w_fiftyfour_severely_underweight = 11.8;

//54 UNDERWEIGHT
$b_w_fiftyfour_underweight_min = 11.9;
$b_w_fiftyfour_underweight_max = 13.3;

//54 NORMAL 
$b_w_fiftyfour_normal_min = 13.4;
$b_w_fiftyfour_normal_max = 22.7;

//54 OVERWEIGHT
$b_w_fiftyfour_overweight = 22.8;

//55  Severely UNDERWEIGHT 
$b_w_fiftyfive_severely_underweight = 11.9;

//55 UNDERWEIGHT
$b_w_fiftyfive_underweight_min = 12.0;
$b_w_fiftyfive_underweight_max = 13.4;

//55 NORMAL 
$b_w_fiftyfive_normal_min = 13.5;
$b_w_fiftyfive_normal_max = 22.9;

//55 OVERWEIGHT 
$b_w_fiftyfive_overweight = 23.0;

//56  Severely UNDERWEIGHT 
$b_w_fiftysix_severely_underweight = 12.0;

//56 UNDERWEIGHT
$b_w_fiftysix_underweight_min = 12.1;
$b_w_fiftysix_underweight_max = 13.5;

//56 NORMAL
$b_w_fiftysix_normal_min = 13.6;
$b_w_fiftysix_normal_max = 23.2;

//56 OVERWEIGHT
$b_w_fiftysix_overweight = 23.3;

//57  Severely UNDERWEIGHT 
$b_w_fiftyseven_severely_underweight = 12.1;

//57 UNDERWEIGHT 
$b_w_fiftyseven_underweight_min = 12.2;
$b_w_fiftyseven_underweight_max = 13.6;

//57 NORMAL
$b_w_fiftyseven_normal_min = 13.7;
$b_w_fiftyseven_normal_max = 23.4;

//57 OVERWEIGHT
$b_w_fiftyseven_overweight = 23.5;

//58  Severely UNDERWEIGHT
$b_w_fiftyeight_severely_underweight = 12.2;

//58 UNDERWEIGHT 
$b_w_fiftyeight_underweight_min = 12.3;
$b_w_fiftyeight_underweight_max = 13.7;

//58 NORMAL
$b_w_fiftyeight_normal_min = 13.8;
$b_w_fiftyeight_normal_max = 23.7;

//58 OVERWEIGHT
$b_w_fiftyeight_overweight = 23.8;

//59  Severely UNDERWEIGHT
$b_w_fiftynine_severely_underweight = 12.3;

//59 UNDERWEIGHT
$b_w_fiftynine_underweight_min = 12.4;
$b_w_fiftynine_underweight_max = 13.9;

//59 NORMAL
$b_w_fiftynine_normal_min = 14.0;
$b_w_fiftynine_normal_max = 23.9;

//59 OVERWEIGHT
$b_w_fiftynine_overweight = 24.0;

//60  Severely UNDERWEIGHT
$b_w_sixty_severely_underweight = 12.4;

//60 UNDERWEIGHT
$b_w_sixty_underweight_min = 12.5;
$b_w_sixty_underweight_max = 14.0;

//60 NORMAL
$b_w_sixty_normal_min = 14.1;
$b_w_sixty_normal_max = 24.2;

//60 OVERWEIGHT 
$b_w_sixty_normal_overweight = 24.3;


//61  Severely UNDERWEIGHT 
$b_w_sixtyone_severely_underweight = 12.7;

//61 UNDERWEIGHT
$b_w_sixtyone_underweight_min = 12.8;
$b_w_sixtyone_underweight_max = 14.3;

//61 NORMAL
$b_w_sixtyone_normal_min = 14.4;
$b_w_sixtyone_normal_max = 24.3;

//61 OVERWEIGHT 
$b_w_sixtyone_overweight = 24.4;

//62  Severely UNDERWEIGHT
$b_w_sixtytwo_severely_underweight = 12.8;

//62 UNDERWEIGHT 
$b_w_sixtytwo_underweight_min = 12.9;
$b_w_sixtytwo_underweight_max = 14.4;

//62 NORMAL 
$b_w_sixtytwo_normal_min = 14.5;
$b_w_sixtytwo_normal_max = 24.4;

//62 OVERWEIGHT
$b_w_sixtytwo_overweight = 24.5;

//63  Severely UNDERWEIGHT 
$b_w_sixtythree_severely_underweight = 13.0;

//63 UNDERWEIGHT
$b_w_sixtythree_underweight_min = 13.1;
$b_w_sixtythree_underweight_max = 14.5;

//63 NORMAL 
$b_w_sixtythree_normal_min = 14.6;
$b_w_sixtythree_normal_max = 24.7;

//63 OVERWEIGHT 
$b_w_sixtythree_overweight = 24.8;

//64  Severely UNDERWEIGHT
$b_w_sixtyfour_severely_underweight = 13.1;

//64 UNDERWEIGHT
$b_w_sixtyfour_underweight_min = 13.2;
$b_w_sixtyfour_underweight_max = 14.7;

//64 NORMAL
$b_w_sixtyfour_normal_min = 14.8;
$b_w_sixtyfour_normal_max = 24.9;

//64 OVERWEIGHT
$b_w_sixtyfour_overweight = 25.0;

//65  Severely UNDERWEIGHT 
$b_w_sixtyfive_severely_underweight = 13.2;

//65 UNDERWEIGHT 
$b_w_sixtyfive_underweight_min = 13.3;
$b_w_sixtyfive_underweight_max = 14.8;

//65 NORMAL 
$b_w_sixtyfive_normal_min = 14.9;
$b_w_sixtyfive_normal_max = 25.2;

//65 OVERWEIGHT 
$b_w_sixtyfive_overweight = 25.3;

//66  Severely UNDERWEIGHT 
$b_w_sixtysix_severely_underweight = 13.3;

//66 UNDERWEIGHT 
$b_w_sixtysix_underweight_min = 13.4;
$b_w_sixtysix_underweight_max = 14.9;

//66 NORMAL 
$b_w_sixtysix_normal_min = 15.0;
$b_w_sixtysix_normal_max = 25.5;

//66 OVERWEIGHT 
$b_w_sixtysix_overweight = 25.6;

//67  Severely UNDERWEIGHT
$b_w_sixtyseven_severely_underweight = 13.4;

//67 UNDERWEIGHT 
$b_w_sixtyseven_underweight_min = 13.5;
$b_w_sixtyseven_underweight_max = 15.1;

//67 NORMAL 
$b_w_sixtyseven_normal_min = 15.2;
$b_w_sixtyseven_normal_max = 25.7;

//67 OVERWEIGHT
$b_w_sixtyseven_overweight = 25.8;

//68  Severely UNDERWEIGHT
$b_w_sixtyeight_severely_underweight = 13.6;

//68 UNDERWEIGHT
$b_w_sixtyeight_underweight_min = 13.7;
$b_w_sixtyeight_underweight_max = 15.2;

//68 NORMAL 
$b_w_sixtyeight_normal_min = 15.3;
$b_w_sixtyeight_normal_max = 26.0;

//68 OVERWEIGHT
$b_w_sixtyeight_overweight = 26.1;

//69  Severely UNDERWEIGHT
$b_w_sixtynine_severely_underweight = 13.7;

//69 UNDERWEIGHT
$b_w_sixtynine_underweight_min = 13.8;
$b_w_sixtynine_underweight_max = 15.3;

//69 NORMAL 
$b_w_sixtynine_normal_min = 15.4;
$b_w_sixtynine_normal_max = 26.3;

//69 OVERWEIGHT
$b_w_sixtynine_overweight = 26.4;

//70  Severely UNDERWEIGHT 
$b_w_seventy_severely_underweight = 13.8;

//70 UNDERWEIGHT
$b_w_seventy_underweight_min = 13.9;
$b_w_seventy_underweight_max = 15.5;

//70 NORMAL 
$b_w_seventy_normal_min = 15.6;
$b_w_seventy_normal_max = 26.6;

//70 OVERWEIGHT
$b_w_seventy_overweight = 26.6;

//71  Severely UNDERWEIGHT 
$b_w_seventyone_severely_underweight = 13.9;

//71 UNDERWEIGHT
$b_w_seventyone_underweight_min = 14.0;
$b_w_seventyone_underweight_max = 15.6;

//71 NORMAL 
$b_w_seventyone_normal_min = 15.7;
$b_w_seventyone_normal_max = 26.8;

//71 OVERWEIGHT
$b_w_seventyone_overweight = 26.9;


switch($age_input){
	
	
case 0:
	
		if($weight_input == $b_w_zero_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_zero_underweight_min <= $weight_input && $weight_input <= $b_w_zero_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_zero_normal_min  <= $weight_input && $weight_input <= $b_w_zero_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_zero_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}

		break;
		
	case 1:
	
		if($weight_input == $b_w_one_severely_underweight){

		$b_w_status = "Severely Stunded";

		
	

		}else if($b_w_one_underweight_min <= $weight_input && $weight_input <= $b_w_one_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_one_normal_min   <= $weight_input && $weight_input <= $b_w_one_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_one_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}

	
		break;	
	
	case 2:
	
		if($weight_input == $b_w_two_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_two_underweight_min <= $weight_input && $weight_input <= $b_w_two_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_two_normal_min   <= $weight_input && $weight_input <= $b_w_two_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_two_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
	
	case 3:
		
		if($weight_input == $b_w_three_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_three_underweight_min <= $weight_input && $weight_input <= $b_w_three_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_three_normal_min   <= $weight_input && $weight_input <= $b_w_three_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_three_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
	
	case 4:
	
		if($weight_input == $b_w_four_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_four_underweight_min <= $weight_input && $weight_input <= $b_w_four_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_four_normal_min   <= $weight_input && $weight_input <= $b_w_four_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_four_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 5:
	
		if($weight_input == $b_w_five_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_five_underweight_min <= $weight_input && $weight_input <= $b_w_five_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_five_normal_mix   <= $weight_input && $weight_input <= $b_w_five_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_five_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 6:
		
		if($weight_input == $b_w_six_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_six_underweight_min <= $weight_input && $weight_input <= $b_w_six_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_six_normal_min   <= $weight_input && $weight_input <= $b_w_six_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_six_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
		
		break;
		
	case 7:
	
		if($weight_input == $b_w_seven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_seven_underweight_min <= $weight_input && $weight_input <= $b_w_seven_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_seven_normal_min   <= $weight_input && $weight_input <= $b_w_seven_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_seven_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 8:
	
		if($weight_input == $b_w_eight_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_eight_underweight_min <= $weight_input && $weight_input <= $b_w_eight_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_eight_normal_min   <= $weight_input && $weight_input <= $b_w_eight_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_eight_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 9:
	
		if($weight_input == $b_w_nine_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_nine_underweight_min <= $weight_input && $weight_input <= $b_w_nine_underweight_max) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_nine_normal_min   <= $weight_input && $weight_input <= $b_w_nine_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_nine_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
	case 10:
	
		if($weight_input == $b_w_ten_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_ten_underweight_min <= $weight_input && $weight_input <= $b_w_ten_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_ten_normal_min   <= $weight_input && $weight_input <= $b_w_ten_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_ten_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 11:
	
		if($weight_input == $b_w_eleven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_eleven_underweight_min <= $weight_input && $weight_input <= $b_w_eleven_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_eleven_normal_min   <= $weight_input && $weight_input <= $b_w_eleven_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_eleven_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
	
	case 12:
	
		if($weight_input == $b_w_twelve_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twelve_underweight_min <= $weight_input && $weight_input <= $b_w_twelve_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_eleven_normal_min   <= $weight_input && $weight_input <= $b_w_twelve_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twelve_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
		
	case 13:
	
		if($weight_input == $b_w_thirteen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirteen_underweight_min <= $weight_input && $weight_input <= $b_w_thirteen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirteen_normal_min   <= $weight_input && $weight_input <= $b_w_thirteen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirteen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
		
	case 14:
	
		if($weight_input == $b_w_fourteen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourteen_underweight_min <= $weight_input && $weight_input <= $b_w_fourteen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourteen_normal_min   <= $weight_input && $weight_input <= $b_w_fourteen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourteen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
	case 15:

		if($weight_input == $b_w_fifteen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fifteen_underweight_min <= $weight_input && $weight_input <= $b_w_fifteen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fifteen_normal_min   <= $weight_input && $weight_input <= $b_w_fifteen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fifteen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 16:

		if($weight_input == $b_w_sixteen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixteen_underweight_min <= $weight_input && $weight_input <= $b_w_sixteen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixteen_normal_min   <= $weight_input && $weight_input <= $b_w_sixteen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixteen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 17:

		if($weight_input == $b_w_seventeen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_seventeen_underweight_min <= $weight_input && $weight_input <= $b_w_seventeen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_seventeen_normal_min   <= $weight_input && $weight_input <= $b_w_seventeen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_seventeen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;

	case 18:

		if($weight_input == $b_w_eighteen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_eighteen_underweight_min <= $weight_input && $weight_input <= $b_w_eighteen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_eighteen_normal_min   <= $weight_input && $weight_input <= $b_w_eighteen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_eighteen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}
	
	
		break;	
		
	case 19:

		if($weight_input == $b_w_nineteen_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_nineteen_underweight_min <= $weight_input && $weight_input <= $b_w_nineteen_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_nineteen_normal_min <= $weight_input && $weight_input <= $b_w_nineteen_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_nineteen_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 20:

		if($weight_input == $b_w_twenty_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twenty_underweight_min <= $weight_input && $weight_input <= $b_w_twenty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twenty_normal_min <= $weight_input && $weight_input <= $b_w_twenty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twenty_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	

	case 21:

		if($weight_input == $b_w_twentyone_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentyone_underweight_min <= $weight_input && $weight_input <= $b_w_twentyone_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentyone_normal_min <= $weight_input && $weight_input <= $b_w_twentyone_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentyone_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;		
	
	case 22:

		if($weight_input == $b_w_twentytwo_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentytwo_underweight_min <= $weight_input && $weight_input <= $b_w_twentytwo_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentytwo_normal_min <= $weight_input && $weight_input <= $b_w_twentytwo_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentytwo_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 23:

		if($weight_input == $b_w_twentythree_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentythree_underweight_min <= $weight_input && $weight_input <= $b_w_twentythree_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentythree_normal_min <= $weight_input && $weight_input <= $b_w_twentythree_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentythree_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 24:

		if($weight_input == $b_w_twentyfour_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twenty_underweight_min <= $weight_input && $weight_input <= $b_w_twenty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twenty_normal_min <= $weight_input && $weight_input <= $b_w_twenty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twenty_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
	
	case 25:

		if($weight_input == $b_w_twentyfive_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentyfive_underweight_min <= $weight_input && $weight_input <= $b_w_twentyfive_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentyfive_normal_min <= $weight_input && $weight_input <= $b_w_twentyfive_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentyfive_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
	
	case 26:

		if($weight_input == $b_w_twentysix_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentysix_underweight_min <= $weight_input && $weight_input <= $b_w_twentysix_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentysix_normal_min <= $weight_input && $weight_input <= $b_w_twentysix_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentysix_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
		
	case 27:

		if($weight_input == $b_w_twentyseven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twenty_underweight_min <= $weight_input && $weight_input <= $b_w_twenty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twenty_normal_min <= $weight_input && $weight_input <= $b_w_twenty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twenty_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
	
	case 28:

		if($weight_input == $b_w_twentyeight_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentyeight_underweight_min <= $weight_input && $weight_input <= $b_w_twentyeight_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentyeight_normal_min <= $weight_input && $weight_input <= $b_w_twentyeight_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentyeight_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 29:

		if($weight_input == $b_w_twentynine_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_twentynine_underweight_min <= $weight_input && $weight_input <= $b_w_twentynine_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_twentynine_normal_min <= $weight_input && $weight_input <= $b_w_twentynine_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_twentynine_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 30:

		if($weight_input == $b_w_thirty_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirty_underweight_min <= $weight_input && $weight_input <= $b_w_thirty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirty_normal_min <= $weight_input && $weight_input <= $b_w_thirty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirty_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 31:

		if($weight_input == $b_w_thirtyone_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtyone_underweight_min <= $weight_input && $weight_input <= $b_w_thirtyone_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtyone_normal_min <= $weight_input && $weight_input <= $b_w_thirtyone_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtyone_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
	case 32:

		if($weight_input == $b_w_thirtytwo_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtytwo_underweight_min <= $weight_input && $weight_input <= $b_w_thirtytwo_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtytwo_normal_min <= $weight_input && $weight_input <= $b_w_thirtytwo_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtytwo_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 33:

		if($weight_input == $b_w_thirtythree_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtythree_underweight_min <= $weight_input && $weight_input <= $b_w_thirtythree_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtythree_normal_min <= $weight_input && $weight_input <= $b_w_thirtythree_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $_h_thirtythree_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
	
	case 34:

		if($weight_input == $b_w_thirtyfour_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtyfour_underweight_min <= $weight_input && $weight_input <= $b_w_thirtyfour_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtyfour_normal_min <= $weight_input && $weight_input <= $b_w_thirtyfour_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtyfour_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
		
	case 35:

		if($weight_input == $b_w_thirtyfive_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtyfive_underweight_min <= $weight_input && $weight_input <= $b_w_thirtyfive_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtyfive_normal_min <= $weight_input && $weight_input <= $b_w_thirtyfive_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtyfive_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
		
	case 36:

		if($weight_input == $b_w_thirtysix_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtysix_underweight_min <= $weight_input && $weight_input <= $b_w_thirtysix_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtysix_normal_min <= $weight_input && $weight_input <= $b_w_thirtysix_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtysix_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
	case 37:

		if($weight_input == $b_w_thirtyseven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtyseven_underweight_min <= $weight_input && $weight_input <= $b_w_thirtyseven_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtyseven_normal_min <= $weight_input && $weight_input <= $b_w_thirtyseven_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtyseven_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 38:

		if($weight_input == $b_w_thirtyeight_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtyeight_underweight_min <= $weight_input && $weight_input <= $b_w_thirtyeight_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtyeight_normal_min <= $weight_input && $weight_input <= $b_w_thirtyeight_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtyeight_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 39:

		if($weight_input == $b_w_thirtynine_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_thirtynine_underweight_min <= $weight_input && $weight_input <= $b_w_thirtynine_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_thirtynine_normal_min <= $weight_input && $weight_input <= $b_w_thirtynine_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_thirtynine_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;

	case 40:

		if($weight_input == $b_w_fourty_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourty_underweight_min <= $weight_input && $weight_input <= $b_w_fourty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourty_normal_min <= $weight_input && $weight_input <= $b_w_fourty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourty_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
	case 41:

		if($weight_input == $b_w_fourtyone_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtyone_underweight_min <= $weight_input && $weight_input <= $_h_fourtyone_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtyone_normal_min <= $weight_input && $weight_input <= $b_w_fourtyone_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtyone_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
	
	case 42:

		if($weight_input == $b_w_fourtytwo_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtytwo_underweight_min <= $weight_input && $weight_input <= $b_w_fourtytwo_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtytwo_normal_min <= $weight_input && $weight_input <= $b_w_fourtytwo_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtytwo_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	

	case 43:

		if($weight_input == $b_w_fourtythree_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtythree_underweight_min <= $weight_input && $weight_input <= $b_w_fourtythree_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtythree_normal_min <= $weight_input && $weight_input <= $b_w_fourtythree_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtythree_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 44:

		if($weight_input == $b_w_fourtyfour_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtyfour_underweight_min <= $weight_input && $weight_input <= $b_w_fourtyfour_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtyfour_normal_min <= $weight_input && $weight_input <= $b_w_fourtyfour_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtyfour_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
	case 45:

		if($weight_input == $b_w_fourtyfive_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtyfive_underweight_min <= $weight_input && $weight_input <= $b_w_fourtyfive_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtyfive_normal_min <= $weight_input && $weight_input <= $b_w_fourtyfive_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtyfive_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 46:

		if($weight_input == $b_w_fourtyfive_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtysix_underweight_min <= $weight_input && $weight_input <= $b_w_fourtysix_underweight_min ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtysix_normal_min <= $weight_input && $weight_input <= $b_w_fourtysix_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtysix_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	

	case 47:

		if($weight_input == $b_w_fourtyseven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtyseven_underweight_min <= $weight_input && $weight_input <= $b_w_fourtyseven_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtyseven_normal_min <= $weight_input && $weight_input <= $b_w_fourtyseven_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtyseven_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
		
	
		break;		
	
	case 48:

		if($weight_input == $b_w_fourtyeight_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtyeight_underweight_min <= $weight_input && $weight_input <= $b_w_fourtyeight_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtyeight_normal_min <= $weight_input && $weight_input <= $b_w_fourtyeight_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtyeight_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 49:

		if($weight_input == $b_w_fourtynine_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fourtynine_underweight_min <= $weight_input && $weight_input <= $b_w_fourtynine_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fourtynine_normal_min <= $weight_input && $weight_input <= $b_w_fourtynine_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fourtynine_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
	
	case 50:

		if($weight_input == $b_w_fiftty_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fifty_underweight_min <= $weight_input && $weight_input <= $b_w_fifty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fifty_normal_min <= $weight_input && $weight_input <= $b_w_fifty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fifty_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 51:

		if($weight_input == $b_w_fiftyone_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftyone_underweight_min <= $weight_input && $weight_input <= $b_w_fiftyone_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftyone_normal_min <= $weight_input && $weight_input <= $b_w_fiftyone_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftyone_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 52:

		if($weight_input == $b_w_fiftytwo_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftytwo_underweight_min <= $weight_input && $weight_input <= $b_w_fiftytwo_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftytwo_normal_min <= $weight_input && $weight_input <= $b_w_fiftytwo_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftytwo_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 53:

		if($weight_input == $b_w_fiftythree_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftythree_underweight_min <= $weight_input && $weight_input <= $b_w_fiftythree_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftythree_normal_min <= $weight_input && $weight_input <= $b_w_fiftythree_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftythree_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
	
	case 54:

		if($weight_input == $b_w_fiftyfour_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftyfour_underweight_min <= $weight_input && $weight_input <= $b_w_fiftyfour_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftyfour_normal_min <= $weight_input && $weight_input <= $b_w_fiftyfour_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftyfour_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 55:

		if($weight_input == $b_w_fiftyfive_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftyfive_underweight_min <= $weight_input && $weight_input <= $b_w_fiftyfive_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftyfive_normal_min <= $weight_input && $weight_input <= $b_w_fiftyfive_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftyfive_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 56:

		if($weight_input == $b_w_fiftysix_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftysix_underweight_min <= $weight_input && $weight_input <= $b_w_fiftysix_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftysix_normal_min <= $weight_input && $weight_input <= $b_w_fiftysix_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftysix_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 57:

		if($weight_input == $b_w_fiftyseven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftyseven_underweight_min <= $weight_input && $weight_input <= $b_w_fiftyseven_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftyseven_normal_min <= $weight_input && $weight_input <= $b_w_fiftyseven_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftyseven_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
	case 58:

		if($weight_input == $b_w_fiftyeight_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftyeight_underweight_min <= $weight_input && $weight_input <= $b_w_fiftyeight_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftyeight_normal_min <= $weight_input && $weight_input <= $b_w_fiftyeight_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftyeight_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 59:

		if($weight_input == $b_w_fiftynine_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_fiftynine_underweight_min <= $weight_input && $weight_input <= $b_w_fiftynine_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_fiftynine_normal_min <= $weight_input && $weight_input <= $b_w_fiftynine_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_fiftynine_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
	
	case 60:

		if($weight_input == $b_w_sixty_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixty_underweight_min <= $weight_input && $weight_input <= $b_w_sixty_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixty_normal_min <= $weight_input && $weight_input <= $b_w_sixty_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixty_normal_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
		
		
	case 61:

		if($weight_input == $b_w_sixtyone_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtyone_underweight_min <= $weight_input && $weight_input <= $b_w_sixtyone_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtyone_normal_min <= $weight_input && $weight_input <= $b_w_sixtyone_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtyone_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 62:

		if($weight_input == $b_w_sixtytwo_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtytwo_underweight_min <= $weight_input && $weight_input <= $b_w_sixtytwo_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtytwo_normal_min <= $weight_input && $weight_input <= $b_w_sixtytwo_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtytwo_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
	case 63:

		if($weight_input == $b_w_sixtythree_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtythree_underweight_min <= $weight_input && $weight_input <= $b_w_sixtythree_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtythree_normal_min <= $weight_input && $weight_input <= $b_w_sixtythree_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtythree_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;
	
	case 64:

		if($weight_input == $b_w_sixtyfour_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtyfour_underweight_min <= $weight_input && $weight_input <= $b_w_sixtyfour_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtyfour_normal_min <= $weight_input && $weight_input <= $b_w_sixtyfour_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtyfour_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}			
	
		break;	
	
	case 65:

		if($weight_input == $b_w_sixtyfive_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtyfive_underweight_min <= $weight_input && $weight_input <= $b_w_sixtyfive_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtyfive_normal_min <= $weight_input && $weight_input <= $b_w_sixtyfive_normal_five) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtyfive_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;

	case 66:

		if($weight_input == $b_w_sixtysix_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtysix_underweight_min <= $weight_input && $weight_input <= $b_w_sixtysix_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtysix_normal_min <= $weight_input && $weight_input <= $b_w_sixtysix_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtysix_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
	case 67:

		if($weight_input == $b_w_sixtyseven_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtyseven_underweight_min <= $weight_input && $weight_input <= $b_w_sixtyseven_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtyseven_normal_min <= $weight_input && $weight_input <= $b_w_sixtyseven_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtyseven_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	
	
	case 68:

		if($weight_input == $b_w_sixtyeight_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtyeight_underweight_min <= $weight_input && $weight_input <= $b_w_sixtyeight_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtyeight_normal_min <= $weight_input && $weight_input <= $b_w_sixtyeight_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtyeight_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;	

	case 69:

		if($weight_input == $b_w_sixtynine_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_sixtynine_underweight_min <= $weight_input && $weight_input <= $b_w_sixtynine_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_sixtynine_normal_min <= $weight_input && $weight_input <= $b_w_sixtynine_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_sixtynine_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
	
	case 70:

		if($weight_input == $b_w_seventy_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_seventy_underweight_min <= $weight_input && $weight_input <= $b_w_seventy_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_seventy_normal_min <= $weight_input && $weight_input <= $b_w_seventy_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_seventy_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}	
	
		break;
		
	case 71:

		if($weight_input == $b_w_seventyone_severely_underweight){

		$b_w_status = "Severely Underweight";

		
	

		}else if($b_w_seventyone_underweight_min <= $weight_input && $weight_input <= $b_w_seventyone_underweight_max ) {

		$b_w_status= "Underweight";

		
	

		}else if($b_w_seventyone_normal_min <= $weight_input && $weight_input <= $b_w_seventyone_normal_max) {

		$b_w_status = "Normal";
	
		


		}else if($weight_input >= $b_w_seventyone_overweight){

		$b_w_status = "Overweight";

		

		} else {

		$b_w_status = "Invalid Weight";

		

		}		
	
		break;	
		
		default:
		
		$b_w_status = "Weight not in table";

		
		
			
}




$child_information_reg = $conn->query("INSERT INTO child_information (Name,Age,Sex,Address,Height,Weight,Guardian,Height_Status,Weight_Status) VALUES ('$Name','$Age','$Sex','$Address','$Height','$Weight','$Guardian','$b_h_status','$b_w_status')");


	


} else if ($sex_input == "Female") {
	
// GIRLS HEIGHT ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//0 Severely Stunted
$g_h_zero_severely_stunted = 43.5;

//0 Stunted
$g_h_zero_stunted_min = 43.6;
$g_h_zero_stunted_max = 45.3;

//0 Normal
$g_h_zero_normal_min = 45.4;
$g_h_zero_normal_max = 52.9;

//0 Tall
$g_h_zero_tall = 53.0;

//1 Severely Stunted
$g_h_one_severely_stunted = 47.7;

//1 Stunted
$g_h_one_stunted_min = 47.8;
$g_h_one_stunted_max = 49.7;

//1 Normal
$g_h_one_normal_min = 49.8;
$g_h_one_normal_max = 57.6;

//1 Tall
$g_h_one_tall = 57.7;

//2 Severely Stunted
$g_h_two_severely_stunted = 50.9;

//2 Stunted
$g_h_two_stunted_min = 51.0;
$g_h_two_stunted_max = 52.9;

//2 Normal
$g_h_two_normal_min = 53.0;
$g_h_two_normal_max = 61.1;

//2 Tall
$g_h_two_tall = 61.2;

//3 Severely Stunted
$g_h_three_severely_stunted = 53.4;

//3 Stunted
$g_h_three_stunted_min = 53.5;
$g_h_three_stunted_max = 55.5;

//3 Normal
$g_h_three_normal_min = 55.6;
$g_h_three_normal_max = 64.0;

//3 Tall
$g_h_three_tall = 64.1;

//4 Severely Stunted
$g_h_four_severely_stunted = 55.5;

//4 Stunted
$g_h_four_stunted_min = 55.6;
$g_h_four_stunted_max = 57.7;

//4 Normal
$g_h_four_normal_min = 57.8;
$g_h_four_normal_max = 66.4;

//4 Tall
$g_h_four_tall = 66.5;

//5 Severely Stunted
$g_h_five_severely_stunted = 57.3;

//5 Stunted
$g_h_five_stunted_min = 57.4;
$g_h_five_stunted_max = 59.5;

//5 Normal
$g_h_five_normal_min = 59.6;
$g_h_five_normal_max = 68.5;

//5 Tall
$g_h_five_tall = 68.6;

//6 Severely Stunted
$g_h_six_severely_stunted = 58.8;

//6 Stunted
$g_h_six_stunted_min = 58.9;
$g_h_six_stunted_max = 61.1;

//6 Normal
$g_h_six_normal_min = 61.2;
$g_h_six_normal_max = 70.3;

//6 Tall
$g_h_six_tall = 70.4;

//7 Severely Stunted
$g_h_seven_severely_stunted = 60.2;

//7 Stunted
$g_h_seven_stunted_min = 60.3;
$g_h_seven_stunted_max = 62.6;

//7 Normal
$g_h_seven_normal_min = 62.7;
$g_h_seven_normal_max = 71.9;

//7 Tall
$g_h_seven_tall = 72.0;

//8 Severely Stunted
$g_h_eight_severely_stunted = 61.6;

//8 Stunted
$g_h_eight_stunted_min = 61.7;
$g_h_eight_stunted_max = 63.9;

//8 Normal
$g_h_eight_normal_min = 64.0;
$g_h_eight_normal_max = 73.5;

//8 Tall
$g_h_eight_tall = 73.6;

//9 Severely Stunted
$g_h_nine_severely_stunted = 62.8;

//9 Stunted
$g_h_nine_stunted_min = 62.9;
$g_h_nine_stunted_max = 65.2;

//9 Normal
$g_h_nine_normal_min = 65.3;
$g_h_nine_normal_max = 75.0;

//9 Tall
$g_h_nine_tall = 75.1;

//10 Severely Stunted
$g_h_ten_severely_stunted = 64.0;

//10 Stunted
$g_h_ten_stunted_min = 64.1;
$g_h_ten_stunted_max = 66.4;

//10 Normal
$g_h_ten_normal_min = 66.5;
$g_h_ten_normal_max = 76.4;

//10 Tall
$g_h_ten_tall = 76.5;

//11 Severely Stunted
$g_h_eleven_severely_stunted = 65.1;

//11 Stunted
$g_h_eleven_stunted_min = 65.2;
$g_h_eleven_stunted_max = 67.6;

//11 Normal
$g_h_eleven_normal_min = 67.7;
$g_h_eleven_normal_max = 77.8;

//11 Tall
$g_h_eleven_tall = 77.9;

//12 Severely Stunted
$g_h_twelve_severely_stunted = 66.2;

//12 Stunted
$g_h_twelve_stunted_min = 66.3;
$g_h_twelve_stunted_max = 68.8;

//12 Normal
$g_h_twelve_normal_min = 68.9;
$g_h_twelve_normal_max = 79.2;

//12 Tall
$g_h_twelve_tall = 79.3;

//13 Severely Stunted
$g_h_13_severely_stunted = 67.2;

//13 Stunted
$g_h_13_stunted_min = 67.3;
$g_h_13_stunted_max = 69.9;

//13 Normal
$g_h_13_normal_min = 70.0;
$g_h_13_normal_max = 80.5;

//13 Tall
$g_h_13_tall = 80.6;

//14 Severely Stunted
$g_h_14_severely_stunted = 68.2;

//14 Stunted
$g_h_14_stunted_min = 68.3;
$g_h_14_stunted_max = 70.9;

//14 Normal
$g_h_14_normal_min = 71.0;
$g_h_14_normal_max = 81.7;

//14 Tall
$g_h_14_tall = 81.8;

//15 Severely Stunted
$g_h_15_severely_stunted = 69.2;

//15 Stunted
$g_h_15_stunted_min = 69.3;
$g_h_15_stunted_max = 71.9;

//15 Normal
$g_h_15_normal_min = 72.0;
$g_h_15_normal_max = 83.0;

//15 Tall
$g_h_15_tall = 83.1;

//16 Severely Stunted
$g_h_16_severely_stunted = 70.1;

//16 Stunted
$g_h_16_stunted_min = 70.2;
$g_h_16_stunted_max = 72.9;

//16 Normal
$g_h_16_normal_min = 73.0;
$g_h_16_normal_max = 84.2;

//16 Tall
$g_h_16_tall = 84.3;

//17 Severely Stunted
$g_h_17_severely_stunted = 71.0;

//17 Stunted
$g_h_17_stunted_min = 71.1;
$g_h_17_stunted_max = 73.9;

//17 Normal
$g_h_17_normal_min = 74.0;
$g_h_17_normal_max = 85.4;

//17 Tall
$g_h_17_tall = 85.5;

//18 Severely Stunted
$g_h_18_severely_stunted = 71.9;

//18 Stunted
$g_h_18_stunted_min = 72.0;
$g_h_18_stunted_max = 74.8;

//18 Normal
$g_h_18_normal_min = 74.9;
$g_h_18_normal_max = 86.5;

//18 Tall
$g_h_18_tall = 86.6;

//19 Severely Stunted
$g_h_19_severely_stunted = 72.7;

//19 Stunted
$g_h_19_stunted_min = 72.8;
$g_h_19_stunted_max = 75.7;

//19 Normal
$g_h_19_normal_min = 75.8;
$g_h_19_normal_max = 87.6;

//19 Tall
$g_h_19_tall = 87.7;

//20 Severely Stunted
$g_h_20_severely_stunted = 73.6;

//20 Stunted
$g_h_20_stunted_min = 73.7;
$g_h_20_stunted_max = 76.6;

//20 Normal
$g_h_20_normal_min = 76.7;
$g_h_20_normal_max = 88.7;

//20 Tall
$g_h_20_tall = 88.8;

//21 Severely Stunted
$g_h_21_severely_stunted = 74.4;

//21 Stunted
$g_h_21_stunted_min = 74.5;
$g_h_21_stunted_max = 77.4;

//21 Normal
$g_h_21_normal_min = 77.5;
$g_h_21_normal_max = 89.8;

//21 Tall
$g_h_21_tall = 89.9;

//22 Severely Stunted
$g_h_22_severely_stunted = 75.1;

//22 Stunted
$g_h_22_stunted_min = 75.2;
$g_h_22_stunted_max = 78.3;

//22 Normal
$g_h_22_normal_min = 78.4;
$g_h_22_normal_max = 90.8;

//22 Tall
$g_h_22_tall = 90.9;

//23 Severely Stunted
$g_h_23_severely_stunted = 75.9;

//23 Stunted
$g_h_23_stunted_min = 76.0;
$g_h_23_stunted_max = 79.1;

//23 Normal
$g_h_23_normal_min = 79.2;
$g_h_23_normal_max = 91.9;

//23 Tall
$g_h_23_tall = 92.0;

//24 Severely Stunted
$g_h_24_severely_stunted = 75.9;

//24 Stunted
$g_h_24_stunted_min = 76.0;
$g_h_24_stunted_max = 79.2;

//24 Normal
$g_h_24_normal_min = 79.3;
$g_h_24_normal_max = 92.2;

//24 Tall
$g_h_24_tall = 92.3;

//25 Severely Stunted
$g_h_25_severely_stunted = 76.7;

//25 Stunted
$g_h_25_stunted_min = 76.8;
$g_h_25_stunted_max = 79.9;

//25 Normal
$g_h_25_normal_min = 80.0;
$g_h_25_normal_max = 93.1;

//25 Tall
$g_h_25_tall = 93.2;

//26 Severely Stunted
$g_h_26_severely_stunted = 77.4;

//26 Stunted
$g_h_26_stunted_min = 77.5;
$g_h_26_stunted_max = 80.7;

//26 Normal
$g_h_26_normal_min = 80.8;
$g_h_26_normal_max = 94.1;

//26 Tall
$g_h_26_tall = 94.2;

//27 Severely Stunted
$g_h_27_severely_stunted = 78.0;

//27 Stunted
$g_h_27_stunted_min = 78.1;
$g_h_27_stunted_max = 81.4;

//27 Normal
$g_h_27_normal_min = 81.5;
$g_h_27_normal_max = 95.0;

//27 Tall
$g_h_27_tall = 95.1;

//28 Severely Stunted
$g_h_28_severely_stunted = 78.7;

//28 Stunted
$g_h_28_stunted_min = 78.8;
$g_h_28_stunted_max = 82.1;

//28 Normal
$g_h_28_normal_min = 82.2;
$g_h_28_normal_max = 96.0;

//28 Tall
$g_h_28_tall = 96.1;

//29 Severely Stunted
$g_h_29_severely_stunted = 79.4;

//29 Stunted
$g_h_29_stunted_min = 79.5;
$g_h_29_stunted_max = 82.8;

//29 Normal
$g_h_29_normal_min = 82.9;
$g_h_29_normal_max = 96.9;

//29 Tall
$g_h_29_tall = 97.0;

//30 Severely Stunted
$g_h_30_severely_stunted = 80.0;

//30 Stunted
$g_h_30_stunted_min = 80.1;
$g_h_30_stunted_max = 83.5;

//30 Normal
$g_h_30_normal_min = 83.6;
$g_h_30_normal_max = 97.7;

//30 Tall
$g_h_30_tall = 97.8;

//31 Severely Stunted
$g_h_31_severely_stunted = 80.6;

//31 Stunted
$g_h_31_stunted_min = 80.7;
$g_h_31_stunted_max = 84.2;

//31 Normal
$g_h_31_normal_min = 84.3;
$g_h_31_normal_max = 98.6;

//31 Tall
$g_h_31_tall = 98.7;

//32 Severely Stunted
$g_h_32_severely_stunted = 81.2;

//32 Stunted
$g_h_32_stunted_min = 81.3;
$g_h_32_stunted_max = 84.8;

//32 Normal
$g_h_32_normal_min = 84.9;
$g_h_32_normal_max = 99.4;

//32 Tall
$g_h_32_tall = 99.5;

//33 Severely Stunted
$g_h_33_severely_stunted = 81.8;

//33 Stunted
$g_h_33_stunted_min = 81.9;
$g_h_33_stunted_max = 85.5;

//33 Normal
$g_h_33_normal_min = 85.6;
$g_h_33_normal_max = 100.3;

//33 Tall
$g_h_33_tall = 100.4;

//34 Severely Stunted
$g_h_34_severely_stunted = 82.4;

//34 Stunted
$g_h_34_stunted_min = 82.5;
$g_h_34_stunted_max = 86.1;

//34 Normal
$g_h_34_normal_min = 86.2;
$g_h_34_normal_max = 101.1;

//34 Tall
$g_h_34_tall = 101.2;

//35 Severely Stunted
$g_h_35_severely_stunted = 83.0;

//35 Stunted
$g_h_35_stunted_min = 83.1;
$g_h_35_stunted_max = 86.7;

//35 Normal
$g_h_35_normal_min = 86.8;
$g_h_35_normal_max = 101.9;

//35 Tall
$g_h__tall = 102.0;

//36 Severely Stunted
$g_h_36_severely_stunted = 83.5;

//36 Stunted
$g_h_36_stunted_min = 83.6;
$g_h_36_stunted_max = 87.3;

//36 Normal
$g_h_36_normal_min = 87.4;
$g_h_36_normal_max = 102.7;

//36 Tall
$g_h_36_tall = 102.8;

//37 Severely Stunted
$g_h_37_severely_stunted = 84.1;

//37 Stunted
$g_h_37_stunted_min = 84.2;
$g_h_37_stunted_max = 87.9;

//37 Normal
$g_h_37_normal_min = 88.0;
$g_h_37_normal_max = 103.4;

//37 Tall
$g_h_37_tall = 103.5;

//38 Severely Stunted
$g_h_38_severely_stunted = 84.6;

//38 Stunted
$g_h_38_stunted_min = 84.7;
$g_h_38_stunted_max = 88.5;

//38 Normal
$g_h_38_normal_min = 88.6;
$g_h_38_normal_max = 104.2;

//38 Tall
$g_h_38_tall = 104.3;

//39 Severely Stunted
$g_h_39_severely_stunted = 85.2;

//39 Stunted
$g_h_39_stunted_min = 85.3;
$g_h_39_stunted_max = 89.1;

//39 Normal
$g_h_39_normal_min = 89.2;
$g_h_39_normal_max = 105.0;

//39 Tall
$g_h_39_tall = 105.1;

//40 Severely Stunted
$g_h_40_severely_stunted = 85.7;

//40 Stunted
$g_h_40_stunted_min = 85.8;
$g_h_40_stunted_max = 89.7;

//40 Normal
$g_h_40_normal_min = 89.8;
$g_h_40_normal_max = 105.7;

//40 Tall
$g_h_40_tall = 105.8;

//41 Severely Stunted
$g_h_41_severely_stunted = 86.2;

//41 Stunted
$g_h_41_stunted_min = 86.3;
$g_h_41_stunted_max = 90.3;

//41 Normal
$g_h_41_normal_min = 90.4;
$g_h_41_normal_max = 106.4;

//41 Tall
$g_h_41_tall = 106.5;

//42 Severely Stunted
$g_h_42_severely_stunted = 86.7;

//42 Stunted
$g_h_42_stunted_min = 86.8;
$g_h_42_stunted_max = 90.8;

//42 Normal
$g_h_42_normal_min = 90.9;
$g_h_42_normal_max = 107.2;

//42 Tall
$g_h_42_tall = 107.3;

//43 Severely Stunted
$g_h_43_severely_stunted = 87.3;

//43 Stunted
$g_h_43_stunted_min = 87.4;
$g_h_43_stunted_max = 91.4;

//43 Normal
$g_h_43_normal_min = 91.5;
$g_h_43_normal_max = 107.9;

//43 Tall
$g_h_43_tall = 108.0;

//44 Severely Stunted
$g_h_44_severely_stunted = 87.8;

//44 Stunted
$g_h_44_stunted_min = 87.9;
$g_h_44_stunted_max = 91.9;

//44 Normal
$g_h_44_normal_min = 92.0;
$g_h_44_normal_max = 108.6;

//44 Tall
$g_h_44_tall = 108.7;

//45 Severely Stunted
$g_h_45_severely_stunted = 88.3;

//45 Stunted
$g_h_45_stunted_min = 88.4;
$g_h_45_stunted_max = 92.4;

//45 Normal
$g_h_45_normal_min = 92.5;
$g_h_45_normal_max = 109.3;

//45 Tall
$g_h_45_tall = 109.4;

//46 Severely Stunted
$g_h_46_severely_stunted = 88.8;

//46 Stunted
$g_h_46_stunted_min = 88.9;
$g_h_46_stunted_max = 93.0;

//46 Normal
$g_h_46_normal_min = 93.1;
$g_h_46_normal_max = 110.0;

//46 Tall
$g_h_46_tall = 110.1;

//47 Severely Stunted
$g_h_47_severely_stunted = 89.2;

//47 Stunted
$g_h_47_stunted_min = 89.3;
$g_h_47_stunted_max = 93.5;

//47 Normal
$g_h_47_normal_min = 93.6;
$g_h_47_normal_max = 110.7;

//47 Tall
$g_h_47_tall = 110.8;

//48 Severely Stunted
$g_h_48_severely_stunted = 89.7;

//48 Stunted
$g_h_48_stunted_min = 89.8;
$g_h_48_stunted_max = 94.0;

//48 Normal
$g_h_48_normal_min = 94.1;
$g_h_48_normal_max = 111.3;

//48 Tall
$g_h_48_tall = 111.4;

//49 Severely Stunted
$g_h_49_severely_stunted = 90.2;

//49 Stunted
$g_h_49_stunted_min = 90.3;
$g_h_49_stunted_max = 94.5;

//49 Normal
$g_h_49_normal_min = 94.6;
$g_h_49_normal_max = 112.0;

//49 Tall
$g_h_49_tall = 112.1;

//50 Severely Stunted
$g_h_50_severely_stunted = 90.6;

//50 Stunted
$g_h_50_stunted_min = 90.7;
$g_h_50_stunted_max = 95.0;

//50 Normal
$g_h_50_normal_min = 95.1;
$g_h_50_normal_max = 112.7;

//50 Tall
$g_h_50_tall = 112.8;

//51 Severely Stunted
$g_h_51_severely_stunted = 91.1;

//51 Stunted
$g_h_51_stunted_min = 91.2;
$g_h_51_stunted_max = 95.5;

//51 Normal
$g_h_51_normal_min = 95.6;
$g_h_51_normal_max = 113.3;

//51 Tall
$g_h_51_tall = 113.4;

//52 Severely Stunted
$g_h_52_severely_stunted = 91.6;

//52 Stunted
$g_h_52_stunted_min = 91.7;
$g_h_52_stunted_max = 96.0;

//52 Normal
$g_h_52_normal_min = 96.1;
$g_h_52_normal_max = 114.0;

//52 Tall
$g_h_52_tall = 114.1;

//53 Severely Stunted
$g_h_53_severely_stunted = 92.0;

//53 Stunted
$g_h_53_stunted_min = 92.1;
$g_h_53_stunted_max = 96.5;

//53 Normal
$g_h_53_normal_min = 96.6;
$g_h_53_normal_max = 114.6;

//53 Tall
$g_h_53_tall = 114.7;

//54 Severely Stunted
$g_h_54_severely_stunted = 92.5;

//54 Stunted
$g_h_54_stunted_min = 92.6;
$g_h_54_stunted_max = 97.0;

//54 Normal
$g_h_54_normal_min = 97.1;
$g_h_54_normal_max = 115.2;

//54 Tall
$g_h_54_tall = 115.3;

//55 Severely Stunted
$g_h_55_severely_stunted = 92.9;

//55 Stunted
$g_h_55_stunted_min = 93.0;
$g_h_55_stunted_max = 97.5;

//55 Normal
$g_h_55_normal_min = 97.6;
$g_h_55_normal_max = 115.9;

//55 Tall
$g_h_55_tall = 116.0;

//56 Severely Stunted
$g_h_56_severely_stunted = 93.3;

//56 Stunted
$g_h_56_stunted_min = 93.4;
$g_h_56_stunted_max = 98.0;

//56 Normal
$g_h_56_normal_min = 98.1;
$g_h_56_normal_max = 116.5;

//56 Tall
$g_h_56_tall = 116.6;

//57 Severely Stunted
$g_h_57_severely_stunted = 93.8;

//57 Stunted
$g_h_57_stunted_min = 93.9;
$g_h_57_stunted_max = 98.4;

//57 Normal
$g_h_57_normal_min = 98.5;
$g_h_57_normal_max = 117.1;

//57 Tall
$g_h_57_tall = 117.2;

//58 Severely Stunted
$g_h_58_severely_stunted = 94.2;

//58 Stunted
$g_h_58_stunted_min = 94.2;
$g_h_58_stunted_max = 98.9;

//58 Normal
$g_h_58_normal_min = 99.0;
$g_h_58_normal_max = 117.7;

//58 Tall
$g_h_58_tall = 117.8;

//59 Severely Stunted
$g_h_59_severely_stunted = 94.6;

//59 Stunted
$g_h_59_stunted_min = 94.7;
$g_h_59_stunted_max = 99.4;

//59 Normal
$g_h_59_normal_min = 99.5;
$g_h_59_normal_max = 118.3;

//59 Tall
$g_h_59_tall = 118.4;

//60 Severely Stunted
$g_h_60_severely_stunted = 95.1;

//60 Stunted
$g_h_60_stunted_min = 95.2;
$g_h_60_stunted_max = 99.8;

//60 Normal
$g_h_60_normal_min = 99.9;
$g_h_60_normal_max = 118.9;

//60 Tall
$g_h_60_tall = 119.0;

//61 Severely Stunted
$g_h_61_severely_stunted = 95.2;

//61 Stunted
$g_h_61_stunted_min = 95.3;
$g_h_61_stunted_max = 100.0;

//61 Normal
$g_h_61_normal_min = 100.1;
$g_h_61_normal_max = 119.1;

//61 Tall
$g_h_61_tall = 119.2;

//62 Severely Stunted
$g_h_62_severely_stunted = 95.6;

//62 Stunted
$g_h_62_stunted_min = 95.7;
$g_h_62_stunted_max = 100.4;

//62 Normal
$g_h_62_normal_min = 100.5;
$g_h_62_normal_max = 119.7;

//62 Tall
$g_h_62_tall = 119.8;

//63 Severely Stunted
$g_h_63_severely_stunted = 96.0;

//63 Stunted
$g_h_63_stunted_min = 96.1;
$g_h_63_stunted_max = 100.9;

//63 Normal
$g_h_63_normal_min = 101.0;
$g_h_63_normal_max = 120.3;

//63 Tall
$g_h_63_tall = 120.4;

//64 Severely Stunted
$g_h_64_severely_stunted = 96.4;

//64 Stunted
$g_h_64_stunted_min = 96.5;
$g_h_64_stunted_max = 101.3;

//64 Normal
$g_h_64_normal_min = 101.4;
$g_h_64_normal_max = 120.9;

//64 Tall
$g_h_64_tall = 121.0;

//65 Severely Stunted
$g_h_65_severely_stunted = 96.9;

//65 Stunted
$g_h_65_stunted_min = 97.0;
$g_h_65_stunted_max = 101.8;

//65 Normal
$g_h_65_normal_min = 101.9;
$g_h_65_normal_max = 121.5;

//65 Tall
$g_h_65_tall = 121.6;

//66 Severely Stunted
$g_h_66_severely_stunted = 97.3;

//66 Stunted
$g_h_66_stunted_min = 97.4;
$g_h_66_stunted_max = 102.2;

//66 Normal
$g_h_66_normal_min = 102.3;
$g_h_66_normal_max = 122.0;

//66 Tall
$g_h_66_tall = 122.1;

//67 Severely Stunted
$g_h_67_severely_stunted = 97.7;

//67 Stunted
$g_h_67_stunted_min = 97.8;
$g_h_67_stunted_max = 102.6;

//67 Normal
$g_h_67_normal_min = 102.7;
$g_h_67_normal_max = 122.6;

//67 Tall
$g_h_67_tall = 122.7;

//68 Severely Stunted
$g_h_68_severely_stunted = 98.1;

//68 Stunted
$g_h_68_stunted_min = 98.2;
$g_h_68_stunted_max = 103.1;

//68 Normal
$g_h_68_normal_min = 103.2;
$g_h_68_normal_max = 123.2;

//68 Tall
$g_h_68_tall = 123.3;

//69 Severely Stunted
$g_h_69_severely_stunted = 98.5;

//69 Stunted
$g_h_69_stunted_min = 98.6;
$g_h_69_stunted_max = 103.5;

//69 Normal
$g_h_69_normal_min = 103.6;
$g_h_69_normal_max = 123.7;

//69 Tall
$g_h_69_tall = 123.8;

//70 Severely Stunted
$g_h_70_severely_stunted = 98.9;

//70 Stunted
$g_h_70_stunted_min = 99.0;
$g_h_70_stunted_max = 103.9;

//70 Normal
$g_h_70_normal_min = 104.0;
$g_h_70_normal_max = 124.3;

//70 Tall
$g_h_70_tall = 124.4;

//71 Severely Stunted
$g_h_71_severely_stunted = 99.3;

//71 Stunted
$g_h_71_stunted_min = 99.4;
$g_h_71_stunted_max = 104.4;

//71 Normal
$g_h_71_normal_min = 104.5;
$g_h_71_normal_max = 124.8;

//71 Tall
$g_h_71_tall = 124.9;

switch($age_input){
	
	
	case 0:
	
		if($height_input == $g_h_zero_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_zero_stunted_min <= $height_input && $height_input <= $g_h_zero_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_zero_normal_min  <= $height_input && $height_input <= $g_h_zero_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_zero_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}

		break;
		
	case 1:
	
		if($height_input == $g_h_one_severely_stunted){

		$g_h_status = "severely Stunded";

		
	

		}else if($g_h_one_stunted_min <= $height_input && $height_input <= $g_h_one_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_one_normal_min   <= $height_input && $height_input <= $g_h_one_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_one_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}

	
		break;	
	
	case 2:
	
		if($height_input == $g_h_two_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_two_stunted_min <= $height_input && $height_input <= $g_h_two_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_two_normal_min   <= $height_input && $height_input <= $g_h_two_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_two_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 3:
		
		if($height_input == $g_h_three_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_three_stunted_min <= $height_input && $height_input <= $g_h_three_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_three_normal_min   <= $height_input && $height_input <= $g_h_three_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_three_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 4:
	
		if($height_input == $g_h_four_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_four_stunted_min <= $height_input && $height_input <= $g_h_four_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_four_normal_min   <= $height_input && $height_input <= $g_h_four_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_four_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 5:
	
		if($height_input == $g_h_five_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_five_stunted_min <= $height_input && $height_input <= $g_h_five_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_five_normal_mix   <= $height_input && $height_input <= $g_h_five_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_five_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 6:
		
		if($height_input == $g_h_six_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_six_stunted_min <= $height_input && $height_input <= $g_h_six_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_six_normal_min   <= $height_input && $height_input <= $g_h_six_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_six_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
		
		break;
		
	case 7:
	
		if($height_input == $g_h_seven_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_seven_stunted_min <= $height_input && $height_input <= $g_h_seven_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_seven_normal_min   <= $height_input && $height_input <= $g_h_seven_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_seven_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 8:
	
		if($height_input == $g_h_eight_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_eight_stunted_min <= $height_input && $height_input <= $g_h_eight_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_eight_normal_min   <= $height_input && $height_input <= $g_h_eight_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_eight_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 9:
	
		if($height_input == $g_h_nine_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_nine_stunted_min <= $height_input && $height_input <= $g_h_nine_stunted_max) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_nine_normal_min   <= $height_input && $height_input <= $g_h_nine_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_nine_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 10:
	
		if($height_input == $g_h_ten_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_ten_stunted_min <= $height_input && $height_input <= $g_h_ten_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_ten_normal_min   <= $height_input && $height_input <= $g_h_ten_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_ten_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 11:
	
		if($height_input == $g_h_eleven_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_eleven_stunted_min <= $height_input && $height_input <= $g_h_eleven_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_eleven_normal_min   <= $height_input && $height_input <= $g_h_eleven_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_eleven_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	
	case 12:
	
		if($height_input == $g_h_twelve_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_twelve_stunted_min <= $height_input && $height_input <= $g_h_twelve_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_eleven_normal_min   <= $height_input && $height_input <= $g_h_twelve_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_twelve_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
		
	case 13:
	
		if($height_input == $g_h_13_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_13_stunted_min <= $height_input && $height_input <= $g_h_13_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_13_normal_min   <= $height_input && $height_input <= $g_h_13_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_13_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
		
	case 14:
	
		if($height_input == $g_h_14_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_14_stunted_min <= $height_input && $height_input <= $g_h_14_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_14_normal_min   <= $height_input && $height_input <= $g_h_14_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_14_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 15:

		if($height_input == $g_h_15_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_15_stunted_min <= $height_input && $height_input <= $g_h_15_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_15_normal_min   <= $height_input && $height_input <= $g_h_15_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_15_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 16:

		if($height_input == $g_h_16_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_16_stunted_min <= $height_input && $height_input <= $g_h_16_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_16_normal_min   <= $height_input && $height_input <= $g_h_16_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_16_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 17:

		if($height_input == $g_h_17_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_17_stunted_min <= $height_input && $height_input <= $g_h_17_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_17_normal_min   <= $height_input && $height_input <= $g_h_17_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_17_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;

	case 18:

		if($height_input == $g_h_18_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_18_stunted_min <= $height_input && $height_input <= $g_h_18_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_18_normal_min   <= $height_input && $height_input <= $g_h_18_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_18_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}
	
	
		break;	
		
	case 19:

		if($height_input == $g_h_19_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_19_stunted_min <= $height_input && $height_input <= $g_h_19_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_19_normal_min <= $height_input && $height_input <= $g_h_19_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_19_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 20:

		if($height_input == $g_h_20_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_20_stunted_min <= $height_input && $height_input <= $g_h_20_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_20_normal_min <= $height_input && $height_input <= $g_h_20_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_20_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	

	case 21:

		if($height_input == $g_h_21_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_21_stunted_min <= $height_input && $height_input <= $g_h_21_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_21_normal_min <= $height_input && $height_input <= $g_h_21_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_21_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;		
	
	case 22:

		if($height_input == $g_h_22_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_22_stunted_min <= $height_input && $height_input <= $g_h_22_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_22_normal_min <= $height_input && $height_input <= $g_h_22_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_22_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 23:

		if($height_input == $g_h_23_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_23_stunted_min <= $height_input && $height_input <= $g_h_23_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_23_normal_min <= $height_input && $height_input <= $g_h_23_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_23_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 24:

		if($height_input == $g_h_24_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_20_stunted_min <= $height_input && $height_input <= $g_h_20_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_20_normal_min <= $height_input && $height_input <= $g_h_20_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_20_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 25:

		if($height_input == $g_h_25_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_25_stunted_min <= $height_input && $height_input <= $g_h_25_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_25_normal_min <= $height_input && $height_input <= $g_h_25_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_25_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
	
	case 26:

		if($height_input == $g_h_26_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_26_stunted_min <= $height_input && $height_input <= $g_h_26_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_26_normal_min <= $height_input && $height_input <= $g_h_26_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_26_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
		
	case 27:

		if($height_input == $g_h_27_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_20_stunted_min <= $height_input && $height_input <= $g_h_20_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_20_normal_min <= $height_input && $height_input <= $g_h_20_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_20_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 28:

		if($height_input == $g_h_28_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_28_stunted_min <= $height_input && $height_input <= $g_h_28_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_28_normal_min <= $height_input && $height_input <= $g_h_28_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_28_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 29:

		if($height_input == $g_h_29_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_29_stunted_min <= $height_input && $height_input <= $g_h_29_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_29_normal_min <= $height_input && $height_input <= $g_h_29_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_29_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 30:

		if($height_input == $g_h_30_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_30_stunted_min <= $height_input && $height_input <= $g_h_30_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_30_normal_min <= $height_input && $height_input <= $g_h_30_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_30_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 31:

		if($height_input == $g_h_31_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_31_stunted_min <= $height_input && $height_input <= $g_h_31_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_31_normal_min <= $height_input && $height_input <= $g_h_31_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_31_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 32:

		if($height_input == $g_h_32_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_32_stunted_min <= $height_input && $height_input <= $g_h_32_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_32_normal_min <= $height_input && $height_input <= $g_h_32_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_32_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 33:

		if($height_input == $g_h_33_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_33_stunted_min <= $height_input && $height_input <= $g_h_33_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_33_normal_min <= $height_input && $height_input <= $g_h_33_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $_h_33_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	
	case 34:

		if($height_input == $g_h_34_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_34_stunted_min <= $height_input && $height_input <= $g_h_34_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_34_normal_min <= $height_input && $height_input <= $g_h_34_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_34_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
		
	case 35:

		if($height_input == $g_h_35_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_35_stunted_min <= $height_input && $height_input <= $g_h_35_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_35_normal_min <= $height_input && $height_input <= $g_h_35_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_35_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
		
	case 36:

		if($height_input == $g_h_36_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_36_stunted_min <= $height_input && $height_input <= $g_h_36_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_36_normal_min <= $height_input && $height_input <= $g_h_36_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_36_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 37:

		if($height_input == $g_h_37_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_37_stunted_min <= $height_input && $height_input <= $g_h_37_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_37_normal_min <= $height_input && $height_input <= $g_h_37_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_37_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 38:

		if($height_input == $g_h_38_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_38_stunted_min <= $height_input && $height_input <= $g_h_38_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_38_normal_min <= $height_input && $height_input <= $g_h_38_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_38_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 39:

		if($height_input == $g_h_39_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_39_stunted_min <= $height_input && $height_input <= $g_h_39_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_39_normal_min <= $height_input && $height_input <= $g_h_39_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_39_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;

	case 40:

		if($height_input == $g_h_40_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_40_stunted_min <= $height_input && $height_input <= $g_h_40_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_40_normal_min <= $height_input && $height_input <= $g_h_40_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_40_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 41:

		if($height_input == $g_h_41_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_41_stunted_min <= $height_input && $height_input <= $_h_41_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_41_normal_min <= $height_input && $height_input <= $g_h_41_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_41_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 42:

		if($height_input == $g_h_42_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_42_stunted_min <= $height_input && $height_input <= $g_h_42_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_42_normal_min <= $height_input && $height_input <= $g_h_42_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_42_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	

	case 43:

		if($height_input == $g_h_43_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_43_stunted_min <= $height_input && $height_input <= $g_h_43_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_43_normal_min <= $height_input && $height_input <= $g_h_43_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_43_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 44:

		if($height_input == $g_h_44_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_44_stunted_min <= $height_input && $height_input <= $g_h_44_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_44_normal_min <= $height_input && $height_input <= $g_h_44_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_44_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 45:

		if($height_input == $g_h_45_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_45_stunted_min <= $height_input && $height_input <= $g_h_45_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_45_normal_min <= $height_input && $height_input <= $g_h_45_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_45_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 46:

		if($height_input == $g_h_46_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_46_stunted_min <= $height_input && $height_input <= $g_h_46_stunted_min ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_46_normal_min <= $height_input && $height_input <= $g_h_46_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_46_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	

	case 47:

		if($height_input == $g_h_47_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_47_stunted_min <= $height_input && $height_input <= $g_h_47_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_47_normal_min <= $height_input && $height_input <= $g_h_47_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_47_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
		
	
		break;		
	
	case 48:

		if($height_input == $g_h_48_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_48_stunted_min <= $height_input && $height_input <= $g_h_48_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_48_normal_min <= $height_input && $height_input <= $g_h_48_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_48_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 49:

		if($height_input == $g_h_49_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_49_stunted_min <= $height_input && $height_input <= $g_h_49_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_49_normal_min <= $height_input && $height_input <= $g_h_49_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_49_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 50:

		if($height_input == $g_h_50_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_fifty_stunted_min <= $height_input && $height_input <= $g_h_fifty_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_fifty_normal_min <= $height_input && $height_input <= $g_h_fifty_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_fifty_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 51:

		if($height_input == $g_h_51_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_51_stunted_min <= $height_input && $height_input <= $g_h_51_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_51_normal_min <= $height_input && $height_input <= $g_h_51_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_51_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 52:

		if($height_input == $g_h_52_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_52_stunted_min <= $height_input && $height_input <= $g_h_52_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_52_normal_min <= $height_input && $height_input <= $g_h_52_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_52_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 53:

		if($height_input == $g_h_53_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_53_stunted_min <= $height_input && $height_input <= $g_h_53_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_53_normal_min <= $height_input && $height_input <= $g_h_53_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_53_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 54:

		if($height_input == $g_h_54_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_54_stunted_min <= $height_input && $height_input <= $g_h_54_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_54_normal_min <= $height_input && $height_input <= $g_h_54_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_54_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 55:

		if($height_input == $g_h_55_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_55_stunted_min <= $height_input && $height_input <= $g_h_55_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_55_normal_min <= $height_input && $height_input <= $g_h_55_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_55_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 56:

		if($height_input == $g_h_56_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_56_stunted_min <= $height_input && $height_input <= $g_h_56_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_56_normal_min <= $height_input && $height_input <= $g_h_56_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_56_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 57:

		if($height_input == $g_h_57_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_57_stunted_min <= $height_input && $height_input <= $g_h_57_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_57_normal_min <= $height_input && $height_input <= $g_h_57_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_57_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 58:

		if($height_input == $g_h_58_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_58_stunted_min <= $height_input && $height_input <= $g_h_58_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_58_normal_min <= $height_input && $height_input <= $g_h_58_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_58_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 59:

		if($height_input == $g_h_59_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_59_stunted_min <= $height_input && $height_input <= $g_h_59_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_59_normal_min <= $height_input && $height_input <= $g_h_59_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_59_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	
	case 60:

		if($height_input == $g_h_60_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_60_stunted_min <= $height_input && $height_input <= $g_h_60_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_60_normal_min <= $height_input && $height_input <= $g_h_60_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_60_normal_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
		
		
	case 61:

		if($height_input == $g_h_61_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_61_stunted_min <= $height_input && $height_input <= $g_h_61_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_61_normal_min <= $height_input && $height_input <= $g_h_61_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_61_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 62:

		if($height_input == $g_h_62_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_62_stunted_min <= $height_input && $height_input <= $g_h_62_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_62_normal_min <= $height_input && $height_input <= $g_h_62_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_62_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 63:

		if($height_input == $g_h_63_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_63_stunted_min <= $height_input && $height_input <= $g_h_63_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_63_normal_min <= $height_input && $height_input <= $g_h_63_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_63_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;
	
	case 64:

		if($height_input == $g_h_64_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_64_stunted_min <= $height_input && $height_input <= $g_h_64_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_64_normal_min <= $height_input && $height_input <= $g_h_64_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_64_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}			
	
		break;	
	
	case 65:

		if($height_input == $g_h_65_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_65_stunted_min <= $height_input && $height_input <= $g_h_65_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_65_normal_min <= $height_input && $height_input <= $g_h_65_normal_five) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_65_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;

	case 66:

		if($height_input == $g_h_66_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_66_stunted_min <= $height_input && $height_input <= $g_h_66_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_66_normal_min <= $height_input && $height_input <= $g_h_66_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_66_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 67:

		if($height_input == $g_h_67_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_67_stunted_min <= $height_input && $height_input <= $g_h_67_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_67_normal_min <= $height_input && $height_input <= $g_h_67_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_67_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 68:

		if($height_input == $g_h_68_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_68_stunted_min <= $height_input && $height_input <= $g_h_68_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_68_normal_min <= $height_input && $height_input <= $g_h_68_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_68_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;	

	case 69:

		if($height_input == $g_h_69_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_69_stunted_min <= $height_input && $height_input <= $g_h_69_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_69_normal_min <= $height_input && $height_input <= $g_h_69_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_69_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 70:

		if($height_input == $g_h_70_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_70_stunted_min <= $height_input && $height_input <= $g_h_70_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_70_normal_min <= $height_input && $height_input <= $g_h_70_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_70_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}	
	
		break;
		
	case 71:

		if($height_input == $g_h_71_severely_stunted){

		$g_h_status = "Severely Stunted";

		
	

		}else if($g_h_71_stunted_min <= $height_input && $height_input <= $g_h_71_stunted_max ) {

		$g_h_status = "Stunted";

		
	

		}else if($g_h_71_normal_min <= $height_input && $height_input <= $g_h_71_normal_max) {

		$g_h_status = "Normal";
	
		


		}else if($height_input >= $g_h_71_tall){

		$g_h_status = "Tall";

		

		} else {

		$g_h_status = "Invalid Height";

	

		}		
	
		break;	
		
		default:
		
		$b_h_status_2 = "Invalid Age";

	
		
			
}




//0 Severely Underweight
$g_w_zero_severely_underweight = 2.0;

//0 Underweight
$g_w_zero_underweight_min = 2.1;
$zero_underweight_max = 2.3;

//0 Normal
$g_w_zero_normal_min = 2.4;
$g_w_zero_normal_max = 4.2;

//0 Overweight
$g_w_zero_overweight = 4.3;

//1 Severely Underweight
$g_w_one_severely_underweight = 2.7;

//1 Underweight
$g_w_one_underweight_min = 2.8;
$g_w_one_underweight_max = 3.1;

//1 Normal
$g_w_one_normal_min = 3.2;
$g_w_one_normal_max = 5.5;

//1 Overweight
$g_w_one_overweight = 5.6;

//2 Severely Underweight
$g_w_two_severely_underweight = 3.4;

//2 Underweight
$g_w_two_underweight_min = 3.5;
$g_w_two_underweight_max = 3.8;

//2 Normal
$g_w_two_normal_min = 3.9;
$g_w_two_normal_max = 6.6;

//2 Overweight
$g_w_two_overweight = 6.7;

//3 Severely Underweight
$g_w_three_severely_underweight = 4.0;

//3 Underweight
$g_w_three_underweight_min = 4.1;
$g_w_three_underweight_max = 4.4;

//3 Normal
$g_w_three_normal_min = 4.5;
$g_w_three_normal_max = 7.5;

//3 Overweight
$g_w_three_overweight = 7.6;

//4 Severely Underweight
$g_w_four_severely_underweight = 4.4;

//4 Underweight
$g_w_four_underweight_min = 4.5;
$g_w_four_underweight_max = 4.9;

//4 Normal
$g_w_four_normal_min = 5.0;
$g_w_four_normal_max = 8.2;

//4 Overweight
$g_w_four_overweight = 8.3;

//5 Severely Underweight
$g_w_five_severely_underweight = 4.8;

//5 Underweight
$g_w_five_underweight_min = 4.9;
$g_w_five_underweight_max = 5.3;

//5 Normal
$g_w_five_normal_min = 5.4;
$g_w_five_normal_max = 8.8;

//5 Overweight
$g_w_five_overweight = 8.9;

//6 Severely Underweight
$g_w_six_severely_underweight = 5.1;

//6 Underweight
$g_w_six_underweight_min = 5.2;
$g_w_six_underweight_max = 5.6;

//6 Normal
$g_w_six_normal_min = 5.7;
$g_w_six_normal_max = 9.3;

//6 Overweight
$g_w_six_overweight = 9.4;

//7 Severely Underweight
$g_w_seven_severely_underweight = 5.3;

//7 Underweight
$g_w_seven_underweight_min = 5.4;
$g_w_seven_underweight_max = 5.9;

//7 Normal
$g_w_seven_normal_min = 6.0;
$g_w_seven_normal_max = 9.8;

//7 Overweight
$g_w_seven_overweight = 9.9;

//8 Severely Underweight
$g_w_eight_severely_underweight = 5.6;

//8 Underweight
$g_w_eight_underweight_min = 5.7;
$g_w_eight_underweight_max = 6.2;

//8 Normal
$g_w_eight_normal_min = 6.3;
$g_w_eight_normal_max = 10.2;

//8 Overweight
$g_w_eight_overweight = 10.3;

//9 Severely Underweight
$g_w_nine_severely_underweight = 5.8;

//9 Underweight
$g_w_nine_underweight_min = 5.9;
$g_w_nine_underweight_max = 6.4;

//9 Normal
$g_w_nine_normal_min = 6.5;
$g_w_nine_normal_max = 10.5;

//9 Overweight
$g_w_nine_overweight = 10.6;

//10 Severely Underweight
$g_w_ten_severely_underweight = 5.9;

//10 Underweight
$g_w_ten_underweight_min = 6.0;
$g_w_ten_underweight_max = 6.6;

//10 Normal
$g_w_ten_normal_min = 6.7;
$g_w_ten_normal_max = 10.9;

//10 Overweight
$g_w_ten_overweight = 11.0;

//11 Severely Underweight
$g_w_eleven_severely_underweight = 6.1;

//11 Underweight
$g_w_eleven_underweight_min = 6.2;
$g_w_eleven_underweight_max = 6.8;

//11 Normal
$g_w_eleven_normal_min = 6.9;
$g_w_eleven_normal_max = 11.2;

//11 Overweight
$g_w_eleven_overweight = 11.3;

//12 Severely Underweight
$g_w_twelve_severely_underweight = 6.3;

//12 Underweight
$g_w_twelve_underweight_min = 6.4;
$g_w_twelve_underweight_max = 6.9;

//12 Normal
$g_w_twelve_normal_min = 7.0;
$g_w_twelve_normal_max = 11.5;

//12 Overweight
$g_w_twelve_overweight = 11.6;

//13 Severely Underweight
$g_w_13_severely_underweight = 6.4;

//13 Underweight
$g_w_13_underweight_min = 6.5;
$g_w_13_underweight_max = 7.1;

//13 Normal
$g_w_13_normal_min = 7.2;
$g_w_13_normal_max = 11.8;

//13 Overweight
$g_w_13_overweight = 11.9;

//14 Severely Underweight
$g_w_14_severely_underweight = 6.6;

//14 Underweight
$g_w_14_underweight_min = 6.7;
$g_w_14_underweight_max = 7.3;

//14 Normal
$g_w_14_normal_min = 7.4;
$g_w_14_normal_max = 12.1;

//14 Overweight
$g_w_14_overweight = 12.2;

//15 Severely Underweight
$g_w_15_severely_underweight = 6.7;

//15 Underweight
$g_w_15_underweight_min = 6.8;
$g_w_15_underweight_max = 7.5;

//15 Normal
$g_w_15_normal_min = 7.6;
$g_w_15_normal_max = 12.4;

//15 Overweight
$g_w_15_overweight = 12.5;

//16 Severely Underweight
$g_w_16_severely_underweight = 6.9;

//16 Underweight
$g_w_16_underweight_min = 7.0;
$g_w_16_underweight_max = 7.6;

//16 Normal
$g_w_16_normal_min = 7.7;
$g_w_16_normal_max = 12.6;

//16 Overweight
$g_w_16_overweight = 12.7;

//17 Severely Underweight
$g_w_17_severely_underweight = 7.0;

//17 Underweight
$g_w_17_underweight_min = 7.1;
$g_w_17_underweight_max = 7.8;

//17 Normal
$g_w_17_normal_min = 7.9;
$g_w_17_normal_max = 12.9;

//17 Overweight
$g_w_17_overweight = 13.0;

//18 Severely Underweight
$g_w_18_severely_underweight = 7.2;

//18 Underweight
$g_w_18_underweight_min = 7.3;
$g_w_18_underweight_max = 8.0;

//18 Normal
$g_w_18_normal_min = 8.1;
$g_w_18_normal_max = 13.2;

//18 Overweight
$g_w_18_overweight = 13.3;

//19 Severely Underweight
$g_w_19_severely_underweight = 7.3;

//19 Underweight
$g_w_19_underweight_min = 7.4;
$g_w_19_underweight_max = 8.1;

//19 Normal
$g_w_19_normal_min = 8.2;
$g_w_19_normal_max = 13.5;

//19 Overweight
$g_w_19_overweight = 13.6;

//20 Severely Underweight
$g_w_20_severely_underweight = 7.5;

//20 Underweight
$g_w_20_underweight_min = 7.6;
$g_w_20_underweight_max = 8.3;

//20 Normal
$g_w_20_normal_min = 8.4;
$g_w_20_normal_max = 13.7;

//20 Overweight
$g_w_20_overweight = 13.8;

//21 Severely Underweight
$g_w_21_severely_underweight = 7.6;

//21 Underweight
$g_w_21_underweight_min = 7.7;
$g_w_21_underweight_max = 8.5;

//21 Normal
$g_w_21_normal_min = 8.6;
$g_w_21_normal_max = 14.0;

//21 Overweight
$g_w_21_overweight = 14.1;

//22 Severely Underweight
$g_w_22_severely_underweight = 7.8;

//22 Underweight
$g_w_22_underweight_min = 7.9;
$g_w_22_underweight_max = 8.6;

//22 Normal
$g_w_22_normal_min = 8.7;
$g_w_22_normal_max = 14.3;

//22 Overweight
$g_w_22_overweight = 14.4;

//23 Severely Underweight
$g_w_23_severely_underweight = 7.9;

//23 Underweight
$g_w_23_underweight_min = 8.0;
$g_w_23_underweight_max = 8.8;

//23 Normal
$g_w_23_normal_min = 8.9;
$g_w_23_normal_max = 14.6;

//23 Overweight
$g_w_23_overweight = 14.7;

//24 Severely Underweight
$g_w_24_severely_underweight = 8.1;

//24 Underweight
$g_w_24_underweight_min = 8.2;
$g_w_24_underweight_max = 8.9;

//24 Normal
$g_w_24_normal_min = 9.0;
$g_w_24_normal_max = 14.8;

//24 Overweight
$g_w_24_overweight = 14.9;

//25 Severely Underweight
$g_w_25_severely_underweight = 8.2;

//25 Underweight
$g_w_25_underweight_min = 8.3;
$g_w_25_underweight_max = 9.1;

//25 Normal
$g_w_25_normal_min = 9.2;
$g_w_25_normal_max = 15.1;

//25 Overweight
$g_w_25_overweight = 15.2;

//26 Severely Underweight
$g_w_26_severely_underweight = 8.4;

//26 Underweight
$g_w_26_underweight_min = 8.5;
$g_w_26_underweight_max = 9.3;

//26 Normal
$g_w_26_normal_min = 9.4;
$g_w_26_normal_max = 15.4;

//26 Overweight
$g_w_26_overweight = 15.5;

//27 Severely Underweight
$g_w_27_severely_underweight = 8.5;

//27 Underweight
$g_w_27_underweight_min = 8.6;
$g_w_27_underweight_max = 9.4;

//27 Normal
$g_w_27_normal_min = 9.5;
$g_w_27_normal_max = 15.7;

//27 Overweight
$g_w_27_overweight = 15.8;

//28 Severely Underweight
$g_w_28_severely_underweight = 8.6;

//28 Underweight
$g_w_28_underweight_min = 8.7;
$g_w_28_underweight_max = 9.6;

//28 Normal
$g_w_28_normal_min = 9.7;
$g_w_28_normal_max = 16.0;

//28 Overweight
$g_w_28_overweight = 16.1;

//29 Severely Underweight
$g_w_29_severely_underweight = 8.8;

//29 Underweight
$g_w_29_underweight_min = 8.9;
$g_w_29_underweight_max = 9.7;

//29 Normal
$g_w_29_normal_min = 9.8;
$g_w_29_normal_max = 16.2;

//29 Overweight
$g_w_29_overweight = 16.3;

//30 Severely Underweight
$g_w_30_severely_underweight = 8.9;

//30 Underweight
$g_w_30_underweight_min = 9.0;
$g_w_30_underweight_max = 9.9;

//30 Normal
$g_w_30_normal_min = 10.0;
$g_w_30_normal_max = 16.5;

//30 Overweight
$g_w_30_overweight = 16.6;

//31 Severely Underweight
$g_w_31_severely_underweight = 9.0;

//31 Underweight
$g_w_31_underweight_min = 9.1;
$g_w_31_underweight_max = 10.0;

//31 Normal
$g_w_31_normal_min = 10.1;
$g_w_31_normal_max = 16.8;

//31 Overweight
$g_w_31_overweight = 16.9;

//32 Severely Underweight
$g_w_32_severely_underweight = 9.1;

//32 Underweight
$g_w_32_underweight_min = 9.2;
$g_w_32_underweight_max = 10.2;

//32 Normal
$g_w_32_normal_min = 10.3;
$g_w_32_normal_max = 17.1;

//32 Overweight
$g_w_32_overweight = 17.2;

//33 Severely Underweight
$g_w_33_severely_underweight = 9.3;

//33 Underweight
$g_w_33_underweight_min = 9.4;
$g_w_33_underweight_max = 10.3;

//33 Normal
$g_w_33_normal_min = 10.4;
$g_w_33_normal_max = 17.3;

//33 Overweight
$g_w_33_overweight = 17.4;

//34 Severely Underweight
$g_w_34_severely_underweight = 9.4;

//34 Underweight
$g_w_34_underweight_min = 9.5;
$g_w_34_underweight_max = 10.4;

//34 Normal
$g_w_34_normal_min = 10.5;
$g_w_34_normal_max = 17.6;

//34 Overweight
$g_w_34_overweight = 17.7;

//35 Severely Underweight
$g_w_35_severely_underweight = 9.5;

//35 Underweight
$g_w_35_underweight_min = 9.6;
$g_w_35_underweight_max = 10.6;

//35 Normal
$g_w_35_normal_min = 10.7;
$g_w_35_normal_max = 17.9;

//35 Overweight
$g_w_35_overweight = 18.0;

//36 Severely Underweight
$g_w_36_severely_underweight = 9.6;

//36 Underweight
$g_w_36_underweight_min = 9.7;
$g_w_36_underweight_max = 10.7;

//36 Normal
$g_w_36_normal_min = 10.8;
$g_w_36_normal_max = 18.1;

//36 Overweight
$g_w_36_overweight = 18.2;

//37 Severely Underweight
$g_w_37_severely_underweight = 9.7;

//37 Underweight
$g_w_37_underweight_min = 9.8;
$g_w_37_underweight_max = 10.8;

//37 Normal
$g_w_37_normal_min = 10.9;
$g_w_37_normal_max = 18.4;

//37 Overweight
$g_w_37_overweight = 18.5;

//38 Severely Underweight
$g_w_38_severely_underweight = 9.8;

//38 Underweight
$g_w_38_underweight_min = 9.9;
$g_w_38_underweight_max = 11.0;

//38 Normal
$g_w_38_normal_min = 11.1;
$g_w_38_normal_max = 18.7;

//38 Overweight
$g_w_38_overweight = 18.8;

//39 Severely Underweight
$g_w_39_severely_underweight = 9.9;

//39 Underweight
$g_w_39_underweight_min = 10.0;
$g_w_39_underweight_max = 11.1;

//39 Normal
$g_w_39_normal_min = 11.2;
$g_w_39_normal_max = 19.0;

//39 Overweight
$g_w_39_overweight = 19.1;

//40 Severely Underweight
$g_w_40_severely_underweight = 10.1;

//40 Underweight
$g_w_40_underweight_min = 10.2;
$g_w_40_underweight_max = 11.2;

//40 Normal
$g_w_40_normal_min = 11.3;
$g_w_40_normal_max = 19.2;

//40 Overweight
$g_w_40_overweight = 19.3;

//41 Severely Underweight
$g_w_41_severely_underweight = 10.2;

//41 Underweight
$g_w_41_underweight_min = 10.3;
$g_w_41_underweight_max = 11.4;

//41 Normal
$g_w_41_normal_min = 11.5;
$g_w_41_normal_max = 19.5;

//41 Overweight
$g_w_41_overweight = 19.6;

//42 Severely Underweight
$g_w_42_severely_underweight = 10.3;

//42 Underweight
$g_w_42_underweight_min = 10.4;
$g_w_42_underweight_max = 11.5;

//42 Normal
$g_w_42_normal_min = 11.6;
$g_w_42_normal_max = 19.8;

//42 Overweight
$g_w_42_overweight = 19.9;

//43 Severely Underweight
$g_w_43_severely_underweight = 10.4;

//43 Underweight
$g_w_43_underweight_min = 10.5;
$g_w_43_underweight_max = 11.6;

//43 Normal
$g_w_43_normal_min = 11.7;
$g_w_43_normal_max = 20.1;

//43 Overweight
$g_w_43_overweight = 20.2;

//44 Severely Underweight
$g_w_44_severely_underweight = 10.5;

//44 Underweight
$g_w_44_underweight_min = 10.6;
$g_w_44_underweight_max = 11.7;

//44 Normal
$g_w_44_normal_min = 11.8;
$g_w_44_normal_max = 20.4;

//44 Overweight
$g_w_44_overweight = 20.5;

//45 Severely Underweight
$g_w_45_severely_underweight = 10.6;

//45 Underweight
$g_w_45_underweight_min = 10.7;
$g_w_45_underweight_max = 11.9;

//45 Normal
$g_w_45_normal_min = 12.0;
$g_w_45_normal_max = 20.7;

//45 Overweight
$g_w_45_overweight = 20.8;

//46 Severely Underweight
$g_w_46_severely_underweight = 10.7;

//46 Underweight
$g_w_46_underweight_min = 10.8;
$g_w_46_underweight_max = 12.0;

//46 Normal
$g_w_46_normal_min = 12.1;
$g_w_46_normal_max = 20.9;

//46 Overweight
$g_w_46_overweight = 21.0;

//47 Severely Underweight
$g_w_47_severely_underweight = 10.8;

//47 Underweight
$g_w_47_underweight_min = 10.9;
$g_w_47_underweight_max = 12.1;

//47 Normal
$g_w_47_normal_min = 12.2;
$g_w_47_normal_max = 21.2;

//47 Overweight
$g_w_47_overweight = 21.3;

//48 Severely Underweight
$g_w_48_severely_underweight = 10.9;

//48 Underweight
$g_w_48_underweight_min = 11.0;
$g_w_48_underweight_max = 12.2;

//48 Normal
$g_w_48_normal_min = 12.3;
$g_w_48_normal_max = 21.5;

//48 Overweight
$g_w_48_overweight = 21.6;

//49 Severely Underweight
$g_w_49_severely_underweight = 11.0;

//49 Underweight
$g_w_49_underweight_min = 11.1;
$g_w_49_underweight_max = 12.3;

//49 Normal
$g_w_49_normal_min = 12.4;
$g_w_49_normal_max = 21.8;

//49 Overweight
$g_w_49_overweight = 21.9;

//50 Severely Underweight
$g_w_50_severely_underweight = 11.1;

//50 Underweight
$g_w_50_underweight_min = 11.2;
$g_w_50_underweight_max = 12.4;

//50 Normal
$g_w_50_normal_min = 12.5;
$g_w_50_normal_max = 22.1;

//50 Overweight
$g_w_50_overweight = 22.2;

//51 Severely Underweight
$g_w_51_severely_underweight = 11.2;

//51 Underweight
$g_w_51_underweight_min = 11.3;
$g_w_51_underweight_max = 12.6;

//51 Normal
$g_w_51_normal_min = 12.7;
$g_w_51_normal_max = 22.4;

//51 Overweight
$g_w_51_overweight = 22.5;

//52 Severely Underweight
$g_w_52_severely_underweight = 11.3;

//52 Underweight
$g_w_52_underweight_min = 11.4;
$g_w_52_underweight_max = 12.7;

//52 Normal
$g_w_52_normal_min = 12.8;
$g_w_52_normal_max = 22.6;

//52 Overweight
$g_w_52_overweight = 22.7;

//53 Severely Underweight
$g_w_53_severely_underweight = 11.4;

//53 Underweight
$g_w_53_underweight_min = 11.5;
$g_w_53_underweight_max = 12.8;

//53 Normal
$g_w_53_normal_min = 12.9;
$g_w_53_normal_max = 22.9;

//53 Overweight
$g_w_53_overweight = 23.0;

//54 Severely Underweight
$g_w_54_severely_underweight = 11.5;

//54 Underweight
$g_w_54_underweight_min = 11.6;
$g_w_54_underweight_max = 12.9;

//54 Normal
$g_w_54_normal_min = 13.0;
$g_w_54_normal_max = 23.2;

//54 Overweight
$g_w_54_overweight = 23.3;

//55 Severely Underweight
$g_w_55_severely_underweight = 11.6;

//55 Underweight
$g_w_55_underweight_min = 11.7;
$g_w_55_underweight_max = 13.1;

//55 Normal
$g_w_55_normal_min = 13.2;
$g_w_55_normal_max = 23.5;

//55 Overweight
$g_w_55_overweight = 23.6;

//56 Severely Underweight
$g_w_56_severely_underweight = 11.7;

//56 Underweight
$g_w_56_underweight_min = 11.8;
$g_w_56_underweight_max = 13.2;

//56 Normal
$g_w_56_normal_min = 13.3;
$g_w_56_normal_max = 23.8;

//56 Overweight
$g_w_56_overweight = 23.9;

//57 Severely Underweight
$g_w_57_severely_underweight = 11.8;

//57 Underweight
$g_w_57_underweight_min = 11.9;
$g_w_57_underweight_max = 13.3;

//57 Normal
$g_w_57_normal_min = 13.4;
$g_w_57_normal_max = 24.1;

//57 Overweight
$g_w_57_overweight = 24.2;

//58 Severely Underweight
$g_w_58_severely_underweight = 11.9;

//58 Underweight
$g_w_58_underweight_min = 12.0;
$g_w_58_underweight_max = 13.4;

//58 Normal
$g_w_58_normal_min = 13.5;
$g_w_58_normal_max = 24.4;

//58 Overweight
$g_w_58_overweight = 24.5;

//59 Severely Underweight
$g_w_59_severely_underweight = 12.0;

//59 Underweight
$g_w_59_underweight_min = 12.1;
$g_w_59_underweight_max = 13.5;

//59 Normal
$g_w_59_normal_min = 13.6;
$g_w_59_normal_max = 24.6;

//59 Overweight
$g_w_59_overweight = 24.7;

//60 Severely Underweight
$g_w_60_severely_underweight = 12.1;

//60 Underweight
$g_w_60_underweight_min = 12.2;
$g_w_60_underweight_max = 13.6;

//60 Normal
$g_w_60_normal_min = 13.7;
$g_w_60_normal_max = 24.7;

//60 Overweight
$g_w_60_overweight = 24.8;

//61 Severely Underweight
$g_w_61_severely_underweight = 12.4;

//61 Underweight
$g_w_61_underweight_min = 12.5;
$g_w_61_underweight_max = 13.9;

//61 Normal
$g_w_61_normal_min = 14.0;
$g_w_61_normal_max = 24.8;

//61 Overweight
$g_w_61_overweight = 24.9;

//62 Severely Underweight
$g_w_62_severely_underweight = 12.5;

//62 Underweight
$g_w_62_underweight_min = 12.6;
$g_w_62_underweight_max = 14.0;

//62 Normal
$g_w_62_normal_min = 14.1;
$g_w_62_normal_max = 25.1;

//62 Overweight
$g_w_62_overweight = 25.2;

//63 Severely Underweight
$g_w_63_severely_underweight = 12.6;

//63 Underweight
$g_w_63_underweight_min = 12.7;
$g_w_63_underweight_max = 14.1;

//63 Normal
$g_w_63_normal_min = 14.2;
$g_w_63_normal_max = 25.4;

//63 Overweight
$g_w_63_overweight = 25.5;

//64 Severely Underweight
$g_w_64_severely_underweight = 12.7;

//64 Underweight
$g_w_64_underweight_min = 12.8;
$g_w_64_underweight_max = 14.2;

//64 Normal
$g_w_64_normal_min = 14.3;
$g_w_64_normal_max = 25.6;

//64 Overweight
$g_w_64_overweight = 25.7;

//65 Severely Underweight
$g_w_65_severely_underweight = 12.8;

//65 Underweight
$g_w_65_underweight_min = 12.9;
$g_w_65_underweight_max = 14.3;

//65 Normal
$g_w_65_normal_min = 14.4;
$g_w_65_normal_max = 25.9;

//65 Overweight
$g_w_65_overweight = 26.0;

//66 Severely Underweight
$g_w_66_severely_underweight = 12.9;

//66 Underweight
$g_w_66_underweight_min = 13.0;
$g_w_66_underweight_max = 14.5;

//66 Normal
$g_w_66_normal_min = 14.6;
$g_w_66_normal_max = 26.2;

//66 Overweight
$g_w_66_overweight = 26.3;

//67 Severely Underweight
$g_w_67_severely_underweight = 13.0;

//67 Underweight
$g_w_67_underweight_min = 13.1;
$g_w_67_underweight_max = 14.6;

//67 Normal
$g_w_67_normal_min = 14.7;
$g_w_67_normal_max = 26.5;

//67 Overweight
$g_w_67_overweight = 26.6;

//68 Severely Underweight
$g_w_68_severely_underweight = 13.1;

//68 Underweight
$g_w_68_underweight_min = 13.2;
$g_w_68_underweight_max = 14.7;

//68 Normal
$g_w_68_normal_min = 14.8;
$g_w_68_normal_max = 26.7;

//68 Overweight
$g_w_68_overweight = 26.8;

//69 Severely Underweight
$g_w_69_severely_underweight = 13.2;

//69 Underweight
$g_w_69_underweight_min = 13.3;
$g_w_69_underweight_max = 14.8;

//69 Normal
$g_w_69_normal_min = 14.9;
$g_w_69_normal_max = 27.0;

//69 Overweight
$g_w_69_overweight = 27.1;

//70 Severely Underweight
$g_w_70_severely_underweight = 13.3;

//70 Underweight
$g_w_70_underweight_min = 13.4;
$g_w_70_underweight_max = 14.9;

//70 Normal
$g_w_70_normal_min = 15.0;
$g_w_70_normal_max = 27.3;

//70 Overweight
$g_w_70_overweight = 27.4;

//71 Severely Underweight
$g_w_71_severely_underweight = 13.4;

//71 Underweight
$g_w_71_underweight_min = 13.5;
$g_w_71_underweight_max = 15.1;

//71 Normal
$g_w_71_normal_min = 15.2;
$g_w_71_normal_max = 27.6;

//71 Overweight
$g_w_71_overweight = 27.7;

switch($age_input){
	
	
	case 0:
	
		if($weight_input == $g_w_zero_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_zero_underweight_min <= $weight_input && $weight_input <= $g_w_zero_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_zero_normal_min  <= $weight_input && $weight_input <= $g_w_zero_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_zero_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}

		break;
		
	case 1:
	
		if($weight_input == $g_w_one_severely_underweight){

		$g_w_status = "severely Stunded";

		
	

		}else if($g_w_one_underweight_min <= $weight_input && $weight_input <= $g_w_one_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_one_normal_min   <= $weight_input && $weight_input <= $g_w_one_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_one_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}

	
		break;	
	
	case 2:
	
		if($weight_input == $g_w_two_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_two_underweight_min <= $weight_input && $weight_input <= $g_w_two_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_two_normal_min   <= $weight_input && $weight_input <= $g_w_two_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_two_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
	
	case 3:
		
		if($weight_input == $g_w_three_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_three_underweight_min <= $weight_input && $weight_input <= $g_w_three_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_three_normal_min   <= $weight_input && $weight_input <= $g_w_three_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_three_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
	
	case 4:
	
		if($weight_input == $g_w_four_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_four_underweight_min <= $weight_input && $weight_input <= $g_w_four_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_four_normal_min   <= $weight_input && $weight_input <= $g_w_four_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_four_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 5:
	
		if($weight_input == $g_w_five_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_five_underweight_min <= $weight_input && $weight_input <= $g_w_five_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_five_normal_mix   <= $weight_input && $weight_input <= $g_w_five_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_five_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 6:
		
		if($weight_input == $g_w_six_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_six_underweight_min <= $weight_input && $weight_input <= $g_w_six_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_six_normal_min   <= $weight_input && $weight_input <= $g_w_six_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_six_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
		
		break;
		
	case 7:
	
		if($weight_input == $g_w_seven_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_seven_underweight_min <= $weight_input && $weight_input <= $g_w_seven_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_seven_normal_min   <= $weight_input && $weight_input <= $g_w_seven_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_seven_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 8:
	
		if($weight_input == $g_w_eight_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_eight_underweight_min <= $weight_input && $weight_input <= $g_w_eight_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_eight_normal_min   <= $weight_input && $weight_input <= $g_w_eight_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_eight_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 9:
	
		if($weight_input == $g_w_nine_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_nine_underweight_min <= $weight_input && $weight_input <= $g_w_nine_underweight_max) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_nine_normal_min   <= $weight_input && $weight_input <= $g_w_nine_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_nine_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 10:
	
		if($weight_input == $g_w_ten_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_ten_underweight_min <= $weight_input && $weight_input <= $g_w_ten_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_ten_normal_min   <= $weight_input && $weight_input <= $g_w_ten_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_ten_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 11:
	
		if($weight_input == $g_w_eleven_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_eleven_underweight_min <= $weight_input && $weight_input <= $g_w_eleven_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_eleven_normal_min   <= $weight_input && $weight_input <= $g_w_eleven_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_eleven_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
	
	case 12:
	
		if($weight_input == $g_w_twelve_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_twelve_underweight_min <= $weight_input && $weight_input <= $g_w_twelve_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_eleven_normal_min   <= $weight_input && $weight_input <= $g_w_twelve_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_twelve_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
		
	case 13:
	
		if($weight_input == $g_w_13_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_13_underweight_min <= $weight_input && $weight_input <= $g_w_13_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_13_normal_min   <= $weight_input && $weight_input <= $g_w_13_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_13_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
		
	case 14:
	
		if($weight_input == $g_w_14_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_14_underweight_min <= $weight_input && $weight_input <= $g_w_14_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_14_normal_min   <= $weight_input && $weight_input <= $g_w_14_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_14_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 15:

		if($weight_input == $g_w_15_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_15_underweight_min <= $weight_input && $weight_input <= $g_w_15_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_15_normal_min   <= $weight_input && $weight_input <= $g_w_15_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_15_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 16:

		if($weight_input == $g_w_16_severely_underweight){

		$g_w_severely_status = "Severely Underweight";

		
	

		}else if($g_w_16_underweight_min <= $weight_input && $weight_input <= $g_w_16_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_16_normal_min   <= $weight_input && $weight_input <= $g_w_16_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_16_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 17:

		if($weight_input == $g_w_17_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_17_underweight_min <= $weight_input && $weight_input <= $g_w_17_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_17_normal_min   <= $weight_input && $weight_input <= $g_w_17_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_17_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;

	case 18:

		if($weight_input == $g_w_18_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_18_underweight_min <= $weight_input && $weight_input <= $g_w_18_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_18_normal_min   <= $weight_input && $weight_input <= $g_w_18_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_18_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}
	
	
		break;	
		
	case 19:

		if($weight_input == $g_w_19_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_19_underweight_min <= $weight_input && $weight_input <= $g_w_19_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_19_normal_min <= $weight_input && $weight_input <= $g_w_19_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_19_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 20:

		if($weight_input == $g_w_20_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_20_underweight_min <= $weight_input && $weight_input <= $g_w_20_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_20_normal_min <= $weight_input && $weight_input <= $g_w_20_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_20_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	

	case 21:

		if($weight_input == $g_w_21_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_21_underweight_min <= $weight_input && $weight_input <= $g_w_21_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_21_normal_min <= $weight_input && $weight_input <= $g_w_21_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_21_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;		
	
	case 22:

		if($weight_input == $g_w_22_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_22_underweight_min <= $weight_input && $weight_input <= $g_w_22_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_22_normal_min <= $weight_input && $weight_input <= $g_w_22_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_22_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 23:

		if($weight_input == $g_w_23_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_23_underweight_min <= $weight_input && $weight_input <= $g_w_23_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_23_normal_min <= $weight_input && $weight_input <= $g_w_23_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_23_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 24:

		if($weight_input == $g_w_24_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_20_underweight_min <= $weight_input && $weight_input <= $g_w_20_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_20_normal_min <= $weight_input && $weight_input <= $g_w_20_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_20_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
	
	case 25:

		if($weight_input == $g_w_25_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_25_underweight_min <= $weight_input && $weight_input <= $g_w_25_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_25_normal_min <= $weight_input && $weight_input <= $g_w_25_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_25_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
	
	case 26:

		if($weight_input == $g_w_26_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_26_underweight_min <= $weight_input && $weight_input <= $g_w_26_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_26_normal_min <= $weight_input && $weight_input <= $g_w_26_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_26_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
		
	case 27:

		if($weight_input == $g_w_27_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_20_underweight_min <= $weight_input && $weight_input <= $g_w_20_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_20_normal_min <= $weight_input && $weight_input <= $g_w_20_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_20_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 28:

		if($weight_input == $g_w_28_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_28_underweight_min <= $weight_input && $weight_input <= $g_w_28_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_28_normal_min <= $weight_input && $weight_input <= $g_w_28_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_28_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 29:

		if($weight_input == $g_w_29_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_29_underweight_min <= $weight_input && $weight_input <= $g_w_29_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_29_normal_min <= $weight_input && $weight_input <= $g_w_29_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_29_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 30:

		if($weight_input == $g_w_30_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_30_underweight_min <= $weight_input && $weight_input <= $g_w_30_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_30_normal_min <= $weight_input && $weight_input <= $g_w_30_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_30_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 31:

		if($weight_input == $g_w_31_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_31_underweight_min <= $weight_input && $weight_input <= $g_w_31_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_31_normal_min <= $weight_input && $weight_input <= $g_w_31_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_31_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 32:

		if($weight_input == $g_w_32_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_32_underweight_min <= $weight_input && $weight_input <= $g_w_32_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_32_normal_min <= $weight_input && $weight_input <= $g_w_32_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_32_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 33:

		if($weight_input == $g_w_33_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_33_underweight_min <= $weight_input && $weight_input <= $g_w_33_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_33_normal_min <= $weight_input && $weight_input <= $g_w_33_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $_h_33_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
	
	case 34:

		if($weight_input == $g_w_34_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_34_underweight_min <= $weight_input && $weight_input <= $g_w_34_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_34_normal_min <= $weight_input && $weight_input <= $g_w_34_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_34_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
		
	case 35:

		if($weight_input == $g_w_35_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_35_underweight_min <= $weight_input && $weight_input <= $g_w_35_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_35_normal_min <= $weight_input && $weight_input <= $g_w_35_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_35_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
		
	case 36:

		if($weight_input == $g_w_36_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_36_underweight_min <= $weight_input && $weight_input <= $g_w_36_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_36_normal_min <= $weight_input && $weight_input <= $g_w_36_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_36_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 37:

		if($weight_input == $g_w_37_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_37_underweight_min <= $weight_input && $weight_input <= $g_w_37_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_37_normal_min <= $weight_input && $weight_input <= $g_w_37_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_37_overweight){

		$g_w_severely_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 38:

		if($weight_input == $g_w_38_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_38_underweight_min <= $weight_input && $weight_input <= $g_w_38_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_38_normal_min <= $weight_input && $weight_input <= $g_w_38_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_38_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 39:

		if($weight_input == $g_w_39_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_39_underweight_min <= $weight_input && $weight_input <= $g_w_39_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_39_normal_min <= $weight_input && $weight_input <= $g_w_39_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_39_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;

	case 40:

		if($weight_input == $g_w_40_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_40_underweight_min <= $weight_input && $weight_input <= $g_w_40_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_40_normal_min <= $weight_input && $weight_input <= $g_w_40_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_40_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 41:

		if($weight_input == $g_w_41_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_41_underweight_min <= $weight_input && $weight_input <= $_h_41_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_41_normal_min <= $weight_input && $weight_input <= $g_w_41_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_41_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 42:

		if($weight_input == $g_w_42_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_42_underweight_min <= $weight_input && $weight_input <= $g_w_42_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_42_normal_min <= $weight_input && $weight_input <= $g_w_42_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_42_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	

	case 43:

		if($weight_input == $g_w_43_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_43_underweight_min <= $weight_input && $weight_input <= $g_w_43_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_43_normal_min <= $weight_input && $weight_input <= $g_w_43_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_43_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 44:

		if($weight_input == $g_w_44_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_44_underweight_min <= $weight_input && $weight_input <= $g_w_44_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_44_normal_min <= $weight_input && $weight_input <= $g_w_44_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_44_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
	case 45:

		if($weight_input == $g_w_45_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_45_underweight_min <= $weight_input && $weight_input <= $g_w_45_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_45_normal_min <= $weight_input && $weight_input <= $g_w_45_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_45_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 46:

		if($weight_input == $g_w_46_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_46_underweight_min <= $weight_input && $weight_input <= $g_w_46_underweight_min ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_46_normal_min <= $weight_input && $weight_input <= $g_w_46_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_46_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	

	case 47:

		if($weight_input == $g_w_47_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_47_underweight_min <= $weight_input && $weight_input <= $g_w_47_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_47_normal_min <= $weight_input && $weight_input <= $g_w_47_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_47_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
		
	
		break;		
	
	case 48:

		if($weight_input == $g_w_48_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_48_underweight_min <= $weight_input && $weight_input <= $g_w_48_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_48_normal_min <= $weight_input && $weight_input <= $g_w_48_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_48_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 49:

		if($weight_input == $g_w_49_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_49_underweight_min <= $weight_input && $weight_input <= $g_w_49_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_49_normal_min <= $weight_input && $weight_input <= $g_w_49_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_49_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 50:

		if($weight_input == $g_w_50_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_fifty_underweight_min <= $weight_input && $weight_input <= $g_w_fifty_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_fifty_normal_min <= $weight_input && $weight_input <= $g_w_fifty_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_fifty_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 51:

		if($weight_input == $g_w_51_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_51_underweight_min <= $weight_input && $weight_input <= $g_w_51_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_51_normal_min <= $weight_input && $weight_input <= $g_w_51_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_51_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 52:

		if($weight_input == $g_w_52_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_52_underweight_min <= $weight_input && $weight_input <= $g_w_52_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_52_normal_min <= $weight_input && $weight_input <= $g_w_52_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_52_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 53:

		if($weight_input == $g_w_53_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_53_underweight_min <= $weight_input && $weight_input <= $g_w_53_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_53_normal_min <= $weight_input && $weight_input <= $g_w_53_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_53_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 54:

		if($weight_input == $g_w_54_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_54_underweight_min <= $weight_input && $weight_input <= $g_w_54_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_54_normal_min <= $weight_input && $weight_input <= $g_w_54_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_54_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 55:

		if($weight_input == $g_w_55_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_55_underweight_min <= $weight_input && $weight_input <= $g_w_55_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_55_normal_min <= $weight_input && $weight_input <= $g_w_55_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_55_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 56:

		if($weight_input == $g_w_56_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_56_underweight_min <= $weight_input && $weight_input <= $g_w_56_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_56_normal_min <= $weight_input && $weight_input <= $g_w_56_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_56_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 57:

		if($weight_input == $g_w_57_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_57_underweight_min <= $weight_input && $weight_input <= $g_w_57_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_57_normal_min <= $weight_input && $weight_input <= $g_w_57_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_57_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 58:

		if($weight_input == $g_w_58_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_58_underweight_min <= $weight_input && $weight_input <= $g_w_58_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_58_normal_min <= $weight_input && $weight_input <= $g_w_58_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_58_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 59:

		if($weight_input == $g_w_59_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_59_underweight_min <= $weight_input && $weight_input <= $g_w_59_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_59_normal_min <= $weight_input && $weight_input <= $g_w_59_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_59_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
	
	case 60:

		if($weight_input == $g_w_60_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_60_underweight_min <= $weight_input && $weight_input <= $g_w_60_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_60_normal_min <= $weight_input && $weight_input <= $g_w_60_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_60_normal_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
		
		
	case 61:

		if($weight_input == $g_w_61_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_61_underweight_min <= $weight_input && $weight_input <= $g_w_61_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_61_normal_min <= $weight_input && $weight_input <= $g_w_61_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_61_overweight){

		$g_w_severely_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 62:

		if($weight_input == $g_w_62_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_62_underweight_min <= $weight_input && $weight_input <= $g_w_62_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_62_normal_min <= $weight_input && $weight_input <= $g_w_62_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_62_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 63:

		if($weight_input == $g_w_63_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_63_underweight_min <= $weight_input && $weight_input <= $g_w_63_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_63_normal_min <= $weight_input && $weight_input <= $g_w_63_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_63_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;
	
	case 64:

		if($weight_input == $g_w_64_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_64_underweight_min <= $weight_input && $weight_input <= $g_w_64_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_64_normal_min <= $weight_input && $weight_input <= $g_w_64_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_64_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}			
	
		break;	
	
	case 65:

		if($weight_input == $g_w_65_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_65_underweight_min <= $weight_input && $weight_input <= $g_w_65_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_65_normal_min <= $weight_input && $weight_input <= $g_w_65_normal_five) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_65_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;

	case 66:

		if($weight_input == $g_w_66_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_66_underweight_min <= $weight_input && $weight_input <= $g_w_66_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_66_normal_min <= $weight_input && $weight_input <= $g_w_66_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_66_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
	case 67:

		if($weight_input == $g_w_67_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_67_underweight_min <= $weight_input && $weight_input <= $g_w_67_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_67_normal_min <= $weight_input && $weight_input <= $g_w_67_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_67_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	
	
	case 68:

		if($weight_input == $g_w_68_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_68_underweight_min <= $weight_input && $weight_input <= $g_w_68_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_68_normal_min <= $weight_input && $weight_input <= $g_w_68_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_68_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;	

	case 69:

		if($weight_input == $g_w_69_severely_underweight){

		$g_w_status = "Severely Underweight";

		
	

		}else if($g_w_69_underweight_min <= $weight_input && $weight_input <= $g_w_69_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_69_normal_min <= $weight_input && $weight_input <= $g_w_69_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_69_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
	
	case 70:

		if($weight_input == $g_w_70_severely_underweight){

		$g_w_status = "Severely Stunted";

		
	

		}else if($g_w_70_underweight_min <= $weight_input && $weight_input <= $g_w_70_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_70_normal_min <= $weight_input && $weight_input <= $g_w_70_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_70_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}	
	
		break;
		
	case 71:

		if($weight_input == $g_w_71_severely_underweight){

		$g_w_status = "Severely Stunted";

		
	

		}else if($g_w_71_underweight_min <= $weight_input && $weight_input <= $g_w_71_underweight_max ) {

		$g_w_status = "Underweight";

		
	

		}else if($g_w_71_normal_min <= $weight_input && $weight_input <= $g_w_71_normal_max) {

		$g_w_status = "Normal";
	
		


		}else if($weight_input >= $g_w_71_overweight){

		$g_w_status = "Overweight";

		

		} else {

		$g_w_status = "Invalid Height";

	

		}		
	
		break;	
		
		default:
		
		$g_w_status = "Invalid Age";

	
		
			
}


	
	
	$child_information_reg= $conn->query("INSERT INTO child_information (Name,Age,Sex,Address,Height,Weight,Guardian,Height_Status,Weight_Status) VALUES ('$Name','$Age','$Sex','$Address','$Height','$Weight','$Guardian','$g_h_status','$g_w_status')");
	

}else {
	
	print("Error Sex");
	
}








					
					
					
					
					
					
					//ECHO THAT THE CHILD INFORMATION IS CREATED
					
					echo '<script>';
					echo 'alert("Child Information Created")';
					echo '</script>';
					
			
			}
			}
?>

<form action="#" method="POST">

<div>
<label>Name:</label>
<input type="text" name="Name" placeholder="Enter Full Name" value = "" required>
</div>

<div>
<label>Age:</label>
<input type="number" name="Age" placeholder="Enter Age (Number of Months)" value = "" required>
</div>

<div>
<label>Sex:</label>
<select  name="Sex" >
									<option value="" disabled selected>Select Sex</option>
                                    <option name="Sex"  value="Male">Male</option>
                                    <option name="Sex"  value="Female">Female</option>
						
 </select required>
</div>

<div>
<label>Address:</label>
<select  name="Address" >
									<option value="" disabled selected>Select Purok</option>
                                    <option name="Address"  value="Purok 1">Purok 1</option>
                                    <option name="Address"  value="Purok 2">Purok 2</option>
									<option name="Address"  value="Purok 3">Purok 3</option>
									<option name="Address"  value="Purok 4">Purok 4</option>
									<option name="Address"  value="Purok 5">Purok 5</option>
									<option name="Address"  value="Purok 6">Purok 6</option>
														
 </select required>

</div>

<div>
<label>Height:</label>
<input type="number" step=0.01 name="Height" placeholder="Enter Height (cm)" value = "" required>
</div>

<div>
<label>Weight:</label>
<input type="number" step=0.01 name="Weight" placeholder="Enter Weight (kg)" value = "" required>
</div>

<div>
<label>Guardian:</label>
<input type="text" name="Guardian" placeholder="Enter Guardian Name" value = "" required>
</div>


</div>

</div>
<div class="child_information_container">
<div class="child_information_submit">
<button  type="submit" name ="submit">Submit</button>
</div>
</div>

</form>


</div>

</div>
</div>

<!--FOOTER-->
<div id="mainfooter" class="fotter_user">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->
</div>
<script>

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
<!--



 
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