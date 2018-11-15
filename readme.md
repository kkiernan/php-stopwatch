# PHP Stopwatch

A simple stopwatch in PHP.

[![StyleCI](https://styleci.io/repos/75639006/shield?branch=master)](https://styleci.io/repos/75639006)

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Installation](#installation)
- [Methods](#methods)
- [Examples](#examples)
  - [Basic Usage](#basic-usage)
  - [Recording Laps](#recording-laps)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Installation

Install the package using composer.

```
composer require kkiernan/php-timer
```

## Available Methods

- `start()`
- `stop()`
- `lap()`
- `elapsed()`

## Basic Usage

```php
use Kiernan\Stopwatch;

require dirname(__DIR__). '/vendor/autoload.php';

$stopwatch = new Stopwatch();

$stopwatch->start();

usleep(1500000);

$stopwatch->stop();

echo "Script executed in {$stopwatch->elapsed()} seconds";
```

The above example prints the following output:

```
Script executed in 3.0002250671387 seconds
```

## Laps

```php
use Kiernan\Stopwatch;

require dirname(__DIR__). '/vendor/autoload.php';

$stopwatch = new Stopwatch();

$stopwatch->start();
sleep(1);
$stopwatch->lap();
sleep(2);
$stopwatch->lap();
sleep(1);
$stopwatch->lap();
$stopwatch->stop();

print_r($stopwatch->laps);
```

The above example prints the following output:

```
Array
(
    [0] => Kiernan\Lap Object
        (
            [start:protected] => 1542305179.9815
            [duration:protected] => 1.0043249130249
            [name:protected] =>
        )

    [1] => Kiernan\Lap Object
        (
            [start:protected] => 1542305181.9823
            [duration:protected] => 2.0006990432739
            [name:protected] =>
        )

    [2] => Kiernan\Lap Object
        (
            [start:protected] => 1542305182.9823
            [duration:protected] => 1.0000500679016
            [name:protected] =>
        )

)
```
