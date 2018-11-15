<?php

namespace Kiernan;

class Object
{
    /**
     * Attempt to dynamically access protected properties.
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (isset($this->$property)) {
            return $this->$property;
        }
    }
}
