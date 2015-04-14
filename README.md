# PyPhpOn
A port of (a few) nice Python features to PHP.


## Getting started

You can install this library using [Composer](http://getcomposer.org/).

To install it via Composer, just write in the require block of your
composer.json file the following text:

```json
{
    "require": {
        "litipk/pyphpon": "0.3"
    }
}
```

This library basically provides two simple features.

### Getting methods as callables

Imagine you have the following class,

```php
<?php

class Person
{
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
```

and that you want handle a method from an object as another object.
In plain PHP you can't do the following:
```php
$peter = new Person("Peter");
$nameGetter = $peter->getName; // The code will crash here
echo $nameGetter();
```

But, if you use PyPhpOn, then it's possible:
```php
<?php

use Litipk\PyPhpOn\PyPhpOn as PyPhpOn;

class Person extends PyPhpOn
{
    // Here the same as before...
}

$peter = new Person("Peter");
$nameGetter = $peter->getName; // Now this line works perfectly!
echo $nameGetter();
```

### Calling dynamically created callable properties

Suppose we're still working with the previous class. And we want to attach a callable property
to our `$peter` object. If you use plain PHP code, the following snippet will crash, but if you
inherit from `PyPhpOn` the everything will run somoothly.

```php
$peter->greet = functionn () { echo "Hello, my name is Peter"; };

$peter->greet(); // This line doesn't work on plain PHP, but with PyPhpOn yes.

// In plain PHP you need to split the call into two steps.
$new_greet_instance = $peter->greet;
$new_greet_instance();
```

It's important to note that we aren't binding the `greet` function to the object (since this violates the intended attributes protection, you can use reflection if you need to do it), but trying to uniformize and making more clean the PHP syntax.

## Using traits is also possible

If you don't want to inherit from the `PyPhpOn` class, then you can use the trait version (this trait works gracefully with inherited `__call` and `__get` methods, this won't break the "magic" bultin in your classes):
```php
class Example
{
    use PyPhpOnTrait;
    
    // ... Whatever you need.
}
```

## How to contribute

 * First of all, you can take a look on the [bugtracker](https://github.com/Litipk/pyphpon/issues) and decide if there is something that you want to do :wink: . If you think there are missing improvements in this file, then you are invited to modify the TODO list.
 * You can also send us bug reports using the same bugtracker.
 * If you are really interested on helping to improve Litipk\PyPhpOn, we recommend to read the [contributing guidelines](https://github.com/Litipk/pyphpon/blob/master/CONTRIBUTING.md).

## License

Litipk\PyPhpOn is licensed under the [MIT License](https://github.com/Litipk/pyphpon/blob/master/LICENSE).
