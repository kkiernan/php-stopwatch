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
composer install kkiernan/php-timer
```

## Methods

- `Timer::start()`
- `Timer::stop()`
- `Timer::split()`
- `Timer::laps()`

## Examples

### Basic Usage

```php
use Kiernan\Timer;

require dirname(__DIR__). '/vendor/autoload.php';

Timer::start();

usleep(1500000);

$seconds = Timer::stop();

echo "Script executed in $seconds seconds" . PHP_EOL;
```

```
Script executed in 1.499892950058 seconds.
```

### Recording Laps

```php
use Kiernan\Timer;

require dirname(__DIR__). '/vendor/autoload.php';

Timer::start();

sleep(1);

Timer::split();

sleep(2);

Timer::split();

sleep(1);

Timer::split();

foreach (Timer::laps() as $lap) {
    echo "Lap Time: {$lap->lapTime()}" . PHP_EOL;
    echo "Total Time: {$lap->totalTime()}" . PHP_EOL;
    echo "Timestamp: {$lap->timestamp()}" . PHP_EOL;
}
```

```
Lap Time: 1.000440120697
Total Time: 1.0005810260773
Timestamp: 1480948233.6525
Lap Time: 2.0053000450134
Total Time: 3.0057640075684
Timestamp: 1480948235.6578
Lap Time: 1.0015799999237
Total Time: 4.0073289871216
Timestamp: 1480948236.6594
```