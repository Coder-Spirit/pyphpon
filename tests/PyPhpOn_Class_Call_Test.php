<?php


use Litipk\PyPhpOn\Tests\ExtendedPyPhpOn as ExtendedPyPhpOn;
use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Class_Call_Test extends PyPhpOnTestCase
{
    /**
     * @expectedException \ErrorException
     */
    public function testCallClassNotCallablePublicProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->public_property();
    }

    /**
     * @expectedException \ErrorException
     */
    public function testCallClassNotCallablePrivateProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->private_property();
    }

    public function testCallClassCallablePublicProperty()
    {
        $a = new ExtendedPyPhpOn();

        $fResult = $a->publicFunction(35);

        $this->assertArrayHasKey("public", $fResult);
        $this->assertArrayHasKey("arg", $fResult);
    }

    /**
     * @expectedException \ErrorException
     */
    public function testCallClassCallablePrivateProperty()
    {
        $a = new ExtendedPyPhpOn();
        $a->privateFunction();
    }

    /**
     * @expectedException \ErrorException
     */
    public function testCallMethodThatDoesNotExist()
    {
        $a = new ExtendedPyPhpOn();
        $a->method_that_does_not_exist();
    }
}