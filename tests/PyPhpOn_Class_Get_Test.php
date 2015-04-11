<?php


use Litipk\PyPhpOn\Tests\ExtendedPyPhpOn as ExtendedPyPhpOn;
use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Class_Get_Test extends PyPhpOnTestCase
{
    public function testGetClassNotCallablePublicProperty()
    {
        $a = new ExtendedPyPhpOn();
        $this->assertEquals($a->public_property, 1);
    }

    /**
     * @expectedException \ErrorException
     */
    public function testGetClassNotCallablePrivateProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->private_property;
    }

    public function testGetClassCallablePublicProperty()
    {
        $a = new ExtendedPyPhpOn();

        $f = $a->publicFunction;
        $this->assertTrue(is_callable($f));

        $fResult = $f(35);
        $this->assertArrayHasKey("public", $fResult);
        $this->assertArrayHasKey("arg", $fResult);
    }

    /**
     * @expectedException \ErrorException
     */
    public function testGetClassCallablePrivateProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->privateFunction;
    }

    /**
     * @expectedException \ErrorException
     */
    public function testGetPropertyThatDoesNotExist()
    {
        $a = new ExtendedPyPhpOn();
        $a->property_that_does_not_exist;
    }
}