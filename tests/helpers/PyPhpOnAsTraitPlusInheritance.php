<?php

namespace Litipk\PyPhpOn\Tests;

use Litipk\PyPhpOn\PyPhpOnTrait as PyPhpOnTrait;


class MagicClass
{
    public function __get($name)
    {
        return "Unable to find the $name property.";
    }

    public function __call($method, $args)
    {
        return "Unable to call the $method method with \$args = ".json_encode($args);
    }
}

class PyPhpOnAsTraitPlusInheritance extends MagicClass
{
    use PyPhpOnTrait;

    public $public_property = 1;
    private $private_property = 2;

    public function publicFunction ($arg)
    {
        return [
            "public" => $this->public_property,
            "arg" => $arg
        ];
    }

    private function privateFunction ()
    {
        return [
            "private" => $this->private_property
        ];
    }
}
