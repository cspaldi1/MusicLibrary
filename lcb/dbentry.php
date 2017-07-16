<?php
include 'dbconnect.php';


// process.php
if ((isset($_POST['action'])) && !empty($_POST['action'])) {
	$action=$_POST['action'];
	switch($action) {
		case 'addMember':
			$sql = "INSERT INTO bandmember (Fname, Lname, Instrument, Phone)
					VALUES ('".$_POST['firstName']."','".$_POST['lastName'].
					"','".$_POST['instrument']."','".$_POST['phone']."')";
			if (mysqli_query($link, $sql)) {
				include 'tablegen-member.php';
				break;
			} else {
				echo "0";
			}
			break;
		case 'removeMember':
			$sql = "DELETE FROM bandmember 
					WHERE MemberID = ".$_POST['MemberID'];
			if (mysqli_query($link, $sql)) {
				include 'tablegen-member.php';
				break;
			} else {
				echo "0";
			}
			break;
		case 'addComp':
			$sqlDate = date('Y-m-d', strtotime($_POST['LastPlayed']));
			$sql = "INSERT INTO composition (CompID, Composer, 
					Cond, LastPlayed, Notes, Title)
					VALUES ('".$_POST['CompID']."', '".$_POST['Composer']."', '".
					$_POST['Cond']."', '".$sqlDate."', '".
					$_POST['Notes']."', '".$_POST['Title']."')";
			if (mysqli_query($link, $sql)) {
				include 'tablegen-comp.php';
				break;
			} else {
				echo "0";
			}
			break;
		case 'addPerf':
			$sqlDate = date('Y-m-d', strtotime($_POST['Pdate']));
			$sql = "INSERT INTO performance (Location, Pdate, 
					PerfID, Pname, ProgramID, TicketCost)
					VALUES ('".$_POST['Location']."', '".$sqlDate."', '".
					$_POST['PerfID']."', '".$_POST['Pname']."', '".
					$_POST['ProgramID']."', '".$_POST['TicketCost']."')";
			if (mysqli_query($link, $sql)) {
				include 'tablegen-perf.php';
				break;
			} else {
				echo "0";
			}
			break;
		default:
			echo 0;
			break;
	}
}?>