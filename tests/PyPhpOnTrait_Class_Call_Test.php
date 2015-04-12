<?php


use Litipk\PyPhpOn\Tests\PyPhpOnAsTraitPlusInheritance as PyPhpOnAsTraitPlusInheritance;


date_default_timezone_set('UTC');


class PyPhpOnTrait_Class_Call_Test extends \PHPUnit_Framework_TestCase
{
    public function testCallClassNotCallablePublicProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to call the public_property method with \$args = []",
            $a->public_property()
        );
    }

    public function testCallClassNotCallablePrivateProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to call the private_property method with \$args = []",
            $a->private_property()
        );
    }

    public function testCallClassCallablePrivateProperty()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to call the privateFunction method with \$args = []",
            $a->privateFunction()
        );
    }

    public function testCallMethodThatDoesNotExist()
    {
        $a = new PyPhpOnAsTraitPlusInheritance();
        $this->assertEquals(
            "Unable to call the method_that_does_not_exist method with \$args = []",
            $a->method_that_does_not_exist()
        );
    }
}