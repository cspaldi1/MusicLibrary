<tr>
	<th>Performance ID</th>
	<th>Performance Name</th>
	<th>Performance Date</th>
	<th>Location</th>
	<th>Ticket Cost</th>
	<th>Program ID</th>
</tr>
<?php
	$sql = "SELECT *
			FROM performance
			ORDER BY Pdate";

	$result = mysqli_query($link,$sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row["PerfID"]."</td>";
		echo "<td>".$row["Pname"]."</td>";
		echo "<td>".$row["Pdate"]."</td>";
		echo "<td>".$row["Location"]."</td>";
		echo "<td>".$row["TicketCost"]."</td>";
		echo "<td>".$row["ProgramID"]."</td>";
		echo "</tr>";
	}
?>