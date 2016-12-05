<?php

use Kiernan\Timer;

require dirname(__DIR__).'/vendor/autoload.php';

Timer::start();

sleep(1);

Timer::split();

sleep(2);

Timer::split();

sleep(1);

Timer::split();

foreach (Timer::laps() as $lap) {
    echo "Lap Time: {$lap->lapTime()}".PHP_EOL;
    echo "Total Time: {$lap->totalTime()}".PHP_EOL;
    echo "Lap Created At: {$lap->timestamp()}".PHP_EOL;
    echo "Lap Created At: {$lap->prettyTime()}".PHP_EOL;
}
