<?php

use Kiernan\Stopwatch;
use PHPUnit\Framework\TestCase;

class StopwatchTest extends TestCase
{
    /**
     * The stopwatch instance.
     *
     * @var \Kiernan\Stopwatch
     */
    protected $stopwatch;

    /**
     * Perform set up before each test.
     */
    public function setUp()
    {
        parent::setUp();

        $this->stopwatch = new Stopwatch();
    }

    /** @test */
    public function can_dynamically_access_protected_properties()
    {
        $this->assertNull($this->stopwatch->start);
        $this->assertNull($this->stopwatch->stop);
        $this->assertEquals([], $this->stopwatch->laps);
    }

    /** @test */
    public function it_tracks_the_start_time()
    {
        $this->assertNull($this->stopwatch->start);
        $this->stopwatch->start();
        $this->assertEquals((int) microtime(true), (int) $this->stopwatch->start);
    }

    /** @test */
    public function it_tracks_the_stop_time()
    {
        $this->assertNull($this->stopwatch->stop);
        $this->stopwatch->stop();
        $this->assertEquals((int) microtime(true), (int) $this->stopwatch->stop);
    }

    /** @test */
    public function it_tracks_the_total_time_elapsed()
    {
        $this->stopwatch->start();
        sleep(1);
        $this->assertEquals(1, (int) $this->stopwatch->elapsed());
        sleep(1);
        $this->assertEquals(2, (int) $this->stopwatch->elapsed());
        sleep(1);
        $this->assertEquals(3, (int) $this->stopwatch->elapsed());
        sleep(1);
        $this->stopwatch->stop();
        $this->assertEquals(4, (int) $this->stopwatch->elapsed());
    }

    /** @test */
    public function if_it_has_not_been_started_the_elapsed_time_is_zero()
    {
        $this->assertEquals(0, $this->stopwatch->elapsed());
    }

    /** @test */
    public function it_can_create_laps()
    {
        $this->assertEmpty($this->stopwatch->laps);

        $this->stopwatch->start();
        sleep(1);
        $this->stopwatch->lap();
        sleep(2);
        $this->stopwatch->lap();

        $this->assertCount(2, $this->stopwatch->laps);
        $this->assertEquals(1, (int) $this->stopwatch->laps[0]->duration);
        $this->assertEquals(2, (int) $this->stopwatch->laps[1]->duration);
    }

    /** @test */
    public function can_optionally_provide_a_name_for_laps()
    {
        $this->assertEmpty($this->stopwatch->laps);

        $this->stopwatch->start();
        sleep(1);
        $this->stopwatch->lap('Lap 1');
        sleep(2);
        $this->stopwatch->lap('Lap 2');

        $this->assertCount(2, $this->stopwatch->laps);
        $this->assertEquals('Lap 1', $this->stopwatch->laps[0]->name);
        $this->assertEquals('Lap 2', $this->stopwatch->laps[1]->name);
    }
}
