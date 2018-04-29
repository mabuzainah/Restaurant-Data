<!DOCTYPE html>
<html>
    <head>

    <style>
    .card {
      box-shadow: 0 10px 14px 0 rgba(0, 0, 0, 0.2);
      max-width: 320px;
      margin: auto;
      text-align: center;
      font-family: arial;
      border-radius: 4.2px;
    }

    .title {
      color: grey;
      font-size: 18px;
    }

    button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      border-radius: 4.2px;
      background-color: #FFA500;
      text-align: center;
      cursor: pointer;
      width: 90%;
      font-size: 18px;
    }

    .buttonDelete {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #ff0000;
      text-align: center;
      cursor: pointer;
      width: 90%;
      font-size: 18px;
      border-radius: 4.2px;
    }
    a {
      text-decoration: none;
      font-size: 22px;
      color: black;
    }

    button:hover, a:hover {
      opacity: 0.7;
    }

    .container {
        padding: 2px 16px;
    }
    </style>
    </head>
   
    
    <?php
    session_start();
    if(array_key_exists('Delete',$_POST)){    
      $conn_string="host=localhost port=5432 dbname=postgres user=postgres password=dudi2007";
      $dbconn=pg_connect($conn_string) or die("Connection failed");
      $query="DELETE FROM final_project.RATER R WHERE R.USERID='890'";
      $result=pg_query($dbconn,$query);
      if(!$result){
        die("Error in SQL query: ".pg_last_error());
        }
      header("location: http://localhost/Rough_Draft/index21.html");
      //free memory
      pg_free_result($result);
      //close connectioin
      pg_close($dbconn);   
  }
?> 
<body>


<div class="card">
  <img src="airplant.jpg" alt="Mohammed" style="width:95%">
    <div class="container">
  <h1>Moh'd Abu-Zeinah</h1>
  <p class="title">The Website Developer</p>
  <p>University of Ottawa</p>
 <p><button>Edit Profile</button></p>
 <form method="post">
        <input type="submit" type="submit" name="Delete" value="Delete" class="buttonDelete"/>
  </form>
</div>
    </div>

</body>
</html>
