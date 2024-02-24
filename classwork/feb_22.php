<html>
<head>
<title></title>

<style type="text/css">

body {

	font-family: arial;
	color: #454F8C;
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/deeppurple.jpg");
}

#contentwrap {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/bkg10.jpg");
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 600px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	text-align: center;
}

#heading {
	font-size: 2em;
	border-bottom: 6px #484452 double;
	padding: 10px 0px 10px 0px;
}

.formfield {
	border: 2px black solid;
	padding: 3px;
	font-size: 1.1em;	
}

.formtext {
	text-align: center;
	margin-top: 20px;
	font-size: 1.05em;
}

#username {
	margin-top: 5px;
	margin-bottom: 20px;
}

</style>

</head>
<body>

<div id="contentwrap">

	<div id="heading">
		Send text message via PHP mail function
	</div>
	
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
        <div class="formtext">Enter phone number</div>
        <div><input type=text class="formfield" name="phone"></div>

        <div class="formtext">Select phone carrier</div>
        <div>
            <select class="formfield" name="carrier">
                <option value="txt.att.net">AT&T</option>
                <option value="tmomail.net">T-Mobile</option>
                <option value="vtext.com">Verizon</option>
                <option value="messaging.sprintpcs.com">Sprint</option>
            </select>
        </div>
        <div class="formtext">Enter message</div>
        <div>
            <textarea cols="40" rows="6" class="formfield" name="message"></textarea>
        </div>

        <div style="margin-top:12px;">
            <input type="submit" value="Send Text">
        </div>
</form>

<?php


if ( isset($_POST['phone']) ) {
    $phone = $_POST['phone'];
    $carrier = $_POST['carrier'];
    $message = $_POST['message'];
    $to = $phone . "@" . $carrier;
    mail($to, "", $message);
    echo "<div style='margin-top:20px;'>Message sent to $phone</div>";
}

?>
</div> <!-- ends div#contentwrap -->

</body>
</html>




