<?php

namespace Litipk\PyPhpOn\Tests;

use Litipk\PyPhpOn\PyPhpOn as PyPhpOn;


class ExtendedPyPhpOn extends PyPhpOn
{
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
