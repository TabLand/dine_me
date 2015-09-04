<?php 
    function name(){
        if(isset($_GET["who"])) $name = $_GET["who"];
        else $name = "Paul Allen";
        preg_match('/[A-Za-z ]+/', $name, $matches);

        if(count($matches) > 0) return $matches[0];
        else return "Paul Allen";   
    }

    function place(){
        if(isset($_GET["where"])) $place = $_GET["where"];
        else $place = "Dorsia";
        preg_match('/[A-Za-z0-9, ]+/', $place, $matches);

        if(count($matches) > 0) return $matches[0];
        else return "Dorsia";
    }

    function reason(){
        if(isset($_GET["why"])) $reason = $_GET["why"];
        else $reason = "you know the maitre d'";
        preg_match('/[A-Za-z\.\' ]+/', $reason, $matches);

        if(count($matches) > 0) return $matches[0];
        else return "you know the maitre d'";   
    }

    function sanitize_when(){
        if(isset($_GET["datetime"])) $when = $_GET["datetime"];
        else $when = "today 3pm";
        preg_match('/[A-Za-z\-0-9\ ]+/', $when, $matches);
        if(count($matches) > 0) return $matches[0];
        else return "today 3pm";
    }

    function duration(){
        if(isset($_GET["duration"])) $duration = $_GET["duration"];
        else $duration = "1";
        preg_match('/[0-9]*\.?[0-9]+/', $duration, $matches);
        if(count($matches) > 0) return floatval($matches[0]);
        else return 1;
    }
    
    function hours(){
         $hours = duration();
         if($hours > 1) return " hours";
         else return " hour";
    }

    function when(){
        $when = sanitize_when();

        if (($timestamp = strtotime("$when")) === false) {
                return "a non-sensical time";
        } else {
                return date('l dS \o\f F Y h:i A', $timestamp);
        }
    }

    function email(){
        if(isset($_GET["email"])) $email = $_GET["email"];
        else $email = "";
        $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $sanitized_email;
    }

    function is_valid_email(){
        $email = email();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    function free(){
    
    }
?>
