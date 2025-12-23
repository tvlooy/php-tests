<?php

// URI Extension

// https://wiki.php.net/rfc/url_parsing_api

// The new always-available URI extension provides APIs to securely parse and modify
// URIs and URLs according to the RFC 3986 and the WHATWG URL standards.

// ------- PHP <=8.4 -----------------------------------
$components = parse_url('https://php.net/releases/8.4/en.php');
var_dump($components['host']);
// string(7) "php.net"

// ------- PHP >=8.5 -----------------------------------
$uri = new \Uri\Rfc3986\Uri('https://php.net/releases/8.5/en.php');
var_dump($uri->getHost());
// string(7) "php.net"

// https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/
