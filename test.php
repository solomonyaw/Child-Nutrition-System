<?php

include 'connect_to_database.php';

include 'connect_to_database.php';

session_start();

	if(!isset($_SESSION['cns_user_username']))
			{
				header('location:index.php');
			}
			
			
	$User_Username = $_SESSION['cns_user_username'];
	


$show_child_information = $conn->query("SELECT *FROM child_information ORDER BY Name ASC");

$id_number = 0;

$myfile = fopen("child_information.txt","w") or die ("Unable to open file!");

while($row=$show_child_information->fetch()){

$id_number+=1;

$child_Name = $row['Name'];
$child_Age = $row['Age'];
$child_Sex = $row['Sex'];
$child_Address = $row['Address'];
$child_Height = $row['Height'];
$child_Weight = $row['Weight'];
$height_Status = $row['Height_Status'];
$weight_Status = $row['Weight_Status'];

$kg = 'kg';
$cm = 'cm';
$mo = 'mo.';
$semi = ';';







$data = "$id_number. $child_Name;$child_Age mo.;$child_Sex;$child_Address;$child_Height cm;$child_Weight kg;$height_Status;$weight_Status";



fwrite($myfile,$data."\n");



}


fclose($myfile);

$done = 1;

if (isset($done)) {

header('Location:Child_Information_Table_(PDF).php');

}

?>