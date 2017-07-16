<?php
include 'dbconnect.php';
include 'header.php';
include 'navbar.php';

/*$sql = "SELECT *
		FROM bandmember";

$result = mysqli_query($link,$sql);*/

?>
<script>
function addMember() {
	//Ajax call
	var fname = $('input#firstName').val();
	var lname = $('input#lastName').val();
	var instr = $('input#instrument').val();
	var phoneNum = $('input#phone').val();
	$.ajax({
		type: "POST",
		url: "dbentry.php",	//php handler
		data: {action: 'addMember', firstName: fname, lastName: lname, instrument: instr, phone: phoneNum},
		success: function(output) {
			if (output==0) {	//if function was successful
				alert("Error Adding Member");
			} else {
				document.getElementById('membertable').innerHTML = output;
				alert("Member Added!");
				$("input[type=text], textarea").val("");
			}
		}
	});
	return false;
}
function removeMember() {
	//Ajax call
	var memberID = $('input#memid').val();
	
	$.ajax({
		type: "POST",
		url: "dbentry.php",	//php handler
		data: {action: 'removeMember', MemberID: memberID},
		success: function(output) {
			if (output==0) {	//if function was successful
				alert("Error Removing Member");
			} else {
				document.getElementById('membertable').innerHTML = output;
				alert("Member Removed!");
				$("input[type=text], textarea").val("");
			}
		}
	});
	return false;
}
</script>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">Add Member</h4>
	</div>
</div>
<div id="addMemberForm">
	<form name="addmember" id="addmember">
		<div class="row" style="padding-top:20px;">
			<div class="large-3 columns">
				<label>First Name:
					<input id="firstName" name="firstName" type="text" placeholder="John"/>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Last Name:
					<input id="lastName" name="lastName" type="text" placeholder="Doe"/>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Instrument:
					<input id="instrument" name="instrument" type="text" placeholder="Saxophone"/>
				</label>
			</div>
			<div class="large-3 columns">
				<label>Phone Number:
					<input id="phone" name="phone" type="text" placeholder="(XXX)XXX-XXXX"/>
				</label>
			</div>
			<!--<input style="display:none;" name="action" type="text" value="addMember"></input>-->
		</div>
		<div class="row">
			<div class="large-3 columns left">
				<label id="addMemButton" type="button" onclick="addMember();" name="submit" class="button" value="Add Member">Add Member</label>
			</div>
		</div>
	</form>
</div>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">Remove Member</h4>
	</div>
</div>
<form>
	<div class="row" style="padding-top:20px;">
		<div class="large-3 columns">
			<label>MemberID:
				<input id="memid" type="text" placeholder="12"/>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-3 columns left">
			<label id="removeMemButton" type="button" onclick="removeMember();" class="button">Remove Member</label>
		</div>
	</div>
</form>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">View Members</h4>
	</div>
</div>
<div class="row" style="padding-top:20px;">
	<table id="membertable" style="width:100%">
		<!--<tr>
			<th>MemberID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Instrument</th>
			<th>Phone Number</th>
		</tr>-->
		<?php
			/*while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row["MemberID"]."</td>";
				echo "<td>".$row["Fname"]."</td>";
				echo "<td>".$row["Lname"]."</td>";
				echo "<td>".$row["Instrument"]."</td>";
				echo "<td>".$row["Phone"]."</td>";
				echo "</tr>";
			}*/
			include 'tablegen-member.php';
		?>
	</table>
</div>
<?php
include 'footer.php';
?>