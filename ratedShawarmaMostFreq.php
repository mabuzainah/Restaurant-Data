<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Shawarma Palace Most frequent Raters</title>
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
		$sql="SELECT U.name, U.reputation, R8.comments FROM final_project.Rating R8, final_project.Rater U WHERE 
	U.userId IN (SELECT U1.userId FROM final_project.Rater U1 WHERE
		(SELECT COUNT(*) FROM final_project.Rating Rate WHERE Rate.uId = U1.userId AND
			Rate.restId IN (SELECT R.restaurantId FROM final_project.Restaurant R WHERE
				R.name ='Shawarma Palace'))
		>=  All(SELECT COUNT(*) FROM final_project.Rating Rate1 WHERE 
			Rate1.restId IN (SELECT R.restaurantId FROM final_project.Restaurant R WHERE
				R.name ='Shawarma Palace') GROUP BY Rate1.uId))
	AND R8.uId = U.userId AND R8.restId IN (SELECT R.restaurantId FROM final_project.Restaurant R WHERE
				R.name ='Shawarma Palace')";
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
		<h2>Shawarma Palace Most frequent Raters</h2>
		<table>
			<tr>
				<th>Name of Rater</th>
				<th>Rater Reputation</th>
				<th>Comments made</th>
			</tr>

			<!-- Loop through the recordset and display all records in a table -->
			<?php
				while($row=pg_fetch_array($result)) {?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
				</tr>
			<?php }
				//free memory
				pg_free_result($result);
			?>		
		</table>
        
        <button id='myBtn'> Click here to go to the Homepage</button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
        </script>
	</body>
</html>