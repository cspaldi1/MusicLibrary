<?php
include 'dbconnect.php';
include 'header.php';
include 'navbar.php';
	
$sql = "SELECT COUNT(*) as Members
		FROM bandmember";
		
$result = mysqli_query($link,$sql);
$numMembers = mysqli_fetch_assoc($result);

//Find next performance date
$sql = "SELECT Pdate
		FROM performance
		ORDER BY Pdate ASC";
$result = mysqli_query($link,$sql);
$nextConcert = "None Scheduled.";

//Get int value of current date
$currentDate = date_timestamp_get(date_create());

while ($row = mysqli_fetch_assoc($result)) {
	//get int value of concert date
	$rowDate = date_timestamp_get(date_create($row['Pdate']));
	
	//if the next date is in the future, set it to the next concert
	if ($rowDate >= $currentDate) {
		$nextConcert = date('l F jS, Y',$rowDate);
		break;
	}
}
?>
<div class="row">
	<h2 style="text-align:center;padding-top:30px">Quick Stats</h2>
</div>
<div class="row">
	<div style="padding:20px;font-size:30px;text-align:center;border-radius:20px;background-color:#cce6ff;">
		<h4> Total Members: <?=$numMembers['Members']?></h4>
		<h4> Next Concert: <?=$nextConcert?></h4>
	</div>
</div>
<?php
	include 'footer.php';
?>
