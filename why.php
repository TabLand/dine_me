<?php require "functions.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="dine.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	</head>
	<body id="plate">
        <div id="text">
            <form method="get" action="when.php">
                What? Reservations at <?php echo place(); ?>?? How did a dimwit like you swing that?<br/>
                <input style="width:500px" type="text" name="why" placeholder="I know the Maitre d'"><br/>
                <input type="hidden" name="who" value="<?php echo name(); ?>"/>
                <input type="hidden" name="where" value="<?php echo place(); ?>"/>
                <input class="submit" type="submit" value="Next">
            </form>
        </div>
    </body>
</html>
