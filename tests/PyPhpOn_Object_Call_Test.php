<?php


use Litipk\PyPhpOn\Tests\ExtendedPyPhpOn as ExtendedPyPhpOn;
use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Object_Call_Test extends PyPhpOnTestCase
{
    /**
     * @expectedException \ErrorException
     */
    public function testCallObjectAttachedNotCallableProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->attached_property = 34;

        $a->attached_property();
    }

    public function testGetObjectAttachedCallableProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->square = function($x) { return $x*$x; };

        $this->assertEquals(25, $a->square(5));
    }
}