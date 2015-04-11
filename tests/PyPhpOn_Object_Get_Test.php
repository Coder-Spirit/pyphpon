<?php


use Litipk\PyPhpOn\Tests\ExtendedPyPhpOn as ExtendedPyPhpOn;
use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Object_Get_Test extends PyPhpOnTestCase
{
    public function testGetObjectAttachedNotCallableProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->attached_property = 34;
        $this->assertEquals($a->attached_property, 34);
    }

    public function testGetObjectAttachedCallableProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->square = function($x) { return $x*$x; };

        $square_function = $a->square;
        $this->assertTrue(is_callable($square_function));
        $this->assertEquals(25, $square_function(5));
    }
}