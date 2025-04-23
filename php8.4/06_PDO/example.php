<?php

// https://wiki.php.net/rfc/pdo_driver_specific_subclasses

// Instead of object(PDO), you get a subclass Pdo\MySql Pdo\Pgsql Pdo\Sqlite Pdo\Odbc ...

$connection = PDO::connect(
    'sqlite:foo.db',
    $username,
    $password,
); // object(Pdo\Sqlite)

$connection->createFunction(
    'prepend_php',
    static fn ($string) => "PHP {$string}",
); // Does not exist on a mismatching driver.

$connection->query('SELECT prepend_php(version) FROM php');
