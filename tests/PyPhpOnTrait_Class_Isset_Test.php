<?php


use Litipk\PyPhpOn\Tests\PyPhpOnAsTraitPlusInheritance as PyPhpOnAsTraitPlusInheritance;


date_default_timezone_set('UTC');


class PyPhpOnTrait_Class_Isset_Test extends \PHPUnit_Framework_TestCase
{
    public function testGetClassNotCallablePrivateProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertFalse(isset($a->private_property));
    }

    public function testGetClassCallablePrivateProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertFalse(isset($a->privateFunction));
    }
    
    public function testGetPropertyThatDoesNotExist()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertFalse(isset($a->property_that_does_not_exist));
    }

    public function testGetPropertyExistentByMagic()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertTrue(isset($a->existentMagicProperty));
    }
}