<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Subway Details</title>
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
		$sql="Select MI.name, MI.Price,MI.Category , MI.Description 
                FROM final_project.MenuItem MI 
                WHERE MI.RestaurantId = (Select R.RestaurantId 
			     FROM final_project.Restaurant R 
			     WHERE R.name = 'Subway')";
        $result = pg_query($dbconn, $sql);
//		if(!$result) {
//			die("Error in SQL query: ". pg_last_error());
//		}
		//close connection
		pg_close($dbconn);
	?>
	<body>
		<h2>Subway Restaurant Menu</h2>
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
        
        <br>
        <button id='btnReturn'> Homepage </button>
        <button id='btnAddMenu'> Add Menu Item </button>
        <button id='btnRemoveMenu'> Remove Menu Item </button>
        
        <script>
            var btn = document.getElementById('btnReturn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
            var btn = document.getElementById('btnAddMenu');
            btn.addEventListener('click', function() {
            document.location.href = 'SubwayAddMenu.php';
            });
            var btn = document.getElementById('btnRemoveMenu');
            btn.addEventListener('click', function() {
            document.location.href = 'SubwayRemoveMenu.php';
            });
        </script>
        <br>
        
	</body>
</html>