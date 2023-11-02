<?php

$seconds = $_GET['seconds'];
    $seconds = $seconds /1000000;
    $seconds = $seconds * 1000000;
$minutes = $_GET['minutes'];
    $minutes = $minutes /1000000;
    $minutes = $minutes * 1000000;
$hours = $_GET['hours'];
    $hours = $hours /1000000;
    $hours = $hours * 1000000;
$time = $hours . ":" . $minutes . ":" . $seconds;
$pontuation = $_GET['pontuation'];
    $pontuation = $pontuation /1000000;
    $pontuation = $pontuation * 1000000;

echo "time: " . $time . "<br />";
echo "pontuation: " . $pontuation . "<br />";
    