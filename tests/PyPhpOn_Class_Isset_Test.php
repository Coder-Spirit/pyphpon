<?php


use Litipk\PyPhpOn\Tests\PyPhpOnTestCase as PyPhpOnTestCase;


date_default_timezone_set('UTC');


class PyPhpOn_Class_Isset_Test extends PyPhpOnTestCase
{
    /**
     * @dataProvider objectsProvider
     */
    public function testIssetClassNotCallablePublicProperty($a)
    {
        $this->assertTrue(isset($a->public_property));
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     */
    public function testIssetClassNotCallablePrivateProperty($a)
    {
        $this->assertFalse(isset($a->private_property));
    }

    /**
     * @dataProvider objectsProvider
     */
    public function testIssetClassCallablePublicProperty($a)
    {
        $this->assertTrue(isset($a->publicFunction));
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     */
    public function testIssetClassCallablePrivateProperty($a)
    {
        $this->assertFalse(isset($a->privateFunction));
    }

    /**
     * @dataProvider objectsWithInheritanceProvider
     */
    public function testIssetPropertyThatDoesNotExist($a)
    {
        $this->assertFalse(isset($a->property_that_does_not_exist));
    }
}