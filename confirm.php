<?php require "functions.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="dine.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
	<body id="plate">
        <div id="text">
            <form method="get" action="confirm.php">
            <?php
                    $who      = who();
                    $where    = where();
                    $when     = when();
                    $duration = duration();
                    $hours    = hours();
                    $email    = email();
                    if(free()) $free_or_busy = "free";
                    else       $free_or_busy = "busy";
                    if(is_valid_email()) {
                        $a_valid_email = "valid";
                        $may_or_may_not = "may";
                    }
                    else {
                        $a_valid_email = "invalid";
                        $may_or_may_not = "may not";
                    }
                    echo "So your name is $who.". 
                         "You want to meet at $where on $when for $duration $hours because $why."
                         "I think I am $free_or_busy at that time." 
                         "You can be contacted at $email," 
                         "which to me looks to be $a_valid_email therefore I $may_or_may_not try to respond.";
                ?>
                <input type="hidden" name="email" value="<?php echo email();?>"/>
                <input type="hidden" name="duration" value="<?php echo duration(); ?>"/>
                <input type="hidden" name="when" value="<?php echo when(); ?>"/>
                <input type="hidden" name="why" value="<?php echo reason(); ?>"/>
                <input type="hidden" name="who" value="<?php echo name(); ?>"/>
                <input type="hidden" name="where" value="<?php echo place(); ?>"/>
                <input class="submit" type="submit" value="Submit">
                <div class="g-recaptcha" data-sitekey="6LcXawwTAAAAAFAxIAo0YQc3HiluzzAyxX9MI66D"></div>
            </form>
        </div>
    </body>
</html>
