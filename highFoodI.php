<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Middle Eastern Category</title>
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
		$sql="Select R.name, U.name FROM final_project.Restaurant R, final_project.Rater U WHERE
	R.restaurantId IN (SELECT R8.restId FROM final_project.Rating R8 WHERE
		R8.restId IN (SELECT R1.restaurantId FROM final_project.Restaurant R1 WHERE
				R1.type = 'Middle Eastern')
		AND 
		R8.food_rating >= All(SELECT Rate.food_rating FROM final_project.Rating Rate WHERE
			Rate.restId IN (SELECT R2.restaurantId FROM final_project.Restaurant R2 WHERE
				R2.type = 'Indian'))
		AND
		R8.uId = U.userId)";
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
		<h2>Middle Eastern Restaurant Category Managers</h2>  
        <button id='myBtn'> Go back </button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
        </script>
        <br>
        <br>
		<table>
			<tr>
				<th>Restaurant Name</th>
				<th>Name of User</th>
			</tr>

			<!-- Loop through the recordset and display all records in a table -->
			<?php
				while($row=pg_fetch_array($result)) {?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[1]; ?></td>
				</tr>
			<?php }
				//free memory
				pg_free_result($result);
			?>		
		</table>
	</body>
</html>