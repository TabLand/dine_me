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
            <form method="get" action="why.php">
                Right <?php echo name(); ?>, where are we meeting up?<br/>
                <input style="width:500px" type="text" name="where" placeholder="The Golden Chippy, 62 Greenwich High Road, London SE10 8LF"><br/>
                <input type="hidden" name="who" value="<?php echo name(); ?>"/>
                <input class="submit" type="submit" value="Next">
            </form>
        </div>
    </body>
</html>
