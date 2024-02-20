<html>
<head>
    <title>Games Won</title>
    <style type="text/css"> 
        .winning-team {
            color: green;
        }
        .losing-teams {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        // Define team names
        $team1Name = "Knicks";
        $team2Name = "Celtics";
        $team3Name = "Warriors";
        
        // Generate random # of wins for each team
        $team1Wins = rand(1, 162);
        $team2Wins = rand(1, 162);
        $team3Wins = rand(1, 162);
        
        // Determine the team with the most wins
        $teamleader = max($team1Wins, $team2Wins, $team3Wins);
        
        // Determine and print the team names and their win amounts with string concatenation
        if ($team1Wins == $teamleader) {
            echo '<div class="winning-team">' . $team1Name . ': ' . $team1Wins . ' wins</div>';
        } else {
            echo '<div class="losing-teams">' . $team1Name . ': ' . $team1Wins . ' wins</div>';
        }
        
        if ($team2Wins == $teamleader) {
            echo '<div class="winning-team">' . $team2Name . ': ' . $team2Wins . ' wins</div>';
        } else {
            echo '<div class="losing-teams">' . $team2Name . ': ' . $team2Wins . ' wins</div>';
        }
        
        if ($team3Wins == $teamleader) {
            echo '<div class="winning-team">' . $team3Name . ': ' . $team3Wins . ' wins</div>';
        } else {
            echo '<div class="losing-teams">' . $team3Name . ': ' . $team3Wins . ' wins</div>';
        }
    ?>
</body>
</html>
