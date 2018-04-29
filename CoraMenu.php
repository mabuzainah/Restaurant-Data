<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Cora Menu</title>
	</head>
	<?php
		session_start();
		$dbconn=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=dudi2007");
		if(!$dbconn){
			die("Error in connection: ".pg_last_error());
		}
		$sql="Select MI.name, MI.Price,MI.Category , MI.Description 
                FROM final_project.MenuItem MI 
                WHERE MI.RestaurantId = (Select R.RestaurantId 
			     FROM final_project.Restaurant R 
			     WHERE R.name = 'Cora')";
        $result = pg_query($dbconn, $sql);

		//close connection
		pg_close($dbconn);
	?>
	<body>
		<div id="header">Cora Menu</div>
		<table>
			<tr>
				<th>Name of Food</th>
				<th>Price</th>
				<th>Category</th>
				<th>Description</th>
			</tr>

			<!-- Loop through the recordset and display all records in a table -->
			<?php
				while($row=pg_fetch_array($result)) {?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
				</tr>
			<?php }
				//free memory
				pg_free_result($result);
			?>		
		</table>
	</body>
</html>