<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Erdika ganteng",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quas, quos iste sapiente, facere accusantium corrupti libero minima adipisci, laborum mollitia sunt rem hic autem quaerat nam animi illo architecto tempore eligendi ipsa? Sunt, at vel. At nesciunt eius atque debitis. Ab explicabo, odio molestiae necessitatibus neque nihil quod est corporis animi? Perspiciatis in a minus fugit aliquid labore eligendi, quasi eaque esse iure accusamus velit aperiam ab pariatur explicabo, repudiandae qui quam? Amet saepe error suscipit voluptate incidunt illum?"
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Adam goreng",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quas, quos iste sapiente, facere accusantium corrupti libero minima adipisci, laborum mollitia sunt rem hic autem quaerat nam animi illo architecto tempore eligendi ipsa? Sunt, at vel. At nesciunt eius atque debitis. Ab explicabo, odio molestiae necessitatibus neque nihil quod est corporis animi? Perspiciatis in a minus fugit aliquid labore eligendi, quasi eaque esse iure accusamus velit aperiam ab pariatur explicabo, repudiandae qui quam? Amet saepe error suscipit voluptate incidunt illum?"
        ]
    ];

    public static function all() {
        
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
