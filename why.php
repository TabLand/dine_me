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
            <form method="get" action="when.php">
                What, <?php echo_place(); ?>, how did a dimwit like you swing that?<br/>
                <input style="width:500px" type="text" name="why" placeholder="I know the Maitre d'"><br/>
                <input type="hidden" name="who" value="<?php echo_name(); ?>"/>
                <input type="hidden" name="where" value="<?php echo_place(); ?>"/>
                <input class="submit" type="submit" value="Next">
            </form>
        </div>
    </body>
</html>