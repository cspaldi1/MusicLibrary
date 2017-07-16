<?php 
include 'dbconnect.php';
include 'header.php';
include 'navbar.php';
?>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">Add Performance</h4>
	</div>
</div>
<form>
	<div class="row" style="padding-top:20px;">
		<div class="large-2 columns">
			<label>Performance ID:
				<input id="perfID" type="text" placeholder="136"/>
			</label>
		</div>
		<div class="large-4 left columns">
			<label>Performance Name:
				<input id="pname" type="text" placeholder="The Red Cedar Music Festival"/>
			</label>
		</div>
		<div class="large-2 left columns">
			<label>Performance Date:
				<input id="pdate" type="text" placeholder="2010-05-10"/>
			</label>
		</div>
		<div class="large-2 left columns">
			<label>Program ID:
				<input id="programID" type="text" placeholder="wint-1"/>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-4 left columns">
			<label>Performance Location:
				<input id="location" type="text" placeholder="Okemos High School"/>
			</label>
		</div>
		<div class="large-2 left columns">
			<label>Ticket Cost:
				$<input id="ticketCost" type="number" step="0.01" placeholder="Okemos High School"/>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-3 columns left">
			<label type="button" onclick="addPerf();" name="submit" class="button" value="Remove Member">Add Performance</label>
		</div>
	</div>
</form>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">View Performances</h4>
	</div>
</div>
<div class="row" style="padding-top:20px;">
	<table id="perftable" style="width:100%">
		<?php
			include 'tablegen-perf.php';
		?>
	</table>
</div>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">Program Information</h4>
	</div>
</div>
<div class="row" style="padding-top:20px;">
	<table id="perftable" style="width:100%">
		<?php
			include 'tablegen-prog.php';
		?>
	</table>
</div>
<script>
function addPerf() {
	//Ajax call
	var perfID = $('input#perfID').val();
	var pname = $('input#pname').val();
	var pdate = $('input#pdate').val();
	var programID = $('input#programID').val();
	var location = $('input#location').val();
	var ticketCost = $('input#ticketCost').val();
	
	$.ajax({
		type: "POST",
		url: "dbentry.php",	//php handler
		data: {action: 'addPerf', 
				PerfID: perfID, 
				Pname: pname, 
				Pdate: pdate,
				ProgramID: programID,
				Location: location,
				TicketCost: ticketCost},
		success: function(output) {
			if (output==0) {	//if function was unsuccessful
				alert("Error Adding Performance");
			} else {
				document.getElementById('perftable').innerHTML = output;
				alert("Performance Added!");
				$("input[type=text], textarea").val("");
			}
		}
	});
	return false;
}
</script>
<?php
	include 'footer.php';
?>