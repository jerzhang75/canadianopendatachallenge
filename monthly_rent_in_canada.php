<!DOCTYPE html>
<html>
<head>
		<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="nhpup_1.1.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">

<?php
    $file = fopen("housing_data.csv","r");
	 	$toronto = array();
  	$vancouver = array();
  	$winnipeg = array();
  	$regina = array();
  	$stjohns = array();
  	$charlottetown = array();
  	$halifax = array();
  	$fredericton = array();
  	$montreal = array();
  	$edmonton = array();
  	$calgary = array();
  	$yellowknife = array();
  	while(! feof($file)) {
    		$hi = fgetcsv($file);
    		if ($hi[1] == "Toronto, Ontario") { 
  	    		$toronto[] = $hi[2];
  	  	} elseif ($hi[1] == "Vancouver, British Columbia") {
	  		    $vancouver[] = $hi[2];
  	  	} elseif ($hi[1] == "Winnipeg, Manitoba") {
    	  		$winnipeg[] = $hi[2];
  		 	} elseif ($hi[1] == "Regina, Saskatchewan") {
      			$regina[] = $hi[2];
    		} elseif ($hi[1] == "St. John's, Newfoundland and Labrador") {
      			$stjohns[] = $hi[2];
    		} elseif ($hi[1] == "Charlottetown, Prince Edward Island") {
      			$charlottetown[] = $hi[2];
    		} elseif ($hi[1] == "Halifax, Nova Scotia") {
      			$halifax[] = $hi[2];
    		} elseif ($hi[1] == "Fredericton, New Brunswick") {
      			$fredericton[] = $hi[2];
    		} elseif ($hi[1] == "Montreal, Quebec") {
      			$montreal[] = $hi[2];
    		} elseif ($hi[1] == "Edmonton, Alberta") {
      			$edmonton[] = $hi[2];
    		} elseif ($hi[1] == "Calgary, Alberta") {
      			$calgary[] = $hi[2];
    		} elseif ($hi[1] == "Yellowknife, Northwest Territories") {
      			$yellowknife[] = $hi[2];
    		}
  	}
  	fclose($file);
?>

<script>
    var toronto = <?php echo json_encode($toronto); ?>;
    var vancouver = <?php echo json_encode($vancouver); ?>;
    var winnipeg = <?php echo json_encode($winnipeg); ?>;
    var regina = <?php echo json_encode($regina); ?>;
    var stjohns = <?php echo json_encode($stjohns); ?>;
    var charlottetown = <?php echo json_encode($charlottetown); ?>;
    var halifax = <?php echo json_encode($halifax); ?>;
    var fredericton = <?php echo json_encode($fredericton); ?>;
    var montreal = <?php echo json_encode($montreal); ?>;
    var edmonton = <?php echo json_encode($edmonton); ?>;     
    var calgary = <?php echo json_encode($calgary); ?>;
    var yellowknife = <?php echo json_encode($yellowknife); ?>;

    function generate_table(id) {
	    	var place;
	    	var prices = [];
  	  	if (id == 'toronto') {
    	  		place = "Toronto, Ontario";
      			for (var i=0; i < 20; i++) {
	      		  	prices.push(toronto[i]);
    				}
    		}
    	
    		else if (id == 'vancouver') {
    	  		place = "Vancouver, British Columbia"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(vancouver[i]);
      			}
    		}
    		
    		else if (id == 'winnipeg') {
      			place = "Winnipeg, Manitoba"; 
      			for (var i=0; i < 20; i++) {
      	  			prices.push(winnipeg[i]);
      			}
    		}
    		
    		else if (id == 'regina') {
      			place = "Regina, Saskatchewan"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(regina[i]);
      			}
    		}
    		
    		else if (id == 'stjohns') {
      			place = "St. John's, Newfoundland and Labrador"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(stjohns[i]);
      			}
    		}
    		
    		else if (id == 'charlottetown') {
      			place = "Charlottetown, Prince Edward Island"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(charlottetown[i]);
      			}
    		}
    		
    		else if (id == 'halifax') {
      			place = "Halifax, Nova Scotia"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(halifax[i]);
      			}
    		}
    		
    		else if (id == 'fredericton') {
      			place = "Fredericton, New Brunswick"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(fredericton[i]);
      			}
    		}
    		
    		else if (id == 'montreal') {
      			place = "Montreal, Quebec"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(montreal[i]);
      			}
    		}
    		
    		else if (id == 'edmonton') {
      			place = "Edmonton, Alberta"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(edmonton[i]);
      			}
    		}
    		
    		else if (id == 'calgary') {
      			place = "Calgary, Alberta"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(calgary[i]);
      			}
    		}
    		
    		else if (id == 'yellowknife') {
    				place = "Yellowknife, Northwest Territories"; 
      			for (var i=0; i < 20; i++) {
        				prices.push(yellowknife[i]);
      			}
    		}

				// Variables used to create table
				var theader = "<table border=\"1\" width=\"600\">"
				var tbody = "";
				var rows = 6;
				var cols = 7;
				var priceCols = 5;
				var counter = 0;
				var counter1 = 0;
				var counter2 = 0;
				var first = true;
				var colTitles = ["Type of Structure", "Type of Unit", "2009", "2010", "2011", "2012", "2013"];
				var unitTypes = ["Bachelor Units", "One Bedroom Units", "Two Bedroom Units", "Three Bedroom Units"];
				var tfooter = "</table>";

				// Creating the table
				for (var i = 0; i < rows; i++) {
						tbody += "<tr>";
						for (var j = 0; j < cols; j++) {

								if (i == 0 && first == true) {
										tbody += "<th colspan=\"7\">";
										tbody += place;
										first = false;
								}
			
								else if (i == 1) {
										tbody += "<th>";
										tbody += colTitles[counter];
										counter++;
								}
				
								else if (i > 1) {
										if (i == 2 && j == 0) {
												tbody += "<th rowspan=\"4\">";
												tbody += "Row and apartment structures of three units and over";
										}
					
										else if (j > 0) {

												if (j == 1) {
														tbody += "<th>";
														tbody += unitTypes[counter1];
														counter1++;
												}

												else {
														tbody += "<td>";
														tbody += prices[counter2].toString();
														counter2++;
												}
										}
								}
								tbody += "</th>";
						}
						tbody += "</tr>";
				}
				
				// Display the table
    		document.getElementById("hidden-table").innerHTML = theader + tbody + tfooter;
    		// Hover effect
				nhpup.popup($('#hidden-table').html(), {'width': 600});
				
		}
</script>
</head>

<body>
<div style="position: absolute; left: 0px; top: 0px;">
  <img onmouseenter="generate_table('toronto')" src="dot.png" style="position: absolute; top: 800px; left: 975px;"/>  <!-- Toronto -->
  <img onmouseover="generate_table('vancouver')" src="dot.png" style="position: absolute; top: 610px; left: 215px;"/>  <!-- Vancouver -->
  <img onmouseover="generate_table('winnipeg')" src="dot.png" style="position: absolute; top: 710px; left: 640px;"/>  <!-- Winnipeg -->
  <img onmouseover="generate_table('regina')" src="dot.png" style="position: absolute; top: 685px; left: 530px;"/>  <!-- Regina -->
  <img onmouseover="generate_table('stjohns')" src="dot.png" style="position: absolute; top: 575px; left: 1370px;"/>  <!-- St. John's, NFL -->
  <img onmouseover="generate_table('charlottetown')" src="dot.png" style="position: absolute; top: 670px; left: 1230px;"/>  <!-- Charlottetown, PEI -->
  <img onmouseover="generate_table('halifax')" src="dot.png" style="position: absolute; top: 700px; left: 1240px;"/>  <!-- Halifax, NS -->
  <img onmouseover="generate_table('fredericton')" src="dot.png" style="position: absolute; top: 690px; left: 1185px;"/>  <!-- Fredericton, NB -->
  <img onmouseover="generate_table('montreal')" src="dot.png" style="position: absolute; top: 740px; left: 1055px;"/>  <!-- Montreal, QC -->
  <img onmouseover="generate_table('edmonton')" src="dot.png" style="position: absolute; top: 590px; left: 405px;"/>  <!-- Edmonton, AB -->
  <img onmouseover="generate_table('calgary')" src="dot.png" style="position: absolute; top: 635px; left: 375px;"/>  <!-- Calgary, AB -->
  <img onmouseover="generate_table('yellowknife')" src="dot.png" style="position: absolute; top: 410px; left: 470px;"/>  <!-- Yellowknife, NT -->
</div>
<div id="hidden-table" style="display:none;">
</div>
<img src="blm_1_map_of_canada_11x17.jpg" height="900" width="1600">
<nav>
  <ul>
    <a href="monthly_rent_in_canada.php"><li>Row and apartment structures of three units and over<li></a>
    <a href="monthly_rent_in_canada2.php"><li>Row and apartment structures of three units and over<li></a>
  </ul>
</nav>
</body>
</html>
