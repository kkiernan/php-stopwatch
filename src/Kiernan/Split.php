<?php

namespace Kiernan;

class Split
{
    /**
     * The unix timestamp the lap was created.
     *
     * @var float
     */
    protected $timestamp;

    /**
     * The lap time seconds.
     *
     * @var float
     */
    protected $lapTime;

    /**
     * The total time elapsed since start for this lap.
     *
     * @var float
     */
    protected $totalTime;

    /**
     * Create a new split instance.
     *
     * @param float $timestamp
     * @param float $lapTime
     * @param float $totalTime
     */
    public function __construct($timestamp, $lapTime, $totalTime)
    {
        $this->timestamp = $timestamp;
        $this->lapTime = $lapTime;
        $this->totalTime = $totalTime;
    }

    /**
     * Get the timestamp.
     *
     * @return float
     */
    public function timestamp()
    {
        return $this->timestamp;
    }

    /**
     * Get the lap time.
     *
     * @return float
     */
    public function lapTime()
    {
        return $this->lapTime;
    }

    /**
     * Get the total time.
     *
     * @return float
     */
    public function totalTime()
    {
        return $this->totalTime;
    }

    /**
     * Gets the time the lap was created in a pretty format.
     *
     * @param string $format
     *
     * @return string
     */
    public function prettyTime($format = 'm/d/Y H:i:s')
    {
        return date($format, $this->timestamp);
    }
}
