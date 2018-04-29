<?php

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_admin_username']))
			{
				header('location:index_admin.php');
			}





if(isset($_GET['delete_user_account'])){
		$checker = $_GET['delete_user_account'];
		
		$conn->query("DELETE FROM user_account WHERE IDNumber='$checker'");
		
		header('location:list_of_accounts.php');
	
}
	
?>
