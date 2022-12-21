<?php

namespace Database\Seeders;

Use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Gallery;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Admin::create([
            'user_id' => '1',
            'full_name' => 'ADMIN',
            'gender' => 'L',
            'birth_date' => '1998-05-30',
            'email' => 'admin@mail.com',
            'phone_number' => '085232077932',
            'image' => 'default.png',
        ]);

        User::create([
                'username' => 'admin',
                'role' => '1',
                'password' => bcrypt('12345')
        ]);

        // Admin::factory(3)->create();

        // User::factory(3)->create();



        // User::create([
        //         'username' => 'erdikarhamadankusumah',
        //         'role' => '3',
        //         'password' => bcrypt('12345')
        // ]);

        // Student::create([
        // 'user_id' => '5',
        // 'registration_type' => '1',
        // 'nis' => '3223323232',
        // 'full_name' => 'Erdika Rhamadan Kusumah',
        // 'gender' => 'L',
        // 'birth_place' => 'Subang',
        // 'birth_date' => '1998-05-30',
        // 'phone_number' => '085232077932',
        // 'religion' => '1',
        // 'address' => 'Bojong Sangun',
        // 'father_name' => 'Tatang',
        // 'mother_name' => 'Ersih',
        // 'father_job' => 'Karyawan',
        // 'mother_job' => 'Ibu Rumah Tangga',
        // 'status' => '1',
        // 'image' => 'default.png'
        // ]);

        // Teacher::create([
        // 'user_id' => '6',
        // 'nip' => '322332323243343443',
        // 'full_name' => 'Adam Alfarizi',
        // 'title' => 'S.T',
        // 'gender' => 'L',
        // 'birth_place' => 'Subang',
        // 'birth_date' => '1998-05-30',
        // 'phone_number' => '085232177932',
        // 'address' => 'Bojong Sangun',
        // 'image' => 'default.png'
        // ]);

        // User::create([
        //         'username' => 'adamalfarizi',
        //         'role' => '2',
        //         'password' => bcrypt('12345')
        // ]);




            // User::create([
                //     'name' => 'Aripudin',
                //     'email' => 'aripudin@gmail.com',
                //     'password' => bcrypt('12345')
                // ]);


        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programing'
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // Profile::create([
        //     'title' => 'Visi',
        //     'slug' => 'visi',
        //     'image' => 'profile-images/SL5zEyBqnZsPe0eOw0w5RjJv6OtTo9NMU64SkhDQ.png',
        //     'excerpt' => 'Terwujudnya lulusan yang berakhlak mulia, unggul dalam IPTEKS, berprestasi, dan berbudaya lingkungan',
        //     'body' => '<div>Terwujudnya lulusan yang berakhlak mulia, unggul dalam IPTEKS, berprestasi, dan berbudaya lingkungan</div>'
        // ]);

        // Profile::create([
        //     'title' => 'Misi',
        //     'slug' => 'misi',
        //     'image' => 'profile-images/dtqSvnO2xTXekbu74Q9SZlhrP1WuotIgmPg3JfHN.png',
        //     'excerpt' => 'Membudayakan nilai-nilai keagamaan dan kegiatan ibadah sesuai dengan agama dan kepercayaan masing-masing, Mewujudkan peserta didik yang berperilaku ramah dan berkarakter',
        //     'body' => '<ol><li>Membudayakan nilai-nilai keagamaan dan kegiatan ibadah sesuai&nbsp; dengan agama dan kepercayaan masing-masing</li><li>Mewujudkan peserta didik yang berperilaku ramah dan berkarakter&nbsp; baik</li><li>Mewujudkan pembelajaran yang berbasis digital dan kontekstual</li><li>Mewujudkan pengembangan kreativitas peserta didik melalui&nbsp; kegiatan ekstrakurikuler dan Pengembangan dan Pendidikan Seni&nbsp; Tradisi (PPST)</li><li>Mewujudkan prestasi peserta didik sesuai dengan potensi yang&nbsp; dimiliki, baik secara akademik maupun non-akademik</li><li>Mewujudkan nilai-nilai cinta lingkungan hidup</li><li>Membudayakan perilaku melestarikan lingkungan hidup</li></ol><div><br></div>'
        // ]);

        // Profile::create([
        //     'title' => 'Sambutan Singkat',
        //     'slug' => 'sambutan-singkat',
        //     'image' => 'profile-images/QeGvnghlu7uJeuAaiEgFeLePOpded1UgcqZ4Lulo.png',
        //     'excerpt' => 'Assalamu‘alaikum Warohmatullahi Wabarokkatuh.<br></em></strong><br></div><div>Puji syukur kehadirat Allah ﷻ yang telah melimpahkan nikmat yang tidak terhingga kepada kita semua, mudah-mudahan kita bisa mensyukurinya agar kita terhindar dari murka Nya. Aamiin…',
        //     'body' => '<div><strong><em>Assalamu‘alaikum Warohmatullahi Wabarokkatuh.<br></em></strong><br></div><div>Puji syukur kehadirat Allah ﷻ yang telah melimpahkan nikmat yang tidak terhingga kepada kita semua, mudah-mudahan kita bisa mensyukurinya agar kita terhindar dari murka Nya. Aamiin…</div>'
        // ]);

        // Profile::create([
        //     'title' => 'Sejarah Singkat',
        //     'slug' => 'sejarah-singkat',
        //     'image' => 'profile-images/5pnl2KtdNNLuBglE1yzOjzmjRgOsrX7Oea53egFQ.jpg',
        //     'excerpt' => 'Sekolah adalah lembaga untuk para siswa pengajaran siswa/murid di bawah pengawasan guru.[1]Sebagian besar negara memiliki sistem pendidikan formal yang umumnya wajib. Dalam sistem ini, siswa mengalami...',
        //     'body' => '<div>Sekolah adalah lembaga untuk para siswa pengajaran siswa/murid di bawah pengawasan guru.[1]<br><br>Sebagian besar negara memiliki sistem pendidikan formal yang umumnya wajib. Dalam sistem ini, siswa mengalami kemajuan melalui serangkaian kegiatan belajar mengajar di sekolah. Nama-nama untuk sekolah ini bervariasi menurut negara (dibahas pada bagian Daerah di bawah), tetapi umumnya termasuk sekolah dasar untuk anak-anak muda dan sekolah menengah untuk remaja yang telah menyelesaikan pendidikan dasar.[2]<br><br>Selain sekolah inti, siswa di negara tertentu juga mungkin memiliki akses untuk mengikuti sekolah baik sebelum dan sesudah pendidikan dasar dan menengah. TK atau pra-sekolah menyediakan sekolah bagi anak-anak (biasanya umur 3-5 tahun). Universitas, sekolah kejuruan, perguruan tinggi atau seminari mungkin tersedia setelah sekolah menengah. Sebuah sekolah mungkin juga didedikasikan untuk satu bidang tertentu, seperti sekolah ekonomi atau sekolah tari. Alternatif sekolah dapat menyediakan kurikulum dan metode non-tradisional.[3]</div><div><br></div>'
        // ]);

        // Gallery::create([
        //     'image' => 'gallery-images/einrLN6ws7xxxkvCH22hSWtPGSbByueMcn6f54L2.jpg',
        //     'description' => 'Gallery 1'
        // ]);

        // Gallery::create([
        //     'image' => 'gallery-images/89JQfKJjwvYLKFIrPfOzZZgK9j65WEY0NZ3b7hIW.jpg',
        //     'description' => 'Gallery 2'
        // ]);

        // Gallery::create([
        //     'image' => 'gallery-images/J5hcteUdQgljhotkxNMJVy4AYiCRT3IPDtK2qYaA.jpg',
        //     'description' => 'Gallery 3'
        // ]);




        // Post::factory(20)->create();

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
