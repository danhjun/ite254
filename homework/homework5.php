<! –– link to stargate ––>
<! –– https://stargate.ncc.edu/~jun0785/homework5.php ––>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Expense Report</title>

    <style type="text/css">

body {
	background-color: #454F8C;
	font-family: arial;
	color: #454F8C;
}

#contentwrap {
	background: #F4F5E7;
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 600px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	text-align: center;
}

#heading {
	font-size: 2.2em;
	border-bottom: 6px #484452 double;
	padding: 10px 0px 10px 0px;
}

.formtext {
	text-align: center;
	margin-top: 20px;
	font-weight: bold;
}

input[type=text] {
	border: 2px black solid;
	background-color: yellow;
	padding: 3px;
}

input[type=submit] {
	border: 2px black solid;
	background-color: darkblue;
	color: white;
	padding: 5px;
	border-radius: 20px;
	font-size: 1em;
}

</style>
</head>
<body>
    <div id="contentwrap">
        <div id="heading">
            Calculate Your Monthly Expenses
        </div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="formtext">Enter total monthly budget</div>
            <input type="text" id="totalbudget" name="budget" size="40" />

            <div class="formtext">Enter your monthly food expenses</div>
            <input type="text" id="foodexpense" name="food" size="40" />

            <div class="formtext">Enter your monthly gas expenses</div>
            <input type="text" id="gasexpense" name="gas" size="40" />

            <div class="formtext">Enter your monthly entertainment expenses</div>
            <input type="text" id="funexpense" name="entertainment" size="40" />

            <div style="margin-top:10px;">
                <input type="submit" value="Calculate Total Expenses">
            </div>
        </form>

        <?php
        if (isset($_POST['budget'])) {
            $budget = $_POST['budget'];
            $food = $_POST['food'];
            $gas = $_POST['gas'];
            $entertainment = $_POST['entertainment'];

            $totalExpenses = $food + $gas + $entertainment;
            $remaining = $budget - $totalExpenses;

            echo "<div style='margin-top: 10px; color: darkblue; font-weight: bold;'>Total expense is $" . number_format($totalExpenses, 2) . "</div>";
            echo "<div style='color: darkblue; font-weight: bold;'>Total budget remaining is $" . number_format($remaining, 2) . "</div>";

            if ($remaining > 0) {
                echo "<div style='color: green; font-weight: bold;'>Great job! You are under budget!!!</div>";
            } elseif ($remaining < 0) {
                echo "<div style='color: red; font-weight: bold;'>You are over budget. Time to save more!!!</div>";
            } else {
                echo "<div style='color: darkblue; font-weight: bold;'>You are exactly on budget!!!</div>";
            }
        }
        ?>
    </div>
</body>
</html>
