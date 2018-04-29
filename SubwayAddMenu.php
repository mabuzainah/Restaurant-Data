<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/register/style.css">
</head>
<?php
    print_r($_POST);
  if(array_key_exists('Add',$_POST)){
      $name=$_POST['iname'];
      $price=$_POST['iprice'];
      $description=$_POST['idescription'];
      $type=$_POST['itype'];
      $category=$_POST['icategory'];
            
      $conn_string="host=localhost port=5432 dbname=postgres user=postgres password=dudi2007";
      $dbconn=pg_connect($conn_string) or die("Connection failed");
      $query="INSERT INTO final_project.MENUITEM(ITEMID, NAME,TYPE, CATEGORY,DESCRIPTION,PRICE,RESTAURANTID) VALUES ('45','$name','$type','$category','$description','$price','008')";
      $result=pg_query($dbconn,$query);
      if(!$result){
        die("Error in SQL query: ".pg_last_error());
        }
      header("location: http://localhost/Rough_Draft/SubwayMenu.php");
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
      <h4>Menu Item Details</h4>
      </div>
        <div class="input-group input-group-icon">
        <input type="text" placeholder="Name" id="iname" name="iname"/>
        <div class="input-icon">
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Price" id="iprice" name="iprice"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Type in the Description of the food" id="idescription" name="idescription"/>
        <div class="input-icon">
      </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Category</h4>
        <div class="input-group">
          <input type="radio" name="icategory" value="Main" id="category-main"/>
          <label for="category-main">Main</label>
          <input type="radio" name="icategory" value="Starter" id="category-starter"/>
          <label for="category-starter">Starter</label>
          <input type="radio" name="icategory" value="Dessert" id="category-dessert"/>
          <label for="category-dessert">Dessert</label>
        </div>
      </div>
      <div class="col-half">
        <h4>Type</h4>
        <div class="input-group">
          <input type="radio" name="itype" value="Food" id="type-food"/>
          <label for="type-food">Food</label>
          <input type="radio" name="itype" value="Beverage" id="type-beverage"/>
          <label for="type-beverage">Beverage</label>
        </div>
      </div>
    </div>
    <div class="row">
        <input type="submit" type="submit" name="Add" value="Add" class="btn-register"/>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>