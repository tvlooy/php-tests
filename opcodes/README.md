# Opcode tests

## 1. Variable assignment vs direct return

```
$ cat test1a.php
function test() {
    $a = 1 + 2;
    return $a;
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test1a.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  3
compiled vars:  !0 = $a
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    4     0  E >   ASSIGN                                                   !0, 3
    5     1      > RETURN                                                   !0
    6     2*     > RETURN                                                   null

branch: #  0; line:     4-    6; sop:     0; eop:     2
path #1: 0, 
End of function test
```

```
$ cat test1b.php
<?php
function test() {
    return 1 + 2;
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test1b.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  2
compiled vars:  none
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    4     0  E > > RETURN                                                   3
    5     1*     > RETURN                                                   null

branch: #  0; line:     4-    5; sop:     0; eop:     1
path #1: 0, 
End of function test
```

## 2. Pre-increment vs post-increment

```
$ cat test2a.php 
<?php
function test() {
    $i = 0;
    return ++$i;
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test2a.php
...
Function test:
Finding entry pointsphp -d extension=vld -d vld.active=1 -d vld.execute=0 -f test2a.php
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  4
compiled vars:  !0 = $i
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    3     0  E >   ASSIGN                                                   !0, 0
    4     1        PRE_INC                                          ~2      !0
          2      > RETURN                                                   ~2
    5     3*     > RETURN                                                   null

branch: #  0; line:     3-    5; sop:     0; eop:     3
path #1: 0, 
End of function test
```

```
$ cat test2b.php 
<?php
function test() {
    $i = 0;
    return $i++;
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test2b.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  4
compiled vars:  !0 = $i
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    3     0  E >   ASSIGN                                                   !0, 0
    4     1        POST_INC                                         ~2      !0
          2      > RETURN                                                   ~2
    5     3*     > RETURN                                                   null

branch: #  0; line:     3-    5; sop:     0; eop:     3
path #1: 0, 
End of function test
```

## 3. String interpolation vs concatenation

```
$ cat test3a.php
<?php
function test() {
    $name = "Tom";
    return "Hello " . $name;
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test3a.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  4
compiled vars:  !0 = $name
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    3     0  E >   ASSIGN                                                   !0, 'Tom'
    4     1        CONCAT                                           ~2      'Hello+', !0
          2      > RETURN                                                   ~2
    5     3*     > RETURN                                                   null

branch: #  0; line:     3-    5; sop:     0; eop:     3
path #1: 0, 
End of function test
```

```
$ cat test3b.php
<?php
function test() {
    $name = "Tom";
    return "Hello $name";
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test3b.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  5
compiled vars:  !0 = $name
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    3     0  E >   ASSIGN                                                   !0, 'Tom'
    4     1        NOP                                                      
          2        FAST_CONCAT                                      ~2      'Hello+', !0
          3      > RETURN                                                   ~2
    5     4*     > RETURN                                                   null

branch: #  0; line:     3-    5; sop:     0; eop:     4
path #1: 0, 
End of function test
```

## 4. isset() vs array_key_exists()

```
$ cat test4a.php 
<?php
function test() {
    $arr = ['foo' => 'bar'];
    return isset($arr['foo']);
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test4a.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  4
compiled vars:  !0 = $arr
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    3     0  E >   ASSIGN                                                   !0, <array>
    4     1        ISSET_ISEMPTY_DIM_OBJ                         0  ~2      !0, 'foo'
          2      > RETURN                                                   ~2
    5     3*     > RETURN                                                   null

branch: #  0; line:     3-    5; sop:     0; eop:     3
path #1: 0, 
End of function test
```

```
$ cat test4b.php 
<?php
function test() {
    $arr = ['foo' => 'bar'];
    return array_key_exists('foo', $arr);
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test4b.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  4
compiled vars:  !0 = $arr
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    3     0  E >   ASSIGN                                                   !0, <array>
    4     1        ARRAY_KEY_EXISTS                                 ~2      'foo', !0
          2      > RETURN                                                   ~2
    5     3*     > RETURN                                                   null

branch: #  0; line:     3-    5; sop:     0; eop:     3
path #1: 0, 
End of function test
```

## 5. if (true) vs ternary vs null coalescing

```
$ cat test5a.php 
<?php
function test($a) {
    if ($a) {
        return $a;
    } else {
        return 'default';
    }
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test5a.php
...
Function test:
Finding entry points
Branch analysis from position: 0
2 jumps found. (Code = 43) Position 1 = 2, Position 2 = 4
Branch analysis from position: 2
1 jumps found. (Code = 62) Position 1 = -2
Branch analysis from position: 4
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  6
compiled vars:  !0 = $a
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    2     0  E >   RECV                                             !0      
    3     1      > JMPZ                                                     !0, ->4
    4     2    > > RETURN                                                   !0
    3     3*       JMP                                                      ->5
    6     4    > > RETURN                                                   'default'
    8     5*     > RETURN                                                   null

branch: #  0; line:     2-    3; sop:     0; eop:     1; out0:   2; out1:   4
branch: #  2; line:     4-    4; sop:     2; eop:     2; out0:  -2
branch: #  4; line:     6-    8; sop:     4; eop:     5
path #1: 0, 2, 
path #2: 0, 4, 
End of function test
```

```
$ cat test5b.php 
<?php
function test($a) {
    return $a ? $a : 'default';
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test5b.php
...
Function test:
Finding entry points
Branch analysis from position: 0
2 jumps found. (Code = 43) Position 1 = 2, Position 2 = 4
Branch analysis from position: 2
1 jumps found. (Code = 42) Position 1 = 5
Branch analysis from position: 5
1 jumps found. (Code = 62) Position 1 = -2
Branch analysis from position: 4
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  7
compiled vars:  !0 = $a
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    2     0  E >   RECV                                             !0      
    3     1      > JMPZ                                                     !0, ->4
          2    >   QM_ASSIGN                                        ~1      !0
          3      > JMP                                                      ->5
          4    >   QM_ASSIGN                                        ~1      'default'
          5    > > RETURN                                                   ~1
    4     6*     > RETURN                                                   null

branch: #  0; line:     2-    3; sop:     0; eop:     1; out0:   2; out1:   4
branch: #  2; line:     3-    3; sop:     2; eop:     3; out0:   5
branch: #  4; line:     3-    3; sop:     4; eop:     4; out0:   5
branch: #  5; line:     3-    4; sop:     5; eop:     6
path #1: 0, 2, 5, 
path #2: 0, 4, 5, 
End of function test
```

```
$ cat test5c.php 
<?php
function test($a) {
    return $a ?? 'default';
}

$ php -d extension=vld -d vld.active=1 -d vld.execute=0 -f test5c.php
...
Function test:
Finding entry points
Branch analysis from position: 0
1 jumps found. (Code = 62) Position 1 = -2
function name:  test
number of ops:  5
compiled vars:  !0 = $a
line      #* E I O op                           fetch          ext  return  operands
-------------------------------------------------------------------------------------
    2     0  E >   RECV                                             !0      
    3     1        COALESCE                                         ~1      !0
          2        QM_ASSIGN                                        ~1      'default'
          3      > RETURN                                                   ~1
    4     4*     > RETURN                                                   null

branch: #  0; line:     2-    4; sop:     0; eop:     4
path #1: 0, 
End of function test
```

