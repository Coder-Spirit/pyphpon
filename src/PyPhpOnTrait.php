<?php

namespace Litipk\PyPhpOn;


trait PyPhpOnTrait
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
        $reflectedThis = $this->getReflectionThis();

        if ($reflectedThis->hasProperty($method) && is_callable($this->$method)) {
            return call_user_func_array($this->$method, $args);
        }

        $reflectedParentClass = $reflectedThis->getParentClass();
        if ($reflectedParentClass != false && $reflectedParentClass->hasMethod("__call")) {
            $reflectedInheritedMagicCall = $reflectedParentClass->getMethod("__call");

            if ($reflectedInheritedMagicCall->isPublic()) {
                return $reflectedInheritedMagicCall->invokeArgs(
                    $this, [$method, $args]
                );
            }
        }

        $class = get_class($this);
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error("Call to undefined method $class::$method() in $file on line $line", E_USER_ERROR);
    }

    public function __get($name)
    {
        $reflectedThis = $this->getReflectionThis();

        if ($reflectedThis->hasMethod($name)) {
            $reflectedMethod = $reflectedThis->getMethod($name);

            if($reflectedMethod->isPublic()) {
                return $reflectedMethod->getClosure($this);
            }
        }

        $reflectedParentClass = $reflectedThis->getParentClass();
        if ($reflectedParentClass != false && $reflectedParentClass->hasMethod("__get")) {
            $reflectedInheritedMagicGet = $reflectedParentClass->getMethod("__get");

            if ($reflectedInheritedMagicGet->isPublic()) {
                return $reflectedInheritedMagicGet->invoke($this, $name);
            }
        }

        $class = get_class($this);
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error("Undefined property: $class::$name in $file on line $line", E_USER_NOTICE);
    }
}
