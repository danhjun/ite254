<html>
<head>
<title></title>

<style type="text/css">

body {
	background: #CCCC99;
	font-family: arial;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/stuff.jpg");
}

#pagewrap {
	width: 700px;
	margin: 40px auto 0px auto;
}

#header {
	text-align: center;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 1.45em;
	background: blue;
	padding: 20px 0px 20px 0px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
}

#content {
	background: #FFFFFF;
	border: 2px #003366 solid;
	padding: 30px;
	height: 350px;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/anime_cpu.gif");
	background-repeat: no-repeat;
	background-position: 90% 40%;
}

.formtext {
	margin-top: 15px;
}

.fieldstyle {
	background: #CCCC99;
	width: 300px;
	font-size: 1.1em;
	padding: 5px;
	border: 2px black solid;
}

#footer {
	background: blue;
	color: #FFFFFF;
	height: 65px;
	border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
}

#button {
	background: #003366;
	color: #FFFFFF;
	padding: 5px 0px 5px 0px;
	width: 250px;
	border: 3px #CCCC99 solid;
	border-radius: 25px;
	cursor: pointer;
	font-size: 1.1em;
}

#button:hover {
	background: #CCCCCC;
	color: #003366;
	border: 3px #003366 solid;
}
</style>

</head>
<body>

<div id="pagewrap">

	<div id="header">
		Calculate Employee Pay
	</div>

	<div id="content">
	
		<div id="formdiv">

            <form method="post" action="feb_20.php">
                <div class="formtext">Enter Employee Name</div>
                <div><input type="text" class="fieldstyle" name="empname"></div> 
                
                <div class="formtext">Enter Employee Hours Worked</div>
                <div><input type="text" class="fieldstyle" name="hoursworked"></div>
		
                <div class="formtext">Enter Employee Pay Rate</div>
                <div><input type="text" class="fieldstyle" name="payrate"></div>

                <div class="formtext">
                    <input type="submit" value="Calculate Pay" id="button">
                </div>

            </form>

            <?php
            //here is the PHP code to process the form
            // this code will be skipped at initial page load
            // but will be run after button click on second page loading
            if (isset($_POST['empname'])) {
                $empname = $_POST['empname'];
                $hoursworked = $_POST['hoursworked'];
                $payrate = $_POST['payrate'];
                $grosspay = $hoursworked * $payrate;
                echo "<div>Employee Name: $empname</div>";
                echo "<div>Hours Worked: $hoursworked</div>";
                echo "<div>Pay Rate: $payrate</div>";
                echo "<div>Gross Pay: $grosspay</div>";
            }
            ?>
		</div> <!-- ends div#formdiv -->
				
	</div> <!-- ends div#content -->
	
	<div id="footer"></div>

</div>

</body>
</html>






