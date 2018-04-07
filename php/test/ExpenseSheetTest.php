<?php
    require_once("../DbCon.php");
    require_once("../Sheet.php");

    $sheet = new Sheet($dbCon, 1);
    echo "Sheet ID: 1<br/>";

    $result_getSheetId = $sheet->getSheetId() == 1 ? "pass" : "fail";
    echo ("Test getSheetId(): " . $result_getSheetId . "<br/>");

    $result_getName = $sheet->getName() == "city" ? "pass" : "fail";
    echo ("Test getName: " . $result_getName . "<br/>");

    $result_getDate = $sheet->getDateCreated() == "2018-04-02 00:00:00" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDateCreated . "<br/>");


    $sheet = new Sheet($dbCon, 4);
    echo "<br/>Sheet ID: 4<br/>";

    $result_getSheetId = $sheet->getSheetId() == 4 ? "pass" : "fail";
    echo ("Test getSheetId: " . $result_getSheetId . "<br/>");

    $result_getName = $sheet->getName() == "mira" ? "pass" : "fail";
    echo ("Test getName(): " . $result_getName . "<br/>");

    $result_getDate = $sheet->getDateCreated() == "2018-04-02 00:00:00" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDateCreated . "<br/>");

    $sheet = new Sheet($dbCon, 500);
    echo "<br/>Sheet ID: 500 (DNE)<br/>";

    $result_getSheetId = $sheet->getSheetId() == -1 ? "pass" : "fail";
    echo ("Sheet getSheetId(): " . $result_getSheetId . "<br/>");
?>