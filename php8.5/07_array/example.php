<?php

// array_first() and array_last() functions

// https://wiki.php.net/rfc/array_first_last

// The array_first() and array_last() functions return the first or last value of an array,
// respectively. If the array is empty, null is returned (making it easy to compose with the
// ?? operator).

// ------- PHP <=8.4 -----------------------------------

$lastEvent = $events === []
    ? null
    : $events[array_key_last($events)];

// ------- PHP >=8.5 -----------------------------------

$lastEvent = array_last($events);
