<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Japanese Category</title>
	</head>
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
	WHERE R.type = 'Japanese'";
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
		<div id="header">Japanese Restaurant Category</div>
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