<?php
include 'db.php';


$query="SELECT * FROM cars";
$query_exc=mysqli_query($connection,$query);
while ($row=mysqli_fetch_array($query_exc)) {
	?>
	
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo"<a rel='".$row['id']."' class='title-link' href='javascript:void(0)'> ". $row['name']."</a>";?></td>
    </tr>
    
 
<?php }


?>

<script type="text/javascript">
	//$('#container-update').hide();
	$('.title-link').on('click', function(){

		
		var id= $(this).attr("rel");

		$.post("process.php",{id:id}, function(data){
		$('#container-update').show();

		$('#container-update').html(data);

		});


		

	});


</script>