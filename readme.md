# PHP Stopwatch

A simple stopwatch in PHP.

[![StyleCI](https://styleci.io/repos/75639006/shield?branch=master)](https://styleci.io/repos/75639006)

## Contents

<!-- MarkdownTOC autolink="true" -->

- [Installation](#installation)
- [Available Methods](#available-methods)
- [Basic Usage](#basic-usage)
- [Laps](#laps)

<!-- /MarkdownTOC -->


## Installation

Install the package using composer.

```sh
composer require kkiernan/php-stopwatch
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

```php
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
