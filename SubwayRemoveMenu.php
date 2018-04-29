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
  if(array_key_exists('Remove',$_POST)){
      $name=$_POST['iname'];
            
      $conn_string="host=localhost port=5432 dbname=postgres user=postgres password=dudi2007";
      $dbconn=pg_connect($conn_string) or die("Connection failed");
      $query="DELETE FROM final_project.MENUITEM WHERE RESTAURANTID= '008' AND NAME= '$name'";
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
                <h4>Deleting an Item from the Menu</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Name" id="iname" name="iname"/>
                    <div class="row">
                        <h4>Notice</h4>
                        <div class="input-group">
                            <input type="checkbox" id="terms"/>
                            <label for="terms">I am aware that I'm deleting this menu item, and this action can't be undone once the Remove button is clicked.</label>
                        </div>
                        <div>
                            <input type="submit" type="submit" name="Remove" value="Remove" class="btn-register"/>
                        </div>
                    </div>
                    </form>
            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script  src="js/index.js"></script>
            </body>
        </html>