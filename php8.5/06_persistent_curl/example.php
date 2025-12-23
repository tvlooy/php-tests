<?php

// Persistent cURL Share Handles

// https://wiki.php.net/rfc/curl_share_persistence
// https://wiki.php.net/rfc/curl_share_persistence_improvement

// Unlike curl_share_init(), handles created by curl_share_init_persistent() will not be
// destroyed at the end of the PHP request. If a persistent share handle with the same set
// of share options is found, it will be reused, avoiding the cost of initializing cURL handles
// each time.

// ------- PHP <=8.4 -----------------------------------
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

curl_exec($ch);

// ------- PHP >=8.5 -----------------------------------
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT,
]);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

// This may now reuse the connection from an earlier SAPI request
curl_exec($ch);
