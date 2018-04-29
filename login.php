<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Login Form </title>
        <link rel="stylesheet" href="css/style.css">
    </head>


        <?php
          session_start();
          // Check if the login button was clicked and the login value is in the POST array object 
          if(array_key_exists('login', $_POST)){
              
            echo "<h1>It works</h1>";

            // Retrieve the users username and password from the login form
            $userID=$_POST['userID'];
            $password=$_POST['password'];

            // Get database connection string
            $conn_string="host=localhost port=5432 dbname=postgres user=postgres password=dudi2007";

            // connect to database 
            $dbconn=pg_connect($conn_string) or die("Connection failed");

            // Query database to see if user exist
            // Use parameters to avoid sql injection
            $query="SELECT * FROM final_project.Rater WHERE userID=$1 AND password=$2";

            //Prepare the statement to avoid sql injection
            $stmt=pg_prepare($dbconn, "ps", $query);
            $result=pg_execute($dbconn,"ps", array($userID,$password));

            if(!$result){
              die("Error in SQL query: ".pg_last_error());
            }

            //Check row count if row count is greater than 0 record exist
            $row_count=pg_num_rows($result);
            if($row_count>0){
              //Keep user information across pages and redirect to the page with user logged in
                echo "the number of rows is 1 or more";

              $_SESSION['userID']=$userID;
              header("location: http://localhost/Rough_Draft/index2.html");
              exit;
            } else {
                echo "the number of rows is less than or equal to 0";
            } 
            echo "Authentication Un-Successful, please try again ". "<a href='login.php'>login now</a>";

            //free memory
            pg_free_result($result);
            //close connection
            pg_close($dbconn);
          }
        ?>       
    <body>
        <div class="login-page">
  <div class="form">
    <form class="login-form" method="POST">
      <input type="text" placeholder="User ID" id="userID" name="userID"/>
      <input type="password" placeholder="Password" id="password" name="password"/>
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
    </body>  
</html>

