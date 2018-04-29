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

<?php 

	if(isset($_GET['success'])){
		
							echo '<script>';
							echo 'alert("User Account Succesfully Updated.")';
							echo '</script>';
							
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
	<title>List of Accounts</title>
	<!--TITLE ENDS HERE-->
	
	<!--JQUERY-->
	<script src="jquery/jquery.js"> </script>
	<!--JQUERY ENDS HERE--

	
	
<!--HEAD STYLE, JAVASCRIPT, AND ETC-->	
<head>

<script>

	//EDIT
			function edit_user_account(id, user){
				if (confirm("Are you sure you want to edit?  '"+user + " '"))
				{
					
					window.location.href = 'edit_user_account.php?edit_user_account=' +id;
				}
			}
			
			
				
			//UPDATE	
			function delete_user_account(id, user){
				if (confirm("Are you sure you want to delete  '" + user + "'"))
				{
				window.location.href = 'delete_user_account.php?delete_user_account=' + id;
					}	
				}


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
 <i class="fa fa-plus fa-lg"></i><span>Create User Account</span>
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

<!--LIST OF ACCOUNT USER HEADER----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="table_header">

<div class="table_title	">List of Accounts 
<a class="active" href="list_of_accounts.php">User</a>
<a href="list_of_accounts_guest.php">Guest</a>

<div  class="table_search">
<label> Search: </label>
<form method="GET">
<input 	type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>">
</form>
</div>
</div>
</div>

<!--LIST OF ACCOUNT USER TABLE----------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="table_list_container">
<div style="overflow-x:auto;">
<table class="table" cellpadding="0" cellspacing="0" border="0">


		<thead>
		<tr>
		<th>ID Number</th>
		<th>Name</th>
		<th>Username</th>
		<th>Position</th>
		<th>Workplace</th>
		<th> </th>
		<th> </th>
	
		</tr>
		<thead>
			
		
			<tbody  cellpadding="0" cellspacing="0" border="0">
			
			

			
			<?php 
			
			
			if(isset($_GET['search'])) {
			
			$search_data = $_GET['search'];
		
			$search_final_data = $search_data;
				
			
			
			$result_per_page = 5;
			
			$show_accounts = $conn-> prepare("SELECT *FROM user_account");
			
			$show_accounts -> execute();
			
			$number_of_rows = $show_accounts -> rowcount();
			
			$number_of_pages = ceil($number_of_rows/$result_per_page);
			
			if(!isset($_GET['page'])) {
				
				$page = 1;
				
			} else {
				
				$page = $_GET['page'];
				
			}
			
			$this_page_first_result=($page-1) * $result_per_page;
			
			
			
			$show_accounts = $conn->query("SELECT *FROM user_account WHERE FirstName LIKE '%".$search_final_data."%' OR MiddleName LIKE '%".$search_final_data."%' OR LastName LIKE '%".$search_final_data."%' OR Username LIKE '%".$search_final_data."%' OR Position LIKE '%".$search_final_data."%' OR WorkPlace LIKE '%".$search_final_data."%' ORDER BY FirstName ASC LIMIT ".$this_page_first_result.','.$result_per_page);
			
			$count_result = $show_accounts->rowCount();
			
			if(empty($count_result)) {
				
				echo '<tr >
					
						
					
						
						<td><p> No Result Found </p></td>
					 </tr>';
					 
					 $number_of_pages =1;
			}
			
			else {
				
				
			while($row=$show_accounts->fetch()){
					
			$image_name=$row['ProfilePhoto'];	
			
			echo '<tr>';
			echo '<td>'.$row['IDNumber'].'</td>'; ?>
			
			<td> <img src="user_photo/<?php echo $image_name; ?>">
			
			<?php
			echo '<span class="name">'.$row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName'].'</span>'.'</td>';
			echo '<td>'.$row['UserName'].'</td>';
			echo '<td>'.$row['Position'].'</td>';
			echo '<td>'.$row['WorkPlace'].'</td>';
			
			?>
			
			<td>
			<!-- EDIT BUTTON -->
			<a href="javascript:edit_user_account('<?php echo $row['IDNumber'];?>' , '<?php echo $row['UserName'];?>')"> 
			<?php echo '<button class="blue_button">Edit</button></td>
			</a>';
			
			?>
			
			
			<td>
			<!-- DELETE BUTTON -->
			<a href="javascript:delete_user_account('<?php echo $row['IDNumber'];?>' , '<?php echo $row['UserName'];?>')"> 			
			<?php echo '<button class="red_button">Delete</button></td>
			</a>';
			
			unset($_POST['page']);
			}
			?>
			
			
			
			
			
			<?php } 
			
			} else {
			
					$result_per_page = 5;
			
			$show_accounts = $conn-> prepare("SELECT *FROM user_account");
			
			$show_accounts -> execute();
			
			$number_of_rows = $show_accounts -> rowcount();
			
			$number_of_pages = ceil($number_of_rows/$result_per_page);
			
			if(!isset($_GET['page'])) {
				
				$page = 1;
				
			} else {
				
				$page = $_GET['page'];
				
			}
			
			$this_page_first_result=($page-1) * $result_per_page;
			
			
			
			$show_accounts = $conn->query("SELECT *FROM user_account ORDER BY FirstName ASC LIMIT ".$this_page_first_result.','.$result_per_page);
			
			$count_user_accounts=$show_accounts->rowCount();
			
			if (empty($count_user_accounts)){
				
					 
					 echo 
						'<tr >
						

						<td><p> No User Account Created </p></td>
					 </tr>';
					 
					 $number_of_pages =1;
			}
			
			else {
			
			while($row=$show_accounts->fetch()){
					
			$image_name=$row['ProfilePhoto'];	
			
			echo '<tr>';
			echo '<td>'.$row['IDNumber'].'</td>'; ?>
			
			<td> <img src="user_photo/<?php echo $image_name; ?>">
			
			<?php
			echo '<span class="name">'.$row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName'].'</span>'.'</td>';
			echo '<td>'.$row['UserName'].'</td>';
			echo '<td>'.$row['Position'].'</td>';
			echo '<td>'.$row['WorkPlace'].'</td>';
			
			?>
			
			<td>
			<!-- EDIT BUTTON -->
			<a href="javascript:edit_user_account('<?php echo $row['IDNumber'];?>' , '<?php echo $row['UserName'];?>')"> 
			<?php echo '<button class="blue_button">Edit</button></td>
			</a>';
			
			?>
			
			
			<td>
			<!-- DELETE BUTTON -->
			<a href="javascript:delete_user_account('<?php echo $row['IDNumber'];?>' , '<?php echo $row['UserName'];?>')"> 			
			<?php echo '<button class="red_button">Delete</button></td>
			</a>';
			
			unset($_POST['page']);
			
			}
			}
			}
			?>
			
			
			</tr>
			
		
			
		
			
		
			
		
			
		
		
			</tbody>
			
</table>
</div>
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
// Else if curre_page is 
else {
	
	$current_page--;
	
}



	  echo '<a href="list_of_accounts.php?page='.($current_page).'">'.'Previous'.'</a>';


 ?>
 
 <?php 

 if(!isset($_GET['page']))
 {
	 
	$_GET['page']=1;
 }else{
	 
	 	$_GET['page'];
 }

 
 for($i = max(1, $page - 3); $i<=min($page + 1, $number_of_pages); $i++) {
	 
  if($_GET['page'] == $i){
		 
		 $activeClass='active' ;
		 
	 }
	 
	 else{
		 $activeClass='' ;
	 }
		 
  echo '<li class='.$activeClass.'>'.'<a  href="list_of_accounts.php? page='.$i.'">'.$i.'</a>'.'</li>';
  
  

  

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

	

	
  echo '<a href="list_of_accounts.php? page='.($current_page).'">'.'Next'.'</a>';
  

 ?>
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
	document.getElementById("fileuploaded").innerHTML="Photo Uploaded";
	document.getElementById("fileuploaded").style.color="#56B855";

	

	}

}

function pagination_active(elem) {
	
	var a = document.getElemetsByTagname('a');
	
	for(i=0; i<a.length; i++) {
		
		a[i].classList.remove('active')
		
	}
	 elem.classList.add('active');
	
	

	
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