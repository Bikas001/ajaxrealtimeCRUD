<?php

include("db.php");

if(isset($_POST['car_name'])){
	$car_name=$_POST['car_name'];
	$query="INSERT INTO cars(name) VALUE ('$car_name')";
	$query_exc=mysqli_query($connection,$query);
	if(!$query_exc){
		die("QUERY FAILED". mysqli_error($query_exc));
	}
	
}


?>