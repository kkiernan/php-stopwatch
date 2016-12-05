<?php

namespace spec\Kiernan;

use PhpSpec\ObjectBehavior;

class TimerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Kiernan\Timer');
    }
}
