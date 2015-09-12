<?php require "functions.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="dine.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript">
            function update_hour(){
                var hours = $("input[name='duration']")[0].value;
                if(hours > 1) {
                    $("#hours").html("hours");
                }
                else {
                    $("#hours").html("hour");
                }
            }
        </script>
    </head>
	<body id="plate">
        <div id="text">
            <form method="get" action="validate_when.php">
                Hmm, not really believable. But, whatever. What date and time are we meeting up?<br/>
                <input type="text" name="when" placeholder="Date and time"><br/>
                For <input style="width: 100px;" type="number" name="duration" onchange="update_hour()" onkeyup="update_hour()" onkeydown="update_hour()" placeholder="1">
                <span id="hours">hour</span> 
                <input type="hidden" name="why" value="<?php echo reason(); ?>"/>
                <input type="hidden" name="who" value="<?php echo name(); ?>"/>
                <input type="hidden" name="where" value="<?php echo place(); ?>"/>
                <br/>
                <input class="submit" type="submit" value="Next">
            </form>
        </div>
    </body>
</html>
