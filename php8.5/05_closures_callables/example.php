<?php

// Closures and First-Class Callables in Constant Expressions

// https://wiki.php.net/rfc/closures_in_const_expr
// https://wiki.php.net/rfc/fcc_in_const_expr

// Static closures and first-class callables can now be used in constant expressions. This
// includes attribute parameters, default values of properties and parameters, and constants.

// ------- PHP <=8.4 -----------------------------------
namespace php84 {

    final class PostsController
    {
        #[AccessControl(
            new Expression('request.user === post.getAuthor()'),
        )]
        public function update(
            Request $request,
            Post $post,
        ): Response {
            // ...
        }
    }

}

// ------- PHP <=8.5 -----------------------------------
namespace php85 {

    final class PostsController
    {
        #[AccessControl(static function (
            Request $request,
            Post $post,
        ): bool {
            return $request->user === $post->getAuthor();
        })]
        public function update(
            Request $request,
            Post $post,
        ): Response {
            // ...
        }
    }

}
