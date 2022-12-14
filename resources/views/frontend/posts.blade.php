@extends('layouts.main')
@section('container')
    {{-- <div class="container">
        <h1 class="mb-3 text-center">{{ $title }}</h1>

        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/posts">

                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>

        </div>

        @if ($posts->count())
            <div class="card mb-3">
                @if ($posts[0]->image)
                    <div style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                        alt="{{ $posts[0]->category->name }}" class="img-fluid mt-3">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title"><a href="/post/{{ $posts[0]->slug }}"
                            class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>

                    <p>
                        <small class="text-muted">
                            By <a href="/posts?author={{ $posts[0]->author->username }}"
                                class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                                href="/posts?category={{ $posts[0]->category->slug }}"
                                class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>

                    <p class="card-text">{{ $posts[0]->excerpt }}</p>

                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

                </div>
            </div>


            <div class="container">
                <div class="row">
                    @foreach ($posts->skip(1) as $post)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="position-absolute px-3 py-2 text-white"
                                    style="background-color: rgba(0, 0, 0, 0.2)">
                                    <a href="/posts?category={{ $post->category->slug }}"
                                        class="text-white text-decoration-none">{{ $post->category->name }}</a>
                                </div>

                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                        class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                        class="card-img-top" alt="{{ $post->category->name }}">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>

                                    <p>
                                        <small class="text-muted">
                                            By <a href="/posts?author={{ $post->author->username }}"
                                                class="text-decoration-none">{{ $post->author->name }}</a>{{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </p>

                                    <p class="card-text">{{ $post->excerpt }}</p>
                                    <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
@else
    <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection --}}

    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach ($posts as $post)
                        <div class="blog-single-item">
                            <div class="blog-img_block">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                    alt="{{ $post->category->name }}">
                                <div class="blog-date">
                                    <span>{{ $post->created_at->toDateString() }}</span>
                                </div>
                            </div>
                            <div class="blog-tiltle_block">
                                <h4><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                <h6> <a href="#"><i class="fa fa-user"
                                            aria-hidden="true"></i><span>{{ $post->user->admin->full_name }}</span> </a> |
                                    <a href="/posts?category={{ $post->category->slug }}"><i class="fa fa-tags"
                                            aria-hidden="true"></i><span>{{ $post->category->name }}</span></a></h6>
                                {{ $post->excerpt }}
                                <div class="blog-icons">
                                    <div class="blog-share_block">
                                        <a href="/post/{{ $post->slug }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <form action="/posts" method="get">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                        @endif
                        <input type="text" name="search" placeholder="Search" class="blog-search"
                            value="{{ request('search') }}">
                        {{-- <input type="text" name="keyword" placeholder="Search" class="blog-search" required>
                        <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button> --}}
                        <button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
                    </form>
                    <div class="blog-category_block">
                        <h3>Kategori</h3>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="/posts?category={{ $category->slug }}">{{ $category->name }}<i
                                            class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                {{ $posts->links() }}
            </div>
        </div>

    </section>
@endsection
