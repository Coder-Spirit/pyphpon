<?php

namespace Litipk\PyPhpOn\Tests;

date_default_timezone_set('UTC');


class PyPhpOnTestCase extends \PHPUnit_Framework_TestCase
{
    public function errorToExceptionHandler($errNo, $errStr, $errFile, $errLine, $errContext)
    {
        if (error_reporting() == 0) return;
        throw new \ErrorException($errStr, 0, $errNo, $errFile, $errLine);
    }

    public function setUp()
    {
        set_error_handler([$this, "errorToExceptionHandler"]);
    }

    public function tearDown()
    {
        set_error_handler(null);
    }

    public function objectsProvider()
    {
        return [
            [new ExtendedPyPhpOn()],
            [new ExtendedFastPyPhpOn()],
            [new PyPhpOnAsTrait()],
            [new PyPhpOnAsTraitPlusInheritance()]
        ];
    }

    public function objectsWithInheritanceProvider()
    {
        return [
            [new ExtendedPyPhpOn()],
            [new ExtendedFastPyPhpOn()],
            [new PyPhpOnAsTrait()]
        ];
    }
}
