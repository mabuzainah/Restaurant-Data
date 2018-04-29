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
  if(array_key_exists('Register',$_POST)){
      $userID=$_POST['iuserid'];
      $name=$_POST['iname'];
      $email=$_POST['iemail'];
      $password=$_POST['ipassword'];
      $joindate=date("Y-m-d");
      $type=$_POST['itype'];
      $gender=$_POST['igender'];
            
      $conn_string="host=localhost port=5432 dbname=postgres user=postgres password=dudi2007";
      $dbconn=pg_connect($conn_string) or die("Connection failed");
      $query="INSERT INTO final_project.rater(UserID,NAME,EMAIL, PASSWORD,JOINDATE,TYPE,GENDER) VALUES ('$userID','$name','$email','$password','$joindate','$type','$gender')";
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
        <input type="text" placeholder="UserID" id="iuserid" name="iuserid"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Address" id="iemail" name="iemail"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" id="ipassword" name="ipassword"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Type in Online, Blog or Food critic" id="itype" name="itype"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Input Current Date</h4>
        <div class="input-group">
          <div class="col-third">
            <input type="text" placeholder="DD" name="iday"/>
          </div>
          <div class="col-third">
            <input type="text" placeholder="MM" name="imonth"/>
          </div>
          <div class="col-third">
            <input type="text" placeholder="YYYY" name="iyear"/>
          </div>
        </div>
      </div>
      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="igender" value="Male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="igender" value="Female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
      <div>
        <input type="submit" type="submit" name="Register" value="Register" class="btn-register"/>
      </div>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
