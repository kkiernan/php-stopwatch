<?php

namespace Kiernan;

use Exception;

class Timer
{
    /**
     * @var float
     */
    protected static $start;

    /**
     * @var float
     */
    protected static $stop;

    /**
     * @var array
     */
    protected static $laps = [];

    /**
     * Set the start timestamp.
     *
     * @return float
     */
    public static function start()
    {
        return self::$start = microtime(true);
    }

    /**
     * Set the stop timestamp.
     *
     * @return float
     */
    public static function stop()
    {
        self::$stop = microtime(true);

        return self::totalTime();
    }

    /**
     * Create a new split and save it to the laps array.
     *
     * @return Kiernan\Split
     */
    public static function split()
    {
        $now = microtime(true);

        return self::$laps[] = new Split($now, self::lapTime($now), self::totalTime());
    }

    /**
     * Get the laps.
     *
     * @return array
     */
    public static function laps()
    {
        return self::$laps;
    }

    /**
     * Get the time elapsed since the start.
     *
     * @return float
     */
    protected static function totalTime()
    {
        if (!isset(self::$start)) {
            throw new Exception('Must start timer before requesting the total elapsed time');
        }

        if (!isset(self::$stop)) {
            return microtime(true) - self::$start;
        }

        return self::$stop - self::$start;
    }

    /**
     * Get the time elapsed since the last split.
     *
     * @param float $timestamp The current microtime as a float
     *
     * @return float
     */
    protected static function lapTime($timestamp)
    {
        if (!count(self::$laps)) {
            return $timestamp - self::$start;
        }

        $lastLap = end(self::$laps);

        return $timestamp - $lastLap->timestamp();
    }
}
