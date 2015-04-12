<?php


use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Object_Call_Test extends PyPhpOnTestCase
{
    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testCallObjectAttachedNotCallableProperty($a)
    {
        $a->attached_property = 34;

        $a->attached_property();
    }

    /**
     * @dataProvider objectsProvider
     */
    public function testGetObjectAttachedCallableProperty($a)
    {
        $a->square = function($x) { return $x*$x; };

        $this->assertEquals(25, $a->square(5));
    }
}