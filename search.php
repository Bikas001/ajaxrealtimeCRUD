<?php
include "db.php";

if($_POST['search']){

 $search = $_POST['search'];

  $query="SELECT * FROM `cars` WHERE `name` LIKE '$search%' ";
 $query_select=mysqli_query($connection,$query);
 $count= mysqli_num_rows($query_select);

 if($count==0){
 	echo "No Cars Found";
 }
 if(!$query_select)
 {
 	die('QUERY FAILED' . mysqli_error($connection));
 }
 while($row=mysqli_fetch_array($query_select)){

 	?>
      <ul  class="list-group" >
      	<?php

      	 echo "<li  class='list-group-item'>".$row['name']." </li>";

      	 ?>


      </ul>




 	<?php
 }





}












?>