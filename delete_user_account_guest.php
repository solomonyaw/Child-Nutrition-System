<?php 


include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_admin_username']))
			{
				header('location:index_admin.php');
			}


if (isset($_GET['delete_user_account_guest'])){
	
	
	$guest_id = $_GET['delete_user_account_guest'];
	
	
	 $conn->query("DELETE FROM user_account_guest WHERE IDNumber = $guest_id");
	
	
	header('location:list_of_accounts_guest.php?delete_guest_success=1');




}





?>