<?php


use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Object_Get_Test extends PyPhpOnTestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function testGetObjectAttachedNotCallableProperty($a)
    {
        $a->attached_property = 34;
        $this->assertEquals($a->attached_property, 34);
    }

    /**
     * @dataProvider objectsProvider
     */
    public function testGetObjectAttachedCallableProperty($a)
    {
        $a->square = function($x) { return $x*$x; };

        $square_function = $a->square;
        $this->assertTrue(is_callable($square_function));
        $this->assertEquals(25, $square_function(5));
    }
}