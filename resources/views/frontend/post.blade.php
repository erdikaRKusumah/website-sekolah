@extends('layouts.main')
@section('container')
    {{-- <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>{{ $post->title }}</h2>
                    <p>By <a href="/posts?author={{ $post->author->username }}"
                            class="text-decoration-none">{{ $post->author->name }}</a> in <a
                            href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </p>

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                    @endif

                    <article class="my-3 fs-5">
                        {!! $post->body !!}

                    </article>
                    <a href="/posts" class="d-block mt-3">Kembali</a>


                </div>
            </div>
        </div>
    </section> --}}
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-single-item">
                        <div class="blog-img_block">
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                alt="{{ $post->category->name }}">
                            <div class="blog-date">
                                <span>{{ $post->created_at->toDateString() }}</span>
                            </div>
                        </div>
                        <div class="blog-tiltle_block">
                            <h4><a href="{{ $post->slug }}">{{ $post->title }}</a></h4>
                            <h6> <a href="#"><i class="fa fa-user"
                                        aria-hidden="true"></i><span>{{ $post->author->name }}</span> </a> | <a
                                    href="#"><i class="fa fa-tags"
                                        aria-hidden="true"></i><span>{{ $post->category->name }}</span></a></h6>
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="/posts" method="get">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <input type="text" name="keyword" placeholder="Search" class="blog-search"
                            value="{{ request('search') }}">

                        <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
                    </form>
                    <div class="blog-category_block">
                        <h3>Kategori</h3>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="/categories/{{ $category->slug }}">{{ $category->name }}<i
                                            class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="berita-featured_post">
                    <h3>Populer</h3>
                    <?php foreach ($populer->result() as $row) :?>
                    <div class="blog-featured-img_block">
                        <img width="35%" src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="blog-featured-img">
                        <h5><a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>"><?php echo limit_words($row->tulisan_judul, 3) . '...'; ?></a></h5>
                        <p><?php echo limit_words($row->tulisan_isi, 5) . '...'; ?></p>
                    </div>
                    <hr>
                    <?php endforeach;?>
                </div> --}}

                </div>
            </div>
        </div>
    </section>
@endsection
