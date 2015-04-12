<?php


use Litipk\PyPhpOn\Tests\PyPhpOnAsTraitPlusInheritance as PyPhpOnAsTraitPlusInheritance;


date_default_timezone_set('UTC');


class PyPhpOnTrait_Class_Get_Test extends \PHPUnit_Framework_TestCase
{
    public function testGetClassNotCallablePrivateProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to find the private_property property.",
            $a->private_property
        );
    }

    public function testGetClassCallablePrivateProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to find the privateFunction property.",
            $a->privateFunction
        );
    }
    
    public function testGetPropertyThatDoesNotExist()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to find the property_that_does_not_exist property.",
            $a->property_that_does_not_exist
        );
    }
}