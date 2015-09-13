<?php require "functions.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="dine.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    </head>
	<body id="plate">
        <div id="text">
            <form method="get" action="email.php">
                So you would like to meet up at <br><?php echo when();?> hours <br> for 
                <?php 
                    echo duration() . plural(duration()," hour");
                ?>.<br/>
                Did I get that right?<br/>
                <input type="hidden" name="duration" value="<?php echo duration(); ?>"/>
                <input type="hidden" name="when" value="<?php echo when(); ?>"/>
                <input type="hidden" name="why" value="<?php echo reason(); ?>"/>
                <input type="hidden" name="who" value="<?php echo name(); ?>"/>
                <input type="hidden" name="where" value="<?php echo place(); ?>"/>
                <input class="submit" type="submit" value="Yes">
                <a href="#" onclick="history.go(-1)">Not quite</a>
            </form>
        </div>
    </body>
</html>
