<?php

require 'vendor/autoload.php';
use App\FloorCleaning;

$arg = getopt(null, ["area:", "floor:"]);
try {
    $robot = new FloorCleaning($arg['floor'], (Integer)$arg['area']);
    $robot->setCleaningInstance();
    $robot->startCleaning();
} catch (\ErrorException $e) {
    echo $e->getMessage();
}


?>
