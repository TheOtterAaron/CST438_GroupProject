<?php

    function assertEqual($param1, $param2, $label)
    {
        $result = ($param1 == $param2 ?
            "<span style=\"color:green;font-weight:bold\">pass</span>" :
            "<span style=\"color:red;font-weight:bold\">fail</span>");
        echo ("Test " . $label . ": " . $result . "<br/>");
    }

?>