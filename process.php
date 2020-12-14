<?php

include 'db.php';

if(isset($_POST['id'])){
	$id=mysqli_real_escape_string($connection,$_POST['id']);
$query="SELECT * FROM cars WHERE `id`='$id'";
$query_exc=mysqli_query($connection,$query);
while ($row=mysqli_fetch_array($query_exc)) {
	?>
	<div class="col-sm">
	 <div class="form-group">
    <input rel='<?php echo $row['id'];?>'  type="text" class="form-control car-id" name="" value="<?php echo $row['name'];?>">
	</div>
     <div class="form-group">
    <input type="submit" value="update"  class="btn btn-success update-car">
	</div>
    <div class="form-group">
    <input type="submit" value="delete"  class="btn btn-danger delete-car">
    
    <input type="submit" value="close"  class="btn btn-danger close">
    </div>
</div>
 
<?php }





}





if(isset($_POST['updatethis'])){
		$id=mysqli_real_escape_string($connection,$_POST['id']);
	$title=mysqli_real_escape_string($connection,$_POST['title']);

	$id=$_POST['id'];
	$title=$_POST['title'];
	

	$query="UPDATE `cars` SET `name` = '$title' WHERE `cars`.`id` = $id";
	$query_update=mysqli_query($connection,$query);
	if(!$query_update){
		die("QUERY FAILED". mysqli_error($query_update));

	}

}


if(isset($_POST['deletethis'])){
		$id=mysqli_real_escape_string($connection,$_POST['id']);
	

	$id=$_POST['id'];

	$query="DELETE FROM cars WHERE `cars`.`id` = $id";
	$query_update=mysqli_query($connection,$query);
	if(!$query_update){
		die("QUERY FAILED". mysqli_error($query_update));

	}

}

?>

<script>
	
 $(document).ready(function(){
 	var id;
 	var title;
 	var updatethis = "update";
 	var deletethis = "deletethis";
/***********Extracting id and title ***************/

   $('.car-id').on('input', function(){

   	id=$(this).attr('rel');
   	title=$(this).val();

   //	alert(id);

   });
/**********Button for Update***************/

	$('.update-car').on('click', function(){

		$.post("process.php",{id:id,title:title,updatethis:updatethis}, function(data){
			$('#feedback').text("Upadated sucessfully");
		})




	});
	/**********Button for Delete***************/

	$('.delete-car').on('click', function(){
		var id=$(".car-id").attr("rel");
		$.post("process.php",{id:id,deletethis:deletethis}, function(data){
			alert("Deleted");

			$("#container-update").hide();

		})

	});

	$('.close').on('click', function(){
		$('#container-update').hide();

	});



 });







</script>