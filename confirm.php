<?php require "functions.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="dine.css?v=0.1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
	<body id="plate">
        <div id="text">
            <form method="get" action="mail_out.php">
            <?php
                    $who         = name();
                    $where       = place();
                    $when        = when();
                    $duration    = duration();
                    $hours       = plural(duration(),"hour");
                    $email       = email();
                    $why         = swap_subjects(reason());
                    $busy        = busy();
                    $commitments = plural($busy, "commitment");
                    $schedule    = "<a href='../calendar'>schedule</a>";

                    if($busy == -1) $am_free_or_busy = "may be free at that time but am unable to confirm.";
                    elseif($busy) $am_free_or_busy = " am busy with $busy $commitments during that time.<br>
                                                       Feel free to check my $schedule.";
                    else $am_free_or_busy = "am free at that time.";

                    if(is_valid_email()) {
                        $a_valid_email = "valid";
                        $may_or_may_not = "may";
                    }
                    else {
                        $a_valid_email = "invalid";
                        $may_or_may_not = "will not";
                    }
                    echo "So your name is $who.<br>" . 
                         "You want to meet at $where on $when hours for $duration $hours because $why.<br>" .
                         "I think I $am_free_or_busy<br>" .
                         "You can be contacted at $email,<br>" .
                         "which to me looks to be $a_valid_email therefore I $may_or_may_not try to respond.";
                ?>
                <input type="hidden" name="email" value="<?php echo email();?>"/>
                <input type="hidden" name="duration" value="<?php echo duration(); ?>"/>
                <input type="hidden" name="when" value="<?php echo when(); ?>"/>
                <input type="hidden" name="why" value="<?php echo reason(); ?>"/>
                <input type="hidden" name="who" value="<?php echo name(); ?>"/>
                <input type="hidden" name="where" value="<?php echo place(); ?>"/>
                <input type="hidden" name="email" value="<?php echo email(); ?>"/>
                <input class="submit" type="submit" value="Submit">
                <div class="g-recaptcha" data-sitekey="6LcXawwTAAAAAFAxIAo0YQc3HiluzzAyxX9MI66D"></div>
            </form>
        </div>
    </body>
</html>
