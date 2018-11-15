<?php

namespace Kiernan;

class Lap extends Object implements \JsonSerializable
{
    /**
     * The start timestamp.
     *
     * @var float
     */
    protected $start;

    /**
     * The duration.
     *
     * @var float
     */
    protected $duration;

    /**
     * The name.
     *
     * @var float
     */
    protected $name;

    /**
     * Create a new instance.
     *
     * @param float  $duration
     * @param string $name
     *
     * @return void
     */
    public function __construct($duration, $name = '')
    {
        $this->start = microtime(true);
        $this->duration = $duration;
        $this->name = $name;
    }

    /**
     * Build the JSON representation.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'start'    => $this->start,
            'duration' => $this->duration,
            'name'     => $this->name,
        ];
    }
}
