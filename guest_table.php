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
	<title>Table(Guest)</title>
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

<li ><i class="active_hover"></i><span  class="fa fa-home "></span> <a href="home_guest.php">Home</a></li>
<li class="active"><span  class="fa  fa-table "></span> <a href="guest_table.php">Table</a></li>
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

<div class="table_header">
<span>Child Information of Centro Oriental</span>
<div class="table_search">
<label>Search:</label>
<form method="GET">
<input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>">
</form>
</div>
</div>

<div class="table_container">
<table class="table" cellpadding="0" cellspacing="0" border="0">

<thead>
<tr>
<th>Name</th>
<th>Age</th>
<th>Sex</th>
<th>Address</th>
<th>Weight</th>
<th>Height</th>
<th>Guardian</th>
<th>Status</th>
<th> </th>
</tr>
</thead>


<tbody cellpadding="0" cellspacing="0" border="0">



<?php

if(isset($_GET['search'])){
	
	$search_data =$_GET['search'];
	$search_final_data = $search_data;
	
	
	$result_per_page = 6;
	
	$show_child_information = $conn->prepare("SELECT * FROM user_account");
	$show_child_information  -> execute();
	
	$number_of_rows = $show_child_information -> rowcount();
	
	$number_of_pages = ceil($number_of_rows/$result_per_page);
	
	if(!isset($_GET['page'])){
		
		$page = 1;
		
	} else {
		
		$page = $_GET['page'];
		
	}
	
	$this_page_first_result = ($page-1)*$result_per_page;
	
	$show_child_information = $conn->query("SELECT * FROM child_information WHERE Name LIKE '%".$search_final_data."%'OR Age LIKE '%".$search_final_data."%' OR Sex LIKE '%".$search_final_data."%' OR Address LIKE '%".$search_final_data."%' OR Height LIKE '%".$search_final_data."%' OR Weight LIKE '%".$search_final_data."%' OR Guardian LIKE '%".$search_final_data."%' ORDER BY Name ASC LIMIT ".$this_page_first_result.','.$result_per_page);
	
	$count_result = $show_child_information -> rowCount();
	if(empty($count_result)){
		
		echo '<tr> 
		
		
		
				<td><p> No Result Found </p></td>
				
			</tr>';
			
			$number_of_pages = 1;
			
	}
	
	else {
		
		
		while($row=$show_child_information->fetch()){
		
		$child_IDNumber = $row['IDNumber'];	
		$child_Name = $row['Name'];
		$child_Age = $row ['Age'];
		$child_Sex = $row['Sex'];
		$child_Address = $row['Address'];
		$child_Height = $row['Height'];
		$child_Weight = $row['Weight'];
		$child_Guardian = $row['Guardian'];
		$Height_Status = $row['Height_Status'];
		$Weight_Status = $row['Weight_Status'];
		
		
		$kg = 'kg';
		$cm = 'cm';
		
		echo '<tr>';
		
		echo '<td>'.$child_Name.'</td>';
		echo '<td>'.$child_Age.'</td>';
		echo '<td>'.$child_Sex.'</td>';
		echo '<td>'.$child_Address.'</td>';
		echo '<td>'.$child_Weight.' '.$kg.'</td>';
		echo '<td>'.$child_Height. ' '.$cm.'</td>';
		echo '<td>'.$child_Guardian.'</td>';
		echo '<td>'.$Height_Status.'<br>'.$Weight_Status.'</td>';
		
		
		
		
	
		
		
?>



<td>
<!--EDIT BUTTON-->

</td>

<?php
unset($_POST['page']);
?>

</tr>

<?php

		
		}
	}
	
	

	
	

?>

<?php } else {
	
	$result_per_page = 6;
	$show_child_information = $conn->prepare("SELECT *FROM child_information");
	
	$show_child_information -> execute();
	
	$number_of_rows = $show_child_information -> rowcount();
	
	$number_of_pages = ceil($number_of_rows/$result_per_page);
	
	if(!isset($_GET['page'])){
		
		$page = 1;
	
	} else {
		
		$page = $_GET['page'];
	}
	
	$this_page_first_result = ($page-1) * $result_per_page;
	
	$show_child_information = $conn->query("SELECT *FROM child_information ORDER BY Name ASC LIMIT ".$this_page_first_result.','.$result_per_page);
	
	$count_child_information = $show_child_information ->rowCount();
	
	if(empty($count_child_information)){
		
					echo '<tr>
					
					
					
					
							<td><p> No Data Entered </p></td>
							
					</tr>';
					
						$number_of_pages = 1;
						
	}else {
			
		while($row=$show_child_information->fetch()) {
				
				
	
		$child_IDNumber = $row['IDNumber'];	
		$child_Name = $row['Name'];
		$child_Age = $row ['Age'];
		$child_Sex = $row['Sex'];
		$child_Address = $row['Address'];
		$child_Height = $row['Height'];
		$child_Weight = $row['Weight'];
		$child_Guardian = $row['Guardian'];
		$Height_Status = $row['Height_Status'];
		$Weight_Status = $row['Weight_Status'];
		
		
		$kg = 'kg';
		$cm = 'cm';
		
		echo '<tr>';
		
		echo '<td>'.$child_Name.'</td>';
		echo '<td>'.$child_Age.'</td>';
		echo '<td>'.$child_Sex.'</td>';
		echo '<td>'.$child_Address.'</td>';
		echo '<td>'.$child_Weight.' '.$kg.'</td>';
		echo '<td>'.$child_Height. ' '.$cm.'</td>';
		echo '<td>'.$child_Guardian.'</td>';
		echo '<td>'.$Height_Status.'<br>'.$Weight_Status.'</td>';
		
		
	
		
		
?>

<td>
<!--EDIT BUTTON-->



</td>

<?php
unset($_POST['page']);
?>

</tr>

<?php 
			}
			
		}
		
}
?>






































</tbody>
</table>
</div>



<!--PAGINATION----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="table_pagination_container">

<div class="table_page">
<?php
echo 'Page'.' '.$page.' '.'of'.' '.$number_of_pages;

?>
</div>

<div class="table_pagination">

<?php

// If the page have no value set it to 1
if(!isset($_GET['page'])) {			
$current_page = 1;
}
// Else if page have value get the value 
else {
				
$current_page = $_GET['page'];

}


// If current_page is less than or equal to 1 set curent_page to 1
if($current_page <=1 ) {
	
	$current_page = 1;
	
}
// Else if current_page is 
else {
	
	$current_page--;
	
}



	  echo '<a href="guest_table.php?page='.($current_page).'">'.'Previous'.'</a>';


 ?>
 
 <?php 

 if(!isset($_GET['page']))
 {
	 
	$_GET['page']=1;
 }else{
	 
	 	$_GET['page'];
 }

 
 $limit = 5;
 


 for($i = max(1, $page - 3); $i<=min($page + 1, $number_of_pages); $i++) {
	 
  if($_GET['page'] == $i){
		 
		 $activeClass='active' ;
		 
	 }
	 
	 else{
		 $activeClass='' ;
	 }

	

 
	 
  echo '<li class='.$activeClass.'>'.'<a  href="guest_table.php? page='.$i.'">'.$i.'</a>'.'</li>';
  


  
 }

 

 ?>

 
 <?php
 
 
if(!isset($_GET['page'])) {
				
				$current_page = 1;
				
			} else {
				
				$current_page = $_GET['page'];
				
}


if($current_page >= $number_of_pages) {
	
	$current_page = $number_of_pages;
	
}else {
	
	$current_page++;
	
}

	

	
  echo '<a href="guest_table.php? page='.($current_page).'">'.'Next'.'</a>';
  

 ?>
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