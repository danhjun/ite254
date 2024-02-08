<html>
    <head>
        <title></title>
        <style type="text/css">
            #above100 {
                color: blue;
            }
            #below100 {
                color: red;
            }
        </style>
    </head>
    <body>
        <div>Welcome to my first PHP file</div>
        <?php
echo "<div>Hello World </div>\n";
echo "<div>Hello Class </div>\n";

// create a few variables, do a calculation
$num1 = 67;
$num2 = 95;
$sum  = $num1 + $num2;
echo "<div>The value of num1 is " . $num1 . "</div>\n";
echo "<div>The value of num2 is " . $num2 . "</div>\n";
echo "<div>The sum of num1 and num2 is " . $sum . "</div>\n";
?>

<div> Out of PHP back in html </div>

<?php
echo "<div>Back in PHP</div>\n";

if ( $sum > 100) {

    echo "<div id='above100'>The sum is greater than 100</div>\n";
}
else if ( $sum < 100) {

    echo "<div id='below100'>The sum is less than 100</div>\n";
}
else {


}





?>
  </body>
</html>