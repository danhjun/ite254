<html>
<head>
    <title>Numbers 1 to 1000</title>
    <style type="text/css">
        .even {
            color: blue;
        }
        .odd {
            color: red;
        }
    </style>
</head>
<body>
    <div>Homework 3</div>
    <?php
    for ($num = 1; $num <= 1000; $num++) {
        if ($num % 2 == 0) { // Check if the number is even
            echo "<div class='even'>Number: $num</div>\n";
        } else { // The number is odd
            echo "<div class='odd'>Number: $num</div>\n";
        }
    }
    ?>
</body>
</html>
