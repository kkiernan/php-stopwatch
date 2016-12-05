<?php

use Kiernan\Timer;

require dirname(__DIR__).'/vendor/autoload.php';

Timer::start();

usleep(1500000);

$seconds = Timer::stop();

echo "Script executed in $seconds seconds".PHP_EOL;
