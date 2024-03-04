<! –– link to stargate ––>
<! –– https://stargate.ncc.edu/~jun0785/homework6.php ––>

<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/turtlebkg.jpg");
	font-family: arial;
	color: #217C7E;
}

#contentwrap {
	border: 8px #9A3334 solid;
	padding: 20px;
	width: 600px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	background: white;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/turtlerock.jpg");
	background-repeat: no-repeat;
	background-position: right 130px;
}

#heading {
	font-size: 1.9em;
	border-bottom: 6px #217C7E double;
	padding: 10px 0px 10px 0px;
	color: darkred;
	text-align: center;
}

.footer{
	font-size: 1em;
	border-top: 6px #217C7E double;
	padding: 10px 0px 10px 0px;
	color: darkred;
	text-align: left;
}

#formdiv {

	padding-top: 25px;
}

.formtext {
	font-size: 1em;
	margin-top: 20px;
}

.formfield {
	border: 2px darkred solid;
	background: lightyellow;
	color: darkred;
	font-size: 1.1em;
	padding: 2px;
}

#orderbutton {
	border: 2px purple solid;
	background-color: lightblue;
	font-size: 1.25em;
}

</style>

</head>
<body>

<div id="contentwrap">

	<div id="heading">Turtle Speed Pakcage Delivery Service</div>
	
	<div id="formdiv">
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
			<div class="formtext">Enter package weight (lbs)</div>
			<div><input type="text" class="formfield" name="weight" /></div>
			
			<div class="formtext">Select Destination</div>
			<select class="formfield" style="width:280px;" name="dest">
				<option value="ny">New York (No extra cost)</option>
				<option value="out">Out of State ($15.00 added)</option>
			</select>
			
			<div class="formtext">Insurance</div>
			<div><input type="radio" name="insurance" value="yes"/>Yes ($10.00 extra)</div>
			<div><input type="radio" name="insurance" value="no" checked />No</div>
		
			<div style="margin-top:10px;">
				<input type="submit" value="Submit Order" id="orderbutton">
			</div>
		
		</form>
			
        <?php
        if (isset($_POST['weight'])) {
            $weight = $_POST['weight'];
            $dest = $_POST['dest'];
            $insurance = $_POST['insurance'];

            // Start of footer style div
            echo '<div class="footer">'; 

            echo "Results of your order:<br>";
            echo "Package weight: " . $weight . "<br>";
            
            if ($weight >= 0 && $weight <= 25) {
                $weight_charge = 15;
            } elseif ($weight > 25 && $weight <= 50) {
                $weight_charge = 25;
            } else {
                $weight_charge = 40;
            }

            echo 'Base cost of package based on weight: $' . $weight_charge . '<br>';
            
            if ($dest == 'ny'){
                $destination_charge = 0;
                echo 'Destination selected: New York (no extra fee)<br>'; 
            } elseif ($dest == 'out') {
                $destination_charge = 15;
                echo 'Destination selected: Out of state ($15.00 added)<br>'; 
            }
            
            if ($insurance == 'no'){
                $insurance_charge = 0;
                echo 'Insurance option: No insurance chosen (no extra fee)<br>'; 
            } elseif ($insurance == 'yes') {
                $insurance_charge = 10;
                echo 'Insurance option: Insurance chosen ($10.00 added)<br>'; 
            }

            $total = $weight_charge + $destination_charge + $insurance_charge;

            echo 'Total price of order: $' . $total;

            // End of footer style div
            echo '</div>'; 
        }
        ?>

	
	</div> <!-- ends div#formdiv -->
		
</div> <!-- ends div#contentwrap -->

</body>
</html>