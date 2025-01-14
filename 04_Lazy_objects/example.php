<?php

// Used by frameworks (DI, lazy services, ORM), lower level code
// Huge impact on projects like Doctrine, because of engine support

// Create class instances that are initialized only when needed
// Lazy loading PoEAA
//    - ReflectionClass::newLazyGhost();
//    - ReflectionClass::newLazyProxy();

class Author
{
    public function __construct(
        private(set) string $firstName,
        private(set) string $lastName,
    ) { }

    public string $fullName {
        get => $this->firstName . ' ' . $this->lastName;
    }
}

class Book
{
    public function __construct(
        private(set) string $title,
        private(set) Author $author,
    ) { }
}

$book = new Book(
    "The Hitchhiker's Guide to the Galaxy",
    new ReflectionClass(Author::class)->newLazyGhost(
        function (Author $ghost): void {
            echo "Querying the DB\n";
            $ghost->__construct('Douglas', 'Adams');
        }
    ),
);

echo $book->title."\n";
echo $book->author->fullName."\n";
