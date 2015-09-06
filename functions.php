<?php 
    function echo_name(){
        if(isset($_GET["who"])) $name = $_GET["who"];
        else $name = "Paul Allen";
        preg_match('/[A-Za-z ]+/', $name, $matches);

        if(count($matches) > 0) echo $matches[0];
        else echo "Paul Allen";   
    }

    function echo_place(){
        if(isset($_GET["where"])) $place = $_GET["where"];
        else $place = "Dorsia";
        preg_match('/[A-Za-z0-9, ]+/', $place, $matches);

        if(count($matches) > 0) echo $matches[0];
        else echo "Dorsia";   
    }

    function echo_reason(){
        if(isset($_GET["why"])) $reason = $_GET["why"];
        else $reason = "you know the maitre d'";
        preg_match('/[A-Za-z\.\' ]+/', $reason, $matches);

        if(count($matches) > 0) echo $matches[0];
        else echo "you know the maitre d'";   
    }
?>
