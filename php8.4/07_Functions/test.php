<?php

//$str = "🙇‍♂️";
$str = 'අයේෂ්';

foreach (str_split($str) as $e) {
    printf("%8s : %s\n", bin2hex($e), $e);
}

foreach (mb_str_split($str) as $e) {
    printf("%8s : %s\n", bin2hex($e), $e);
}

foreach (grapheme_str_split($str) as $e) {
    printf("%8s : %s\n", bin2hex($e), $e);
}
