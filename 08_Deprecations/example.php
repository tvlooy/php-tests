<?php

interface FooBar
{
    public function foo1(string $bar = null): void;

    public function foo2(?string $bar = null): void;
}

// The IMAP, OCI8, PDO_OCI, and pspell extensions have been unbundled and moved to PECL.

// Raising zero to the power of a negative number is now deprecated.

// Passing invalid mode to round() throws ValueError.

// Class constants from extensions date, intl, pdo, reflection, spl, sqlite, xmlreader are typed now.

// GMP class is now final.

// stream_bucket_make_writeable() and stream_bucket_new() now return an instance of StreamBucket instead of stdClass.

// E_STRICT constant has been deprecated.

// Removed constants:
// MYSQLI_SET_CHARSET_DIR, MYSQLI_STMT_ATTR_PREFETCH_ROWS, MYSQLI_CURSOR_TYPE_FOR_UPDATE, MYSQLI_CURSOR_TYPE_SCROLLABLE, MYSQLI_TYPE_INTERVAL

// Deprecated functions:
// mysqli_ping(), mysqli_kill(), mysqli_refresh() functions, mysqli::ping(), mysqli::kill(), mysqli::refresh()

// Deprecated constants:
// MYSQLI_REFRESH_*

// and more ...
