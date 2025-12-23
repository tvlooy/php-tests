<?php

// Maybe Monad

function maybe(\Closure $c): \Closure
{
    return fn(mixed $arg) => $arg === null ? null : $c($arg);
}

$profit = [1, 4, 5]
    |> maybe(loadSeveral(...))
    |> maybe(filter(isOnSale(...)))
    |> maybe(map(sellWidget(...)))
    |> maybe(array_sum(...));
