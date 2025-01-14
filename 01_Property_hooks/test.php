<?php

// https://wiki.php.net/rfc/property-hooks
// Remove your getters and setters

interface UserInterface
{
    public \DateTime $creationDate { get; }
    public string $displayName { get; set; }
}


class User implements UserInterface
{
    private bool $isModified = false;

    public function __construct(
        private string $first,
        private string $last,
    ) {
    }
    public string $displayName;
    public \DateTime $creationDate;

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

    public function getStuff(): UserInterface
    {
        return $this;
    }
}

$x = new User('Tom', 'Van Looy');
$x->creationDate = new \DateTime();
echo $x->userName;
$x->email = 'tom@ctors.net';

var_dump($x->getStuff()->userName);
