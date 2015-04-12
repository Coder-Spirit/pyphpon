<?php


use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Class_Get_Test extends PyPhpOnTestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function testGetClassNotCallablePublicProperty($a)
    {
        $this->assertEquals($a->public_property, 1);
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testGetClassNotCallablePrivateProperty($a)
    {
        $a->private_property;
    }

    /**
     * @dataProvider objectsProvider
     */
    public function testGetClassCallablePublicProperty($a)
    {
        $f = $a->publicFunction;
        $this->assertTrue(is_callable($f));

        $fResult = $f(35);
        $this->assertArrayHasKey("public", $fResult);
        $this->assertArrayHasKey("arg", $fResult);
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testGetClassCallablePrivateProperty($a)
    {
        $a->privateFunction;
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testGetPropertyThatDoesNotExist($a)
    {
        $a->property_that_does_not_exist;
    }
}