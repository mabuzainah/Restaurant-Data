<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Most Expensive Item</title>
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
		$sql="Select MI.name, MI.price, L.Manager, L.Opening_Time , L.Closing_Time, R.URL 
	FROM final_project.Restaurant R, final_project.Location L, final_project.MenuItem MI 
	WHERE MI.price >= all (Select MI1.price 
				FROM final_project.MenuItem MI1 
				WHERE MI1.restaurantId = R.restaurantId) AND
			R.restaurantId = L.restId AND 
			MI.restaurantId = R.restaurantId AND R.name ='Shawarma Palace'";

        $result = pg_query($dbconn, $sql);

		//close connection
		pg_close($dbconn);
	?>
	<body>
		<h2>Most Expensive Item(s)</h2>
		<table>
			<tr>
				<th>Item Name</th>
				<th>Price</th>
                <th>Manager's Name</th>
                <th>Opening Time</th>
                <th>Closing Time</th>
                <th>Restaurant URL</th>
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