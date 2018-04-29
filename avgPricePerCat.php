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
		$sql="SELECT R.type, MI.category, AVG(MI.price) AS average_price 
FROM final_project.MenuItem MI, final_project.Restaurant R 
WHERE MI.restaurantId IN (SELECT R1.restaurantId 
			  FROM final_project.Restaurant R1 
			  WHERE R1.type = R.type)
	AND MI.restaurantId = R.restaurantId
GROUP BY R.type, MI.category 
ORDER BY R.type, MI.category";

        $result = pg_query($dbconn, $sql);

		//close connection
		pg_close($dbconn);
	?>
	<body>
		<h2>Average Prices per Category</h2>
		<table>
			<tr>
				<th>Restaurant</th>
                <th>Category</th>
				<th>Average Price</th>
                
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