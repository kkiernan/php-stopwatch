<?php

namespace Kiernan;

use Exception;

class Stopwatch extends Object implements \JsonSerializable
{
    /**
     * The start timestamp.
     *
     * @var float
     */
    protected $start;

    /**
     * The stop timestamp.
     *
     * @var float
     */
    protected $stop;

    /**
     * The laps.
     *
     * @var array
     */
    protected $laps = [];

    /**
     * Start the timer.
     *
     * @return void
     */
    public function start()
    {
        $this->start = microtime(true);
    }

    /**
     * Stop the timer.
     *
     * @return float The total elapsed time.
     */
    public function stop()
    {
        $this->stop = microtime(true);
    }

    /**
     * Create a new lap.
     *
     * @param string $name
     *
     * @throws Exception If the timer has not been started.
     *
     * @return void
     */
    public function lap($name = '')
    {
        if (!$this->start) {
            throw new Exception('The stopwatch must be started before creating a lap.');
        }

        $this->laps[] = new Lap($this->lapDuration(), $name);
    }

    /**
     * Get the laps.
     *
     * @return array
     */
    public function laps()
    {
        return $this->laps;
    }

    /**
     * Get the total time elapsed in seconds since the stopwatch was started.
     *
     * @return float
     */
    public function elapsed()
    {
        if (!isset($this->start)) {
            return 0;
        }

        if (!isset($this->stop)) {
            return microtime(true) - $this->start;
        }

        return $this->stop - $this->start;
    }

    /**
     * Get the duration of the current lap.
     *
     * @return float
     */
    protected function lapDuration()
    {
        if (empty($this->laps)) {
            return microtime(true) - $this->start;
        }

        $lastLap = end($this->laps);

        return microtime(true) - $lastLap->start;
    }

    /**
     * Build the JSON representation.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'start' => $this->start,
            'stop'  => $this->stop,
            'laps'  => $this->laps,
        ];
    }
}
