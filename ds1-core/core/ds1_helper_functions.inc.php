<?php

    // specialni vypis
    if (!function_exists("printr")) {
        function printr($val)
        {
            echo "<hr><pre>";
            echo "spešl helpr funkce";
            print_r($val);
            echo "</pre><hr>";
        }
    }

