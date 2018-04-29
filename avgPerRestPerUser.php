<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Average Per Category</title>
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
		$sql="SELECT U.userId, R.name, AVG((R8.food_rating+R8.mood_rating+R8.staff_rating +R8.price_rating)/4) as average_rating, COUNT(R8.*)
	FROM final_project.Rating R8, final_project.Restaurant R, final_project.Rater U WHERE
	R8.resTId = R.restaurantId AND R8.uId = U.userId
	 GROUP BY R.name, U.userId ORDER BY R.name , average_rating";

        $result = pg_query($dbconn, $sql);

		//close connection
		pg_close($dbconn);
	?>
	<body>
		<h2>Average Prices per Category</h2>
		<table>
			<tr>
				<th>User ID</th>
                <th>Restaurant Name</th>
				<th>Average Rating</th>
                
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
        <br>
        <br>
        
        <button id='myBtn'> Press to go back to main webpage</button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
        </script>
	</body>
</html>