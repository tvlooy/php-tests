<?php

$numbers = [1, 2, 3, 4, 5, 6];

$firstMatch = array_find(
    array: $numbers,
    callback: fn (int $number) => $number % 2 === 0,
);

$animal = array_find(
    ['dog', 'cat', 'cow', 'duck', 'goose'],
    static fn (string $value): bool => str_starts_with($value, 'c'),
);

var_dump($animal); // string(3) "cat"

array_find_key();
array_any();
array_all();

/* ------------------------------------------------------------------------------------------------------------------ */

$num1 = new BcMath\Number('0.12345');
$num2 = new BcMath\Number('2');
$result = $num1 + $num2;

echo $result; // '2.12345'
var_dump($num1 > $num2); // false

/* ------------------------------------------------------------------------------------------------------------------ */

// #[\Deprecated] attribute exposes PHP deprecation mechanism to user land
#[\Deprecated('use foo() instead, since: "4.2"')]
function bar() {}
// for functions, methods, constants, enums

// exit() and die() are proper functions

// Eg: to parse PUT / PATCH HTTP requests:
[$_POST, $_FILES] = request_parse_body();

bcceil();
bcdivmod();
bcfloor();
bcround();

// RoundingMode enum for round()
RoundingMode::TowardsZero;
RoundingMode::AwayFromZero;
RoundingMode::NegativeInfinity;
RoundingMode::PositiveInfinity;

grapheme_str_split();

DateTime::createFromTimestamp();
DateTime::getMicrosecond();
DateTime::setMicrosecond();
DateTimeImmutable::createFromTimestamp();
DateTimeImmutable::getMicrosecond();
DateTimeImmutable::setMicrosecond();

mb_trim();
mb_ltrim();
mb_rtrim();
mb_ucfirst();
mb_lcfirst();

pcntl_getcpu();
pcntl_getcpuaffinity();
pcntl_getqos_class();
pcntl_setns();
pcntl_waitid();

ReflectionClassConstant::isDeprecated();
ReflectionGenerator::isClosed();
ReflectionProperty::isDynamic();

http_get_last_response_headers();
http_clear_last_response_headers();

fpow();

XMLReader::fromStream();
XMLReader::fromUri();
XMLReader::fromString();
XMLWriter::toStream();
XMLWriter::toUri();
XMLWriter::toMemory();
