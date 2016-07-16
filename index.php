<!DOCTYPE html>
<html>
<head>
	<title>Student Search | IITK</title>

	<link rel="stylesheet" href="css/material.indigo-red.min.css" />
	<link rel="stylesheet" href="css/mdl-selectfield.min.css">

	<link rel="stylesheet" href="css/style.css" />

	<link rel="stylesheet" href="fonts/md-icons.css">
	<link href="fonts/font_roboto.css" rel="stylesheet">

    <script src="js/jquery-1.9.1.js"></script>
	<script src="js/material.min.js"></script>
    <script src="js/mdl-selectfield.min.js"></script>
    <script src="js/script.js"></script>

</head>
<body>
	<div class="mdl-grid">
		<div class="left-panel mdl-cell mdl-cell--8-col">
			<div class="search-box">
				<form action="index.php" method="GET" class="mdl-grid">
				  	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    	<input class="mdl-textfield__input" type="text" id="query" name="query">
				    	<label class="mdl-textfield__label" for="query">Search Query</label>
				    	<div class="mdl-tooltip mdl-tooltip--large" for="query">
				    		Could be name, roll no., username or address
				    	</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--2-col">
	  			  		<div class=" mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
	  		  		        <select class="mdl-selectfield__select" id="gender" name="gender">
								<option value="all">Both</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
	  		  		        </select>
	  		  		        <label class="mdl-selectfield__label" for="gender">Gender</label>
	  					</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--2-col">
	  			  		<div class=" mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
	  		  		        <select class="mdl-selectfield__select" id="batch" name="batch">
			                    <option value="all">All</option>
								<option value="15">Y15</option>
			                	<option value="14">Y14</option>
			        			<option value="13">Y13</option>
			        			<option value="12">Y12</option>
			        			<option value="11">Y11</option>
			        			<option value="10">Y10</option>
	  		  		        </select>
	  		  		        <label class="mdl-selectfield__label" for="batch">Batch</label>
	  					</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--2-col">
	  			  		<div class=" mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
	  		  		        <select class="mdl-selectfield__select" id="hall" name="hall">
								<option value="all">All</option>
								<option value="GH">GH-1</option>
			        			<option value="gh2">GH-2</option>
			        			<option value="HALL1">Hall-1</option>
			        			<option value="HALL2">Hall-2</option>
			        			<option value="HALL3">Hall-3</option>
			        			<option value="HALL4">Hall-4</option>
			        			<option value="HALL5">Hall-5</option>
			        			<option value="HALL7">Hall-7</option>
			        			<option value="HALL8">Hall-8</option>
			        			<option value="HALL9">Hall-9</option>
			        			<option value="HALLX">Hall-10</option>
			        			<option value="SBRA">SBRA</option>
	  		  		        </select>
	  		  		        <label class="mdl-selectfield__label" for="hall">Hall</label>
	  					</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--2-col">
	  			  		<div class=" mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
	  		  		        <select class="mdl-selectfield__select" id="degree" name="degree">
								<option value="all">All</option>
								<option value="BS">BS</option>
								<option value="BTech">B.Tech.</option>
								<option value="MTech">M.Tech.</option>
								<option value="MT(Dual)">M.Tech(Dual)</option>
								<option value="MSc">M.Sc.</option>
								<option value="MSc(Int)">M.Sc.(Integrated)</option>
								<option value="MBA">M.B.A.</option>
								<option value="MDes">M.Des.</option>
								<option value="PhD">Ph.D.</option>
	  		  		        </select>
	  		  		        <label class="mdl-selectfield__label" for="degree">Degree</label>
	  					</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--2-col">
	  			  		<div class=" mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
	  		  		        <select class="mdl-selectfield__select" id="dept" name="dept">
					            <option value="all">All</option>
								<option value="AEROSPACE ENGG.">AE</option>
								<option value="BIOL.SCI. AND BIO.ENGG.">BSBE</option>
								<option value="CHEMICAL ENGG.">CHE</option>
								<option value="CHEMISTRY">CHE</option>
								<option value="CIVIL ENGG.">CE</option>
								<option value="COMPUTER SCI. & ENGG.">CSE</option>
								<option value="ECONOMICS">ECO</option>
								<option value="ELECTRICAL ENGG.">EE</option>
								<option value="IND. & MANAGEMENT ENGG.">IME</option>
								<option value="MATERIAL SCIENCE & ENGINEERING">MSE</option>
								<option value="MATHEMATICS">MTH</option>
								<option value="MECHANICAL ENGG.">ME</option>
								<option value="PHYSICS">PHY</option>
	  		  		        </select>
	  		  		        <label class="mdl-selectfield__label" for="dept">Department</label>
	  					</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--2-col">
	  			  		<div class=" mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
	  		  		        <select class="mdl-selectfield__select" id="blood" name="blood">
								<option value="all">All</option>
					            <option value="all">Blood Group</option>
								<option value="O%2B">O+</option>
								<option value="O-">O-</option>
								<option value="A%2B">A+</option>
								<option value="A-">A-</option>
								<option value="B%2B">B+</option>
								<option value="B-">B-</option>
								<option value="AB%2B">AB+</option>
								<option value="AB-">AB-</option>
	  		  		        </select>
	  		  		        <label class="mdl-selectfield__label" for="blood">Blood Group</label>
	  					</div>
				  	</div>
				  	<div class="mdl-cell mdl-cell--12-col text-right">
				  		<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect" onclick="resetFields()">
				  		    Reset
				  		</button>
				  		<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
				  		   Submit
				  		</button>
				  	</div>
				</form>
			</div>
			<?php
				if(isset($_GET['query'])){
					include 'partials/search.php';
				}
				else {
					include 'partials/welcome.php';
				}
			?>
		</div>
		<div class="right-panel mdl-cell mdl-cell--4-col">
			<div class="quick-view"></div>
		</div>
	</div>
</body>
</html>