<?php

// https://wiki.php.net/rfc/asymmetric-visibility-v2

class User1a
{
    public function __construct(
        private string $first,
        private string $last,
    ) {
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function getLast(): string
    {
        return $this->last;
    }
}

class User1b
{
    public function __construct(
        public private(set) string $first,
        public private(set) string $last,
    ) {
    }
}

class User2
{
    private(set) int $numberOfLogins = 0;

    public function incrementNumberOfLogins(): void
    {
        $this->numberOfLogins++;
    }
}

// Only on typed properties
// set visibility must be eq to or lesser than get visibility
// public,protected,private
// inheritance works the same
// private(set) implies final
// readonly without private(set) is analogous to protected(set)
// $obj->list[] follows set directive
// &get {} for references

class User3a
{
    private public(set) string $password {
        set {
            $this->password = password_hash($value, PASSWORD_DEFAULT);
        }
    }

    public function passwordVerify(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}

class User3b
{
    private string $password;

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function passwordVerify(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
