<tr>
	<th>Composition ID</th>
	<th>Title</th>
	<th>Composer</th>
	<th>Condition</th>
	<th>Notes</th>
	<th>Last Played</th>
</tr>
<?php
	$sql = "SELECT *
			FROM composition";

	$result = mysqli_query($link,$sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row["CompID"]."</td>";
		echo "<td>".$row["Title"]."</td>";
		echo "<td>".$row["Composer"]."</td>";
		echo "<td>".$row["Cond"]."</td>";
		echo "<td>".$row["Notes"]."</td>";
		echo "<td>".$row["LastPlayed"]."</td>";
		echo "</tr>";
	}
?>