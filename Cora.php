<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Cora Details</title>
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
		$sql="SELECT R.name, R.type, R.url, L.opening_date, L.manager, L.phone_number, L.address, L.Opening_Time, L.Closing_time FROM final_project.Restaurant R, final_project.Location L WHERE R.name ='Cora' AND R.restaurantId = L.restId";
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
		<div id="header">Cora Restaurant Details</div>
		<table>
			<tr>
				<th>Restaurant Name</th>
				<th>Type of Restaurant</th>
				<th>URL</th>
				<th>Opening Date</th>
                <th>Manager's Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Opening Time</th>
                <th>Closing Time</th>
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
        
        <button id='myBtn'> Click here to access the most expensive item on the menu</button>
        <script>
            var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'CoraMenuExp.php';
            });
        </script>
	</body>
</html>