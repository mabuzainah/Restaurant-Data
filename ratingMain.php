<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Ratings</title>
	</head>
        <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #FFA500;
    color: white;
}
</style>
	<?php
		session_start();
		$dbconn=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=dudi2007");
		if(!$dbconn){
			die("Error in connection: ".pg_last_error());
		}
        $restnum="008";
		$sql="Select * FROM final_project.Rating R";
//        $stmt = pg_prepare($dbconn, "ps", $sql);
		//$result=pg_execute($dbconn,"ps",array($stmt));
        $result = pg_query($dbconn, $sql);
//		if(!$result) {
//			die("Error in SQL query: ". pg_last_error());
//		}
		//close connection
		pg_close($dbconn);
	?>
	<body>
		<h2>Ratings of Restaurants on Rate 'Em</h2>  
        <button id='myBtn'> Go back </button>
        <button id='fnm'> Food N Mood </button>
        <button id='fom'> Food OR Mood </button>
        <button id='myJohn'> Ratings lower than John's Ratings </button>
        <button id='myMix'> Most Indecisive Users </button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
            var btn = document.getElementById('fnm');
            btn.addEventListener('click', function() {
            document.location.href = 'myJohn.php';
            });
            var btn = document.getElementById('fom');
            btn.addEventListener('click', function() {
            document.location.href = 'myJohn.php';
            });
            var btn = document.getElementById('myJohn');
            btn.addEventListener('click', function() {
            document.location.href = 'myJohn.php';
            });
            var btn = document.getElementById('myMix');
            btn.addEventListener('click', function() {
            document.location.href = 'notSure.php';
            });
        </script>
        <br>
        <br>
		<table>
			<tr>
				<th>User ID</th>
				<th>Rating Date</th>
                <th>Price Rating</th>
                <th>Food Rating</th>
                <th>Mood Rating</th>
                <th>Staff Rating</th>
                <th>Comments</th>
                <th>Restaurant ID</th>
			</tr>

			<!-- Loop through the recordset and display all records in a table -->
			<?php
				while($row=pg_fetch_array($result)) {?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
				</tr>
			<?php }
				//free memory
				pg_free_result($result);
			?>		
		</table>
	</body>
</html>