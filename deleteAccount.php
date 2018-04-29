<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	</head>
    <?php 
            session_start();
            $dbconn=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=dudi2007");
            if(!$dbconn){
                die("Error in connection: ".pg_last_error());
            }
            $sql="DELETE FROM final_project.RATER U WHERE U.userId = 419";
            $result = pg_query($dbconn, $sql);
            //close connection
            pg_close($dbconn);
     ?>
<body>
		<h2>You have been successfully deleted from the database!</h2>
        
        <button id='myBtn'> Press to go back to main webpage</button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
        </script>
	</body>
</html>