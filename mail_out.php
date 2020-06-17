<?php 
    require "functions.php";

    function send_mail($body, $email, $name){
        $headers  = "From: Dine Bot <alert@ijtaba.me.uk>\r\n";
        $headers .= "Reply-To: $name <$email>\r\n";
        $to       = "ijtabahussain@live.com";
        $subject  = "$name wants to meet up";
        mail($to, $subject, $body, $headers);        
    }

    function verify_captcha(){
        $ip      = $_SERVER["REMOTE_ADDR"];
        $url     = 'https://www.google.com/recaptcha/api/siteverify';
        $data    = array('secret' => GOOGLE_RECAPTCHA , 'response' => $_GET['g-recaptcha-response'], 'remoteip' => $ip);
        $options = array(
                    'http' => array(
                                     'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                     'method'  => 'POST',
                                     'content' => http_build_query($data),
                                    )
                         );
        $context  = stream_context_create($options);
        $result = json_decode(file_get_contents($url, false, $context));
        return $result->success;
    }

?>
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
            <?php
                    $who         = name();
                    $where       = place();
                    $when        = when();
                    $duration    = duration();
                    $email       = email();
                    $why         = reason();

                    $mail_text = "Who:   $who\r\n" .
                                 "Where: $where\r\n" .
                                 "When:  $when\r\n" .
                                 "Duration: $duration hour(s) \r\n" .
                                 "Email: $email\r\n" .
                                 "Reason: $why\r\n";

                    if(verify_captcha()){
                        send_mail($mail_text,$email,$who);
                        echo "I've been notified, maybe we will meet up.";
                    }
                    else {
                        echo "Captcha failed, I don't dine with robots";
                    }

            ?>
        </div>
    </body>
</html>
