<?php

$countChar = 0;
$line_1 = "";
$line_2 = "";
$line_3 = "";

$words = preg_split("/[ ]/", $text);

foreach ($words as $key => $word) {

    $countChar += strlen($word . ' ');

    if ($countChar >= 0 && $countChar <= 40) {
        $line_1 .= $word . ' ';
    } else {
        $line_1 .= '';
    }

    if ($countChar >= 40 && $countChar <= 80) {
        $line_2 .= $word . ' ';

        if (!(strlen(trim($line_2)) >= 4 && strlen(trim($line_2)) <= 40)) {
            $line_1 = rtrim(trim($line_1), trim($words[$key - 1]));
            $line_2 = rtrim(trim($line_2), trim($word));
            $line_2 .= $words[$key - 1] . ' ' . $word;
        }
    } else {
        $line_2 .= '';
    }

    if ($countChar >= 80 && $countChar <= 120) {
        $line_3 .= $word . ' ';

        if (!(strlen(trim($line_3)) >= 4 && strlen(trim($line_3)) <= 40)) {
            $line_2 = rtrim(trim($line_2), trim($words[$key - 1]));
            $line_3 = rtrim(trim($line_3), trim($word));
            $line_3 .= $words[$key - 1] . ' ' . $word;
        }
    } else {
        $line_3 .= '';
    }
}


echo '<pre>', print_r($line_1 . "\r\n" . $line_2 . "\r\n" . $line_3, 1), '</pre>';