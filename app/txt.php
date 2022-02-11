<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur reprehenderit dicta tempora velit magnam sunt architecto distinctio quisquam illo animi voluptas adipisci, voluptatibus dolorum maiores.</p> <p>Libero repellendus deleniti hic voluptas consequuntur saepe laudantium vero modi minima natus, doloremque odio dolorem sed laboriosam eos quidem. Magnam sed corrupti expedita eaque, aliquam earum ab quasi blanditiis nisi maxime tempore aperiam voluptate, enim impedit facilis porro quas odit, quos sequi deleniti! Quasi repudiandae eos ea nesciunt soluta libero nostrum velit, quos cumque, suscipit inventore porro rerum sed nemo harum. Dicta repellendus eveniet quas itaque accusantium quis dolore tempora modi. Rem aliquam quibusdam ea.</p>

Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum obcaecati in nesciunt maiores sed mollitia tempore. Maxime, alias aliquam. Delectus adipisci dolor molestias nulla, consectetur corporis praesentium dolorum quod possimus, ad soluta minima! Possimus, ducimus voluptas nemo quasi temporibus rerum ullam dolore consectetur ex perspiciatis optio! Fuga, itaque quisquam! Ipsum.


Category::create([
    'name' => 'Personal',
    'slug' => 'personal'
])

Post::create([
    'title' => 'Judul Ke Tiga',
    'category_id' => '2',
    'slug' => 'judul-ke-tiga',
    'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur reprehenderit dicta tempora velit magnam sunt architecto distinctio quisquam illo animi voluptas adipisci, voluptatibus dolorum maiores',
    'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur reprehenderit dicta tempora velit magnam sunt architecto distinctio quisquam illo animi voluptas adipisci, voluptatibus dolorum maiores.</p> <p>Libero repellendus deleniti hic voluptas consequuntur saepe laudantium vero modi minima natus, doloremque odio dolorem sed laboriosam eos quidem. Magnam sed corrupti expedita eaque, aliquam earum ab quasi blanditiis nisi maxime tempore aperiam voluptate, enim impedit facilis porro quas odit, quos sequi deleniti! Quasi repudiandae eos ea nesciunt soluta libero nostrum velit, quos cumque, suscipit inventore porro rerum sed nemo harum. Dicta repellendus eveniet quas itaque accusantium quis dolore tempora modi. Rem aliquam quibusdam ea.</p><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum obcaecati in nesciunt maiores sed mollitia tempore. Maxime, alias aliquam. Delectus adipisci dolor molestias nulla, consectetur corporis praesentium dolorum quod possimus, ad soluta minima! Possimus, ducimus voluptas nemo quasi temporibus rerum ullam dolore consectetur ex perspiciatis optio! Fuga, itaque quisquam! Ipsum.</p>'
])

Post::find(3)->update([
    'title' => 'Judul ke tiga Berubah'    
])

Post::where('title', 'judul ke tiga Berubah')->update([
    'excerpt' => 'hehe Berubah'
])