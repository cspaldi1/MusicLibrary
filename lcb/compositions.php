<?php
include 'dbconnect.php';
include 'header.php';
include 'navbar.php';
?>
<script>
function addComp() {
	//Ajax call
	var compID = $('input#compID').val();
	var title = $('input#title').val();
	var composer = $('input#composer').val();
	var condition = $('select#cond').val();
	var notes = $('input#notes').val();
	var lastPlayed = $('input#lastPlayed').val();
	
	$.ajax({
		type: "POST",
		url: "dbentry.php",	//php handler
		data: {action: 'addComp', 
				CompID: compID, 
				Title: title, 
				Composer: composer, 
				Cond: condition,
				Notes: notes,
				LastPlayed: lastPlayed},
		success: function(output) {
			if (output==0) {	//if function was successful
				alert("Error Adding Composition");
			} else {
				document.getElementById('comptable').innerHTML = output;
				alert("Composition Added!");
				$("input[type=text], textarea").val("");
			}
		}
	});
	return false;
}
</script>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">Add Composition</h4>
	</div>
</div>
<form>
	<div class="row" style="padding-top:20px;">
		<div class="large-2 columns">
			<label>Composition ID:
				<input id="compID" type="text" placeholder="AB-123"/>
			</label>
		</div>
		<div class="large-5 columns">
			<label>Title:
				<input id="title" type="text" placeholder="Sleigh Ride"/>
			</label>
		</div>
		<div class="large-3 columns">
			<label>Composer:
				<input id="composer" type="text" placeholder="Leroy Anderson"/>
			</label>
		</div>
		<div class="large-2 columns">
			<label>Condition:
				<select id="cond">
					<option value="NEW">NEW</option>
					<option value="GOOD">GOOD</option>
					<option value="OKAY">OKAY</option>
					<option value="BAD">BAD</option>
				<select>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-8 columns">
			<label>Notes:
				<input id="notes" type="text" placeholder="Need new copies for percussion"/>
			</label>
		</div>
		<div class="large-4 columns">
			<label>Last Played:
				<input id="lastPlayed" type="text" placeholder="2017-12-21"/>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="large-3 columns left">
			<label type="button" onclick="addComp();" name="submit" class="button" value="Remove Member">Add Composition</label>
		</div>
	</div>
</form>
<div class="row">
	<div class="large-12 columns" style="background-color:#336699;height:40px">
		<h4 style="color:white;">View Compositions</h4>
	</div>
</div>
<div class="row" style="padding-top:20px;">
	<table id="comptable" style="width:100%">
		<?php
			include 'tablegen-comp.php';
		?>
	</table>
</div>