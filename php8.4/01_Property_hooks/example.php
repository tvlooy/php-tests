<?php

// https://wiki.php.net/rfc/property-hooks
// Remove your getters and setters

class User
{
    public function __construct(
        private string $first,
        private string $last,
    ) {
    }

    public string $userName {
        get {
            return strtolower($this->first . '.' . $this->last);
        }
        set {
            [$this->first, $this->last] = explode(' ', $value, 2);
            $this->isModified = true;
        }
    }

    public string $email {
        get => $this->email;
        set (string $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('Invalid email address.');
            }
            $this->email = strtolower($email);
        }
    }
}

// $userName is a virtual property
// => shorthand
// get/set is optional (default)

interface UserInterface
{
    public \DateTime $creationDate { get; }
    public string $displayName { get; set; }
}
