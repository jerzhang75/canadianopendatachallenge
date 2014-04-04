<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="nhpup_1.1.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42934369-4', 'net84.net');
  ga('send', 'pageview');

</script>

  <title>Monthly Rent Prices (Canada)</title>
  <h1>Monthly Rent in Canada</h1>

  <!-- Loading & storing data -->
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
        $l = fgetcsv($file);
        if ($l[1] == "Toronto, Ontario") { 
            $toronto[] = $l[2];
        } elseif ($l[1] == "Vancouver, British Columbia") {
            $vancouver[] = $l[2];
        } elseif ($l[1] == "Winnipeg, Manitoba") {
            $winnipeg[] = $l[2];
        } elseif ($l[1] == "Regina, Saskatchewan") {
            $regina[] = $l[2];
        } elseif ($l[1] == "St. John's, Newfoundland and Labrador") {
            $stjohns[] = $l[2];
        } elseif ($l[1] == "Charlottetown, Prince Edward Island") {
            $charlottetown[] = $l[2];
        } elseif ($l[1] == "Halifax, Nova Scotia") {
            $halifax[] = $l[2];
        } elseif ($l[1] == "Fredericton, New Brunswick") {
            $fredericton[] = $l[2];
        } elseif ($l[1] == "Montreal, Quebec") {
            $montreal[] = $l[2];
        } elseif ($l[1] == "Edmonton, Alberta") {
            $edmonton[] = $l[2];
        } elseif ($l[1] == "Calgary, Alberta") {
            $calgary[] = $l[2];
        } elseif ($l[1] == "Yellowknife, Northwest Territories") {
            $yellowknife[] = $l[2];
        }
    }
    fclose($file);
  ?>

<!--  <script type="text/javascript">
    $(document).ready(function() {
    var children = document.getElementById("dots").childNodes;
    alert(children.length);
    for (int i = 0; i < children.length; i++) {
      alert(children[i]);
      children[i].onmouseout = function() {
        document.getElementById("hidden-table").innerHTML = "";
      }
    }
  });
    </script>-->

    <script>

  // Transfer the data to JavaScript arrays using JSON
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

  function hide_table() {
    nhpup.pup.hide();
  }

  </script>
</head>

<body>
  <div id="dots" style="position: absolute; left: 0px; top: 0px;">
      <img id="toronto" onmouseover="generate_table('toronto');" onmouseout="hide_table();" src="dot.png"/>  <!-- Toronto -->
      <img id="vancouver" onmouseover="generate_table('vancouver');" onmouseout="hide_table();" src="dot.png" />  <!-- Vancouver -->
      <img id="winnipeg" onmouseover="generate_table('winnipeg');" onmouseout="hide_table();" src="dot.png" />  <!-- Winnipeg -->
      <img id="regina" onmouseover="generate_table('regina');" onmouseout="hide_table();" src="dot.png" />  <!-- Regina -->
      <img id="stjohns" onmouseover="generate_table('stjohns');" onmouseout="hide_table();" src="dot.png" />  <!-- St. John's, NFL -->
      <img id="charlottetown" onmouseover="generate_table('charlottetown');" onmouseout="hide_table();" src="dot.png" />  <!-- Charlottetown, PEI -->
      <img id="halifax" onmouseover="generate_table('halifax');" onmouseout="hide_table();" src="dot.png" />  <!-- Halifax, NS -->
      <img id="fredericton" onmouseover="generate_table('fredericton');" onmouseout="hide_table();" src="dot.png" />  <!-- Fredericton, NB -->
      <img id="montreal" onmouseover="generate_table('montreal');" onmouseout="hide_table();" src="dot.png" />  <!-- Montreal, QC -->
      <img id="edmonton" onmouseover="generate_table('edmonton');" onmouseout="hide_table();" src="dot.png" />  <!-- Edmonton, AB -->
      <img id="calgary" onmouseover="generate_table('calgary');" onmouseout="hide_table();" src="dot.png" />  <!-- Calgary, AB -->
      <img id="yellowknife" onmouseover="generate_table('yellowknife');" onmouseout="hide_table();" src="dot.png" />  <!-- Yellowknife, NT -->
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
