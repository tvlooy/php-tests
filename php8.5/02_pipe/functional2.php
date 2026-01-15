<?php

#[Monad]
class Maybe
{
    public function __construct(private mixed $value) {}

    public static function of(mixed $value): self {
        return new self($value);
    }

    public function bind(callable $fn): self {
        if ($this->value === null) {
            return new self(null);
        }

        $result = $fn($this->value);

        return $result instanceof Maybe ? $result : new self($result);
    }

    public function map(callable $fn): self {
        if ($this->value === null) {
            return new self(null);
        }
        return new self($fn($this->value));
    }

    public function get(): mixed {
        return $this->value;
    }
}

$profit = Maybe::of([1, 4, 5])
    |> loadSeveral(...)
    |> filter(isOnSale(...))
    |> map(sellWidget(...))
    |> array_sum(...);
