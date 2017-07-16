<tr>
	<th>Performance ID</th>
	<th>Performance Name</th>
	<th>Performance Date</th>
	<th>Ticket Cost</th>
	<th>Location</th>
	<th>Program ID</th>
	<th>Phone Number</th>
	<th>Phone Number</th>
</tr>
<?php
	$sqlProg = "SELECT *
		FROM performance
		FULL JOIN program ON performance.ProgramID = program.ProgramID		
		ORDER BY Instrument";

	$result = mysqli_query($link,$sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		foreach ($row as $data) {
			echo "<td>".$data."</td>";
		}
		echo '</tr>';
		/*echo "<td>".$row["MemberID"]."</td>";
		echo "<td>".$row["Fname"]."</td>";
		echo "<td>".$row["Lname"]."</td>";
		echo "<td>".$row["Instrument"]."</td>";
		echo "<td>".$row["Phone"]."</td>";
		echo "</tr>";*/
	}
?>