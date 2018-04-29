<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>In-decisive</title>
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
		$sql="SELECT U.name, U.type, U.email, R.name, R8.food_rating, R8.price_rating, 
	           R8.mood_rating, R8.staff_rating, R8.comments 
	           FROM final_project.Rater U, final_project.Rating R8, final_project.Restaurant R 
	           WHERE U.userId IN (SELECT U1.userId 
					FROM final_project.Rater U1 
					GROUP BY U1.userId 
					HAVING (SELECT max(stddev) 
							FROM(SELECT stddev(Rate.mood_rating + Rate.staff_rating + Rate.price_rating +Rate.food_rating) as stddev 
								FROM final_project.Rating Rate 
								WHERE Rate.uId = U1.userId 
								GROUP BY Rate.restId) as whoCares)
			>= ALL((SELECT max(stddev) FROM (SELECT stddev(Rate1.mood_rating + Rate1.staff_rating + Rate1.price_rating +Rate1.food_rating) FROM final_project.Rating Rate1 GROUP BY Rate1.uId, Rate1.restId) as whatever)))
		AND R8.uId = U.userId AND R8.restId = R.restaurantId AND
			R.restaurantId IN (SELECT R2.restaurantId FROM  final_project.restaurant R2 GROUP BY R2.restaurantId HAVING
			(SELECT max(stddev) FROM(SELECT stddev(Rate2.mood_rating + Rate2.staff_rating + Rate2.price_rating +Rate2.food_rating) as stddev 
				FROM final_project.Rating Rate2 WHERE Rate2.restId = R2.restaurantId GROUP BY Rate2.restId, Rate2.uId) as whatever)
			>= ALL((SELECT max(stddev) FROM (SELECT stddev(Rate3.mood_rating + Rate3.staff_rating + Rate3.price_rating +Rate3.food_rating) FROM final_project.Rating Rate3 GROUP BY Rate3.uId, Rate3.restId) as whatever)))";

        $result = pg_query($dbconn, $sql);
		//close connection
		pg_close($dbconn);
	?>
	<body>
		<h2>Indecisive Users</h2>
		<table>
			<tr>
				<th>Name</th>
				<th>Type of User</th>
				<th>Email</th>
                <th>Restaurant's Name</th>
                <th>Food Rating</th>
                <th>Price Rating</th>
                <th>Mood Rating</th>
                <th>Staff Rating</th>
                <th>Comments about experience</th>
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
                    <td><?php echo $row[8]; ?></td>
				</tr>
			<?php }
				//free memory
				pg_free_result($result);
			?>		
		</table>
        
        <button id='myBtn'> Click here to return back to the Ratings Page</button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'ratingMain.php';
            });
        </script>
	</body>
</html>