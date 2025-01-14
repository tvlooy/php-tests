# bcrypt

password_hash() bcrypt cost was 10 since php 5.5
since php 8.4 it is 12, and thus SLOWER

echo password_hash('foobar', PASSWORD_DEFAULT);
$2y$10$2TaopIvjx0Z6DOPz0Xlc1eudx5vD067NyU0vZeVxCdakRVNUOOzo6

var_dump(password_needs_rehash('$2y$10$2TaopIvjx0Z6DOPz0Xlc1eudx5vD067NyU0vZeVxCdakRVNUOOzo6', PASSWORD_DEFAULT));
bool(true)

php > echo password_hash('foobar', PASSWORD_DEFAULT);
$2y$12$WFS8CAFPhnhEwdThG0ih4OQW/f0gqycEL9qP4UBRH05STqMdEoAkm
