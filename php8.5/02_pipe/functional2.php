<?php

#[Monad]
class Maybe
{
    public function __construct(private mixed $value) {}

    public function bind(\Closure $c): Maybe
    {
        return $this->value === null
            ? new Maybe(null)
            : $c($this->value);
    }

    public function map(\Closure $c): Maybe
    {
        if ($this->value === null) {
            return new Maybe(null);
        }
        return new Maybe($c($this->value));
    }

    public function get(): mixed
    {
        return $this->value;
    }
}

$profit = Maybe([1, 4, 5])
    |> loadSeveral(...)
    |> filter(isOnSale(...))
    |> map(sellWidget(...))
    |> array_sum(...);
