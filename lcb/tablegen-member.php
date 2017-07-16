<tr>
	<th>MemberID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Instrument</th>
	<th>Phone Number</th>
</tr>
<?php
	$sql = "SELECT *
		FROM bandmember
		ORDER BY Instrument";

	$result = mysqli_query($link,$sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row["MemberID"]."</td>";
		echo "<td>".$row["Fname"]."</td>";
		echo "<td>".$row["Lname"]."</td>";
		echo "<td>".$row["Instrument"]."</td>";
		echo "<td>".$row["Phone"]."</td>";
		echo "</tr>";
	}
?>