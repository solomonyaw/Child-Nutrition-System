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
	<title>Chart</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<script type="text/javascript" src="gstatic/loader.js"></script>
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




<li><span  class="fa fa-home "></span> <a href="home.php">Home </a></li>
<li><span  class="fa fa-book "></span> <a href="#">About </a></li>
<li ><span  class="fa fa-user "></span> <a href="user_profile.php">User Profile </a></li>
<li><span  class="fa fa-exclamation"></span> <a href="announcement.php">Announcement</a></li>
<li><span  class="fa fa-male "></span> <a href="child_information.php">Child Information</a></li>
<li><span  class="fa  fa-table "></span> <a href="child_information_table.php">Table</a></li>
<li><span  class="fa fa-map-marker "></span> <a href="spotmap.php">Spot Map </a></li>
<li class="active"><span  class="fa fa-pie-chart "></span> <a href="chart.php">Chart </a></li>
<li><span  class="fas fa-file-pdf"></span> <a href="test.php" target="_blank">Table (PDF)</a></li>

</ul>
</div>


<div class="user_removesidenav">
<a onclick="closeNav()"><span class="fa fa-eye-slash" ></span>Hide Sidebar</a>
</div>
</div>

<div id="main">

<div  class="user_topbar">
	
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
<!-- CONTENT STARTS HERE ------------------------------------------------------------------------------------------------------------------------------------------------------->


<div class="chart_header_1">

<div class="chart_header">Centro Oriental
<a href="chart.php">Overall</a>
<a href="chart_boys.php">Boys</a>
<a class="active" href="chart_girls.php">Girls</a>
</div>
</div>

<div class="pie_chart_container">

<div class="pie_chart_content">


<div  id="Height_Status_div"></div>



</div>

<div class="pie_chart_content2">


<div  id="Weight_Status_div"></div>



</div>


</div>

<!--FOOTER-->
<div id="mainfooter" class="fotter_user">
 <center>&copy; 2018 Child Nutrition System</center>
</div>
<!--FOOTER ENDS HERE-->
</div>

<?php 
$sad = 100;
?>


<?php 

//GET STATUS HEIGHT

	//SEVERELY STUNTED
	$severely_stunted = "Severely Stunted";
	$sex_b = "Female";
    $show_severely_stunted = $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Height_Status LIKE '%".$severely_stunted."%' ");
	
	$count_result_severely_stunted = $show_severely_stunted -> rowCount();
	
	$sum_severely_stunted =$count_result_severely_stunted;
	
	
	//STUNTED
	$stunted = "Stunted";
	$sex_b = "Female";
    $show_stunted = $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Height_Status LIKE '%".$stunted."%'");
	
	$count_result_stunted = $show_stunted -> rowCount();
	
	$sum_stunted =$count_result_stunted;
	
	//NORMAL
	$normal_h = "Normal";
	$sex_b = "Female";
    $show_normal_h = $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Height_Status LIKE '%".$normal_h."%'");
	
	$count_result_normal_h = $show_normal_h -> rowCount();
	
	$sum_normal_h =$count_result_normal_h;
	
	//TALL 
	$tall = "Tall";
	$sex_b = "Female";
    $show_tall= $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Height_Status LIKE '%".$tall."%'");
	
	$count_result_tall = $show_tall -> rowCount();
	
	$sum_tall =$count_result_tall;
	
	
	
	
//GET STATUS WEIGHT

	//SEVERELY UNDERWEIGHT
	$severely_underweight = "Severely Underweight";
	$sex_b = "Female";
    $show_severely_underweight = $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Weight_Status LIKE '%".$severely_underweight."%'");
	
	$count_result_severely_underweight = $show_severely_underweight -> rowCount();
	
	$sum_severely_underweight = $count_result_severely_underweight;
	
	
	//UNDERWEIGHT
	$underweight = "Underweight";
	$sex_b = "Female";
    $show_underweight = $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Weight_Status LIKE '%".$underweight."%'");
	
	$count_result_underweight = $show_underweight -> rowCount();
	
	$sum_underweight = $count_result_underweight;
	
	//NORMAL
	$normal_w = "Normal";
	$sex_b = "Female";
    $show_normal_w = $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Weight_Status LIKE '%".$normal_w."%'");
	
	$count_result_normal_w = $show_normal_w -> rowCount();
	
	 $sum_normal_w =$count_result_normal_w;
	
	//OVERWEIGHT 
	$overweight = "Overweight";
	$sex_b = "Female";
    $show_overweight= $conn->query("SELECT *FROM child_information WHERE Sex LIKE '%".$sex_b."%' AND Weight_Status LIKE '%".$overweight."%'");
	
	$count_result_overweight = $show_overweight -> rowCount();
	
	$sum_overweight = $count_result_overweight;



?>


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

      google.charts.load('current', {'packages':['corechart']});


      google.charts.setOnLoadCallback(Height_Status);

  
      google.charts.setOnLoadCallback(Weight_Status);
	
	var severely_stunted = <?php echo $sum_severely_stunted ?>;
	var stunted = <?php echo $sum_stunted ?>;
	var normal_h = <?php echo $sum_normal_h ?>;
	var tall = <?php echo $sum_tall ?>;
	
	

      function Height_Status() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Status_Height');
        data.addColumn('number', 'Numbers');
        data.addRows([
          ['Severely Stunted', severely_stunted],
          ['Stunted', stunted],
          ['Normal', normal_h],
          ['Tall', tall],
        ]);

   
        var options = {title:'Height',
                       width:300,
					   chartArea: {width: 400, height: 300},
					 
                       height:400};

        var chart = new google.visualization.PieChart(document.getElementById('Height_Status_div'));
        chart.draw(data, options);
      }

	  
	var severely_underweight = <?php echo $sum_severely_underweight ?>;
	var underweight = <?php echo $sum_underweight ?>;
	var normal_w = <?php echo $sum_normal_w ?>;
	var overweight = <?php echo $sum_overweight ?>;
     
      function Weight_Status() {


        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Status_Height');
        data.addColumn('number', 'Numbers');
        data.addRows([
          ['Severely Underweight', severely_underweight],
          ['Underweight', underweight],
          ['Normal', normal_w],
          ['Overweight', overweight],
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Weight',
                       width:300,
					   chartArea: {width: 400, height: 300},
					  
                       height:400};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Weight_Status_div'));
        chart.draw(data, options);
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

 
  //document.write(viewportwidth + ' ' + viewportheight);

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