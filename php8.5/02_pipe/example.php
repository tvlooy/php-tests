<?php

// Pipe Operator

// https://wiki.php.net/rfc/pipe-operator-v3

// The pipe operator allows chaining function calls together without dealing with
// intermediary variables. This enables replacing many "nested calls" with a chain that can
// be read forwards, rather than inside-out.

// ------- PHP <=8.4 -----------------------------------
$title = ' PHP 8.5 Released ';

$slug = strtolower(
    str_replace('.', '',
        str_replace(' ', '-',
            trim($title)
        )
    )
);

var_dump($slug);
// string(15) "php-85-released"

// ------- PHP >=8.5 -----------------------------------
$title = ' PHP 8.5 Released ';

$slug = $title
    |> trim(...)
    |> (fn($str) => str_replace(' ', '-', $str))
    |> (fn($str) => str_replace('.', '', $str))
    |> strtolower(...);

var_dump($slug);
// string(15) "php-85-released"

// https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/

$result = "Hello World" |> strlen(...);
// Is equivalent to
$result = strlen("Hello World");

// -----------------------------------------------------

$slug = trim($title);
$slug = str_replace(' ', '-', $slug);
$slug = str_replace('.', '', $slug);
$slug = strtolower($slug);
