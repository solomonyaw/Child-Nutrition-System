<!DOCTYPE html>
<?php


include 'connect_to_database.php';




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
	<title>Home(Guest)</title>
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
<div class="guest_responsive_menu">

	
	<p style="margin-left:80px;">Guest</p>
	

	
	
</div>
</div>

<div class="user_menu">

<ul>

<li class="active"><i class="active_hover"></i><span  class="fa fa-home "></span> <a href="home_guest.php">Home</a></li>
<li><span  class="fa  fa-table "></span> <a href="guest_table.php">Table</a></li>
<li><span  class="fa fa-map-marker "></span> <a href="spotmap_guest.php">Spot Map </a></li>
<li><span  class="fa fa-pie-chart "></span> <a href="chart_guest.php">Chart </a></li>
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

	
	<a href="index.php"><span class=" fa fa-power-off"></span></a>
	<a href="home_guest.php">Guest</a>



	
	</div>
	

	
	
</div>


<div class="dashboard_title">

<span>Overview of Centro Oriental </span>
</div>
<div class="dashboard_body">


	<div class="number_of_children">
	
	<?php
	
	

	
	$show_child_total = $conn->query("SELECT * FROM child_information");
	$count_result_all = $show_child_total -> rowCount();
	
	?>
	
	
			<center><span><?php echo $count_result_all ?></span></center>
			<center><h3> Number of Childrens</h3></center>
			
			
		
	</div>
	
	
	<div class="number_of_boys">
	
	<?php
	
	

	
	$show_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex='Male' ");
	$count_result_boys = $show_boys_total -> rowCount();
	
	?>
			<center><span><?php echo $count_result_boys ?></span></center>
			<center><h3> Number of Boys</h3></center>
	</div>
	
	
	<div class="number_of_girls">
	
	<?php
	
	
	$female ="Female";
	
	$show_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex LIKE '%".$female."%' ");
	$count_result_girls = $show_girls_total -> rowCount();
	
	?>
	
			<center><span><?php echo $count_result_girls ?></span></center>
			<center><h3> Number of Girls</h3></center>
	</div>
	
	<div class="number_of_childrens_per_purok">
			<h2>Number of Children per Purok</h2>
			<ul>
			
			
	<?php
	

	$Purok1 ="Purok 1";
	$Purok2 ="Purok 2";
	$Purok3 ="Purok 3";
	$Purok4 ="Purok 4";
	$Purok5 ="Purok 5";
	$Purok6 ="Purok 6";
	
	
	$Purok1_all_total = $conn->query("SELECT * FROM child_information WHERE Address LIKE '%".$Purok1."%' ");
	$count_Purok1_all_total = $Purok1_all_total -> rowCount();
	
	$Purok2_all_total = $conn->query("SELECT * FROM child_information WHERE Address LIKE '%".$Purok2."%' ");
	$count_Purok2_all_total = $Purok2_all_total -> rowCount();
	
	$Purok3_all_total = $conn->query("SELECT * FROM child_information WHERE Address LIKE '%".$Purok3."%' ");
	$count_Purok3_all_total = $Purok3_all_total -> rowCount();
	
	$Purok4_all_total = $conn->query("SELECT * FROM child_information WHERE Address LIKE '%".$Purok4."%' ");
	$count_Purok4_all_total = $Purok4_all_total -> rowCount();
	
	$Purok5_all_total = $conn->query("SELECT * FROM child_information WHERE Address LIKE '%".$Purok5."%' ");
	$count_Purok5_all_total = $Purok5_all_total -> rowCount();
	
	$Purok6_all_total = $conn->query("SELECT * FROM child_information WHERE Address LIKE '%".$Purok6."%' ");
	$count_Purok6_all_total = $Purok6_all_total -> rowCount();
	
	
	
	
	
	?>
			
				<li> Purok 1 <span><?php echo $count_Purok1_all_total ?></span></li>
				<li> Purok 2 <span><?php echo $count_Purok2_all_total ?></span></li>
				<li> Purok 3 <span><?php echo $count_Purok3_all_total ?></span></li>
				<li> Purok 4 <span><?php echo $count_Purok4_all_total ?></span></li>
				<li> Purok 5 <span><?php echo $count_Purok5_all_total ?></span></li>
				<li> Purok 6 <span><?php echo $count_Purok6_all_total ?></span></li>	
			</ul>
	</div>
	
	
		<div class="number_of_boys_per_purok">
			<h2>Number of Boys per Purok</h2>
				
				<?php
				
	
	$male = "Male";
	$Purok1 ="Purok 1";
	$Purok2 ="Purok 2";
	$Purok3 ="Purok 3";
	$Purok4 ="Purok 4";
	$Purok5 ="Purok 5";
	$Purok6 ="Purok 6";
	
	
	$Purok1_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Male' AND Address LIKE '%".$Purok1."%' ");
	$count_Purok1_boys_total = $Purok1_boys_total -> rowCount();
	
	$Purok2_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Male' AND Address LIKE '%".$Purok2."%' ");
	$count_Purok2_boys_total = $Purok2_boys_total -> rowCount();
	
	$Purok3_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Male' AND Address LIKE '%".$Purok3."%' ");
	$count_Purok3_boys_total = $Purok3_boys_total -> rowCount();
	
	$Purok4_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Male' AND Address LIKE '%".$Purok4."%' ");
	$count_Purok4_boys_total = $Purok4_boys_total -> rowCount();
	
	$Purok5_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Male' AND Address LIKE '%".$Purok5."%' ");
	$count_Purok5_boys_total = $Purok5_boys_total -> rowCount();
	
	$Purok6_boys_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Male' AND Address LIKE '%".$Purok6."%' ");
	$count_Purok6_boys_total = $Purok6_boys_total -> rowCount();
	
	
	
	
	
	?>
			
			<ul>
				<li> Purok 1 <span><?php echo $count_Purok1_boys_total ?></span></li>
				<li> Purok 2 <span><?php echo $count_Purok2_boys_total ?></span></li>
				<li> Purok 3 <span><?php echo $count_Purok3_boys_total ?></span></li>
				<li> Purok 4 <span><?php echo $count_Purok4_boys_total ?></span></li>
				<li> Purok 5 <span><?php echo $count_Purok5_boys_total ?></span></li>
				<li> Purok 6 <span><?php echo $count_Purok6_boys_total ?></span></li>	
			</ul>
		</div>
		
		<div class="number_of_girls_per_purok">
			<h2>Number of Girls per Purok</h2>
			<ul>
			
			<?php
				
	

	$Purok1 ="Purok 1";
	$Purok2 ="Purok 2";
	$Purok3 ="Purok 3";
	$Purok4 ="Purok 4";
	$Purok5 ="Purok 5";
	$Purok6 ="Purok 6";
	
	
	$Purok1_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Female' AND Address LIKE '%".$Purok1."%' ");
	$count_Purok1_girls_total = $Purok1_girls_total -> rowCount();
	
	$Purok2_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Female' AND Address LIKE '%".$Purok2."%' ");
	$count_Purok2_girls_total = $Purok2_girls_total -> rowCount();
	
	$Purok3_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Female' AND Address LIKE '%".$Purok3."%' ");
	$count_Purok3_girls_total = $Purok3_girls_total -> rowCount();
	
	$Purok4_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Female' AND Address LIKE '%".$Purok4."%' ");
	$count_Purok4_girls_total = $Purok4_girls_total -> rowCount();
	
	$Purok5_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Female' AND Address LIKE '%".$Purok5."%' ");
	$count_Purok5_girls_total = $Purok5_girls_total -> rowCount();
	
	$Purok6_girls_total = $conn->query("SELECT * FROM child_information WHERE Sex = 'Female' AND Address LIKE '%".$Purok6."%' ");
	$count_Purok6_girls_total = $Purok6_girls_total -> rowCount();
	
	
	
	
	
	?>
				<li> Purok 1 <span><?php echo $count_Purok1_girls_total ?></span></li>
				<li> Purok 2 <span><?php echo $count_Purok2_girls_total ?></span></li>
				<li> Purok 3 <span><?php echo $count_Purok3_girls_total ?></span></li>
				<li> Purok 4 <span><?php echo $count_Purok4_girls_total ?></span></li>
				<li> Purok 5 <span><?php echo $count_Purok5_girls_total ?></span></li>
				<li> Purok 6 <span><?php echo $count_Purok6_girls_total ?></span></li>	
			</ul>
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