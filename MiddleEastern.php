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
		$sql="Select L.Manager, L.Opening_Date 
	FROM final_project.Location L 
	JOIN final_project.RESTAURANT R ON R.RESTAURANTID = L.RESTID
	WHERE R.type = 'Middle Eastern'";
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
        <button id='myBtn2'> Restaurants with Highest Food Rating in this category </button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'index2.html';
            });
        </script>
        <script>
            var btn = document.getElementById('myBtn2');
            btn.addEventListener('click', function() {
            document.location.href = 'highFoodME.php';
            });
        </script>
        <br>
        <br>
		<table>
			<tr>
				<th>Manager Name</th>
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
	</body>
</html>