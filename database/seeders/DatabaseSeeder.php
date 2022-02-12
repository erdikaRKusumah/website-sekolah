<?php

namespace Database\Seeders;

Use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // User::create([
            //     'name' => 'Erdika Ganteng',
            //     'email' => 'rhamadan.17@gmail.com',
            //     'password' => bcrypt('12345')
            // ]);
            
            // User::create([
                //     'name' => 'Aripudin',
                //     'email' => 'aripudin@gmail.com',
                //     'password' => bcrypt('12345')
                // ]);
                
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programing'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
    
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
    
        // Post::create([
        //     'title' => 'Judul Ke Satu',
        //     'slug' => 'judul-ke-satu',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis? Doloribus voluptate repudiandae natus deleniti veritatis officia placeat consectetur alias quia fugiat dolore ipsum mollitia, facilis explicabo itaque error maiores cum neque ea enim omnis porro expedita. Nostrum, corporis suscipit. Molestiae explicabo provident enim harum laudantium aut, error, facilis totam iste quo aliquam sunt quae nihil adipisci. Est accusamus officia ex voluptas ab totam, distinctio iusto esse eaque, nesciunt tempora voluptatem, velit aliquam quidem. Ipsam, totam.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    
        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis? Doloribus voluptate repudiandae natus deleniti veritatis officia placeat consectetur alias quia fugiat dolore ipsum mollitia, facilis explicabo itaque error maiores cum neque ea enim omnis porro expedita. Nostrum, corporis suscipit. Molestiae explicabo provident enim harum laudantium aut, error, facilis totam iste quo aliquam sunt quae nihil adipisci. Est accusamus officia ex voluptas ab totam, distinctio iusto esse eaque, nesciunt tempora voluptatem, velit aliquam quidem. Ipsam, totam.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    
        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis? Doloribus voluptate repudiandae natus deleniti veritatis officia placeat consectetur alias quia fugiat dolore ipsum mollitia, facilis explicabo itaque error maiores cum neque ea enim omnis porro expedita. Nostrum, corporis suscipit. Molestiae explicabo provident enim harum laudantium aut, error, facilis totam iste quo aliquam sunt quae nihil adipisci. Est accusamus officia ex voluptas ab totam, distinctio iusto esse eaque, nesciunt tempora voluptatem, velit aliquam quidem. Ipsam, totam.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis?',
        //     'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio consectetur impedit officiis aspernatur iste rerum? Vel ut doloremque nam atque possimus eum natus minima aliquid cumque rem quo quae dignissimos quod quos, est nobis? Doloribus voluptate repudiandae natus deleniti veritatis officia placeat consectetur alias quia fugiat dolore ipsum mollitia, facilis explicabo itaque error maiores cum neque ea enim omnis porro expedita. Nostrum, corporis suscipit. Molestiae explicabo provident enim harum laudantium aut, error, facilis totam iste quo aliquam sunt quae nihil adipisci. Est accusamus officia ex voluptas ab totam, distinctio iusto esse eaque, nesciunt tempora voluptatem, velit aliquam quidem. Ipsam, totam.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }

    
}
