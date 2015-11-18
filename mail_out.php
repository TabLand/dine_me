<?php 
    require "functions.php";
    require "mailer/class.phpmailer.php";
    require "mailer/class.smtp.php";

    function send_mail($body, $email, $name){
        $mail = new PHPMailer;

        $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAILHOST;
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASSWORD;                           // SMTP password
        $mail->SMTPSecure = ENCRYPTION;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = PORT;                                    // TCP port to connect to

        $mail->setFrom('hi@ijtaba.me.uk', 'Dine Bot');
        $mail->addAddress('ijtabahussain@live.com', 'Ijtaba Hussain');     // Add a recipient
        $mail->addReplyTo($email, 'Information');
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "$name wants to meet up";
        $mail->Body    = $body;

        if(!$mail->send()) {
            error_log('Mailer Error: ' . $mail->ErrorInfo);
            return 'Message could not be sent.';
        } else {
            return 'Message has been sent';
        }
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
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
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
                                 "Duration: $duration\r\n" .
                                 "Email: $email\r\n" .
                                 "Reason: $why\r\n";

//                    if(verify_captcha()){
                        send_mail($mail_text,$email,$who);
                        echo "Mail sent, now you must wait for me to respond.";
//                    }

            ?>
        </div>
    </body>
</html>
