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
		$sql="Select R.name, L.OPENING_date 
FROM final_project.Restaurant R, final_project.Location L 
WHERE R.restaurantId IN (SELECT R8.restId 
					FROM final_project.Rating R8 
					WHERE R8.staff_rating < ANY(Select Rate.staff_rating 
												FROM final_project.Rating Rate 
												WHERE Rate.uId = '100')) AND R.restaurantId = L.restId";

        $result = pg_query($dbconn, $sql);

		//close connection
		pg_close($dbconn);
?>
	<body>
		<h2>Restaurants with Staff ratings lower than rating by rater '100'</h2>
		<table>
			<tr>
                <th>Restaurant Name</th>
				<th>Opening Date</th>
                
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