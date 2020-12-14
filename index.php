<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

 </head>
  <body>
    <script>

        $(document).ready(function(){
          //this function was to read a database/ search in database
           $('#search').keyup(function(){

               var search = $('#search').val();
               $.ajax({
                url:'search.php',
                data:{search:search},
                type: 'POST',
                success:function(data){
                  if(!data.error){
                    $('#result').html(data);
                  }
                }
               });


     
            

           });



           //this section is adding to cars in database
           $("#add-cars-form").submit(function(evt){
            
            evt.preventDefault();

            var postData = $(this).serialize();

            var url = $(this).attr('action');

            $.post(url, postData, function(php_table_data){

              $("#car-result").html(php_table_data);
              $("#add-cars-form")[0].reset();

            });



           
         });//cars add function;




           setInterval(function(){
            updateTable();

           },500);




           function updateTable(){


           $.ajax({
            url: 'display-cars.php',
            type: 'POST',
            success: function(cars_data){
              if(!cars_data.error){
                $("#cars-table").html(cars_data);
              }

            }
           });
         }


        });


    </script>

<div class="container">
  <div id="container" class="text-center col-xs-6 ">
      <h2>Search our Database</h2>
      <input type="text" name="search" class="form-control" id="search" placeholder="Search from our database">
<br>
<br>
<h2 class="bg-success text-left" id="result">


</h2>

  </div>


  <div class="row">
    <form id="add-cars-form" method="post" action="add_cars.php" class="col-xs-6">
      <div class="form-group">
        <label>Add Cars</label>
      <input type="text" name="car_name" class="form-control" required="">
      </div>
       <div class="form-group">

      <input type="submit"class="btn btn-primary" name="submit" value="add cars">
      </div>

    </form>
    
    <div id="col-xs-6">
      <p id="car-result">
        
      </p>

    </div>



  </div>




<div class="row">
  <div class="col-xs-6">
    <table class="table" >
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Cars</th>
    </tr>
  </thead>
  <tbody id="cars-table">
  </tbody>
  
</table>


  </div>

  <div class="col-xs-6 "> 
   <div id="feedback" class="bg-success">
     

     
   </div>

    <div id="container-update">
      
    </div>


  </div>
</div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>