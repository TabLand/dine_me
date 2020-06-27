<?php
    require "functions.php";
    echo "<table>";
    $handle = fopen("free_text", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $_GET["why"] = $line;
            $reason = reason();
            $subject_swap = swap_subjects($reason);
            echo "<tr><td>$line</td><td>$subject_swap</td></tr>";
        }
        fclose($handle);
    } else {
        echo "<tr><td>error opening the file</td></tr>";
    } 
    echo "</table>";
?>
