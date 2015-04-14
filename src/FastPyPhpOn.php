<?php

namespace Litipk\PyPhpOn;


abstract class FastPyPhpOn
{
    private $reflectedThis = null;

    public function __construct ()
    {
        $this->reflectedThis = new \ReflectionObject($this);
    }

    public function __call($method, $args)
    {
        if ($this->reflectedThis->hasProperty($method) && is_callable($this->$method)) {
            return call_user_func_array($this->$method, $args);
        }

        $class = get_class($this);
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error("Call to undefined method $class::$method() in $file on line $line", E_USER_ERROR);
    }

    public function __get($name)
    {
        if ($this->reflectedThis->hasMethod($name)) {
            $reflectedMethod = $this->reflectedThis->getMethod($name);

            if($reflectedMethod->isPublic()) {
                return $reflectedMethod->getClosure($this);
            }
        }

        $class = get_class($this);
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error("Undefined property: $class::$name in $file on line $line", E_USER_NOTICE);
    }

    public function __isset($name)
    {
        return (
            $this->reflectedThis->hasMethod($name) &&
            $this->reflectedThis->getMethod($name)->isPublic()
        );
    }
}
