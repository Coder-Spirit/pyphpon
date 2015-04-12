<?php


use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Class_Call_Test extends PyPhpOnTestCase
{
    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testCallClassNotCallablePublicProperty($a)
    {
        $a->public_property();
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testCallClassNotCallablePrivateProperty($a)
    {
        $a->private_property();
    }

    /**
     * @dataProvider objectsProvider
     */
    public function testCallClassCallablePublicProperty($a)
    {
        $fResult = $a->publicFunction(35);

        $this->assertArrayHasKey("public", $fResult);
        $this->assertArrayHasKey("arg", $fResult);
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testCallClassCallablePrivateProperty($a)
    {
        $a->privateFunction();
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     * @expectedException \ErrorException
     */
    public function testCallMethodThatDoesNotExist($a)
    {
        $a->method_that_does_not_exist();
    }
}