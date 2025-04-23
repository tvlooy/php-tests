<?php

// https://wiki.php.net/rfc/new_without_parentheses

echo (new DateTime())->format('d-m-Y H:i:s');
echo new DateTime()->format('d-m-Y H:i:s');

// you need ()

echo (new DateTime)->format('d-m-Y H:i:s');
new SomeClass()::SOME_CONSTANT;

class SomeArray extends ArrayObject {}

echo (new SomeArray(['John Doe']))[0];
echo new SomeArray(['John Doe'])[0];

class Invokable
{
    public function __invoke(): void
    {
        echo "Invoked!";
    }
}

(new Invokable())();
new Invokable()();
