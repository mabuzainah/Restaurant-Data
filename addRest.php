<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Creating a Restaurant</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/register/style.css">
</head>
<?php
    session_start();
    print_r($_POST);
    if(array_key_exists('Add',$_POST)){
      $restID=$_POST['irestaurantid'];
      $name=$_POST['iname'];
      $type=$_POST['itype'];
      $url=$_POST['iurl'];
            
      $conn_string="host=localhost port=5432 dbname=postgres user=postgres password=dudi2007";
      $dbconn=pg_connect($conn_string) or die("Connection failed");
      $query="INSERT INTO final_project.restaurant(RestaurantID,NAME,TYPE, URL) VALUES ('$restID','$name','$type','$url')";
      $result=pg_query($dbconn,$query);
      if(!$result){
        die("Error in SQL query: ".pg_last_error());
        }
      header("location: http://localhost/Rough_Draft/index2.html");
      //free memory
      pg_free_result($result);
      //close connectioin
      pg_close($dbconn);   
  }
?>       

<body>

  
<div class="container">
  <form method="post">
    <div class="row">
      <h4>Account</h4>
      
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Name" id="iname" name="iname"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      
      <div class="input-group input-group-icon">
        <input type="text" placeholder="RestaurantID" id="irestaurantid" name="irestaurantid"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Type" id="itype" name="itype"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      
      <div class="input-group input-group-icon">
        <input type="text" placeholder="URL" id="iurl" name="iurl"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      
    </div>
        <input type="submit" type="submit" name="Add" value="Add" class="btn-register"/>
      </div>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
</body>

</html>
