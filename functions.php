<?php
    include "google_calendar_key.php";
    //todo - migrate to hi@ijtaba.me.uk
    define("CALENDAR" ,"hi@ijtaba.me.uk");

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
        if(isset($_GET["when"])) $when = $_GET["when"];
        else $when = "tomorrow 1pm";
        preg_match('/[A-Za-z\-0-9\ ]+/', $when, $matches);
        if(count($matches) > 0) return $matches[0];
        else return "tomorrow 1pm";
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
                return date('l d F Y Hi', $timestamp);
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

    function busy(){
        $when  = when();
        
        if($when == "a non-sensical time") {
            return -1;
        }

        $start = strtotime($when);
        $hours = duration();
        $end   = $start + ($hours * 3600);

        $start_datetime = date(DateTime::RFC3339, $start);
        $end_datetime   = date(DateTime::RFC3339, $end);

        $free_busy = [];
        $free_busy["timeMin"] = $start_datetime;
        $free_busy["timeMax"] = $end_datetime;
        $free_busy["items"] = array(array("id" => CALENDAR));

        $key = KEY;
        $ch = curl_init("https://www.googleapis.com/calendar/v3/freeBusy?key=$key");

        curl_setopt_array($ch, array(
                                        CURLOPT_POST => TRUE,
                                        CURLOPT_RETURNTRANSFER => TRUE,
                                        CURLOPT_HTTPHEADER => array(
                                                                     'Authorization: '.$authToken,
                                                                     'Content-Type: application/json'
                                                                   ),
                                        CURLOPT_POSTFIELDS => json_encode($free_busy)
                                      )
                          );

        $response = curl_exec($ch);
        
        if($response === false){
            //be ambigous on error
            return -1;
        }
        
        $responseData = json_decode($response, TRUE);
        $busy = $responseData["calendars"][CALENDAR]["busy"];
    
        return count($busy);
    }

    function subject_swap($reason){
        $swap = array();
    
        $swap["yourself"] = "myself";
        $swap["myself"]   = "yourself";
        $swap["you've"]   = "I have";
        $swap["yours"]    = "mine";
        $swap["you'd"]    = "I would or I had";
        $swap["mine"]     = "yours";
        $swap["your"]     = "my";
        $swap["i've"]     = "you have";
        $swap["i'd"]      = "you would or you had";
        $swap["you"]      = "I";
        $swap["me"]       = "you";
        $swap["my"]       = "your";
        $swap["i"]        = "you";

        //do a case insensitive regex search and replace on word boundaries,
        //replacing the keys with their md5s until the key pass is finished
        //then replacing the md5 hashes with the values
    }

    function reason_with_subjects_swapped(){
    
    }
?>
