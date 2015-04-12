<?php

namespace Litipk\PyPhpOn\Tests;

use Litipk\PyPhpOn\PyPhpOnTrait as PyPhpOnTrait;


class PyPhpOnAsTrait
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
