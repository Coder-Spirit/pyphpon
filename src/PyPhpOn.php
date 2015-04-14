<?php

namespace Litipk\PyPhpOn;


abstract class PyPhpOn
{
    private $reflectedThis = null;

    private function getReflectionThis ()
    {
        if ($this->reflectedThis === null) {
            $this->reflectedThis = new \ReflectionObject($this);
        }

        return $this->reflectedThis;
    }

    public function __call($method, $args)
    {
        if ($this->getReflectionThis()->hasProperty($method) && is_callable($this->$method)) {
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
        if ($this->getReflectionThis()->hasMethod($name)) {
            $reflectedMethod = $this->getReflectionThis()->getMethod($name);

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
            $this->getReflectionThis()->hasMethod($name) &&
            $this->getReflectionThis()->getMethod($name)->isPublic()
        );
    }
}
