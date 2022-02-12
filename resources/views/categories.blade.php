@extends('layouts.main')
@section('container')
    <div class="container">
        <h1>Categories </h1>
        <div class="container">
            <div class="row">
                @foreach ( $categories as $category )
                <div class="col-md-4">
                    <a href="/categories/{{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center" style="background-color: 0,0,0,0.3">
                                <h5 class="card-title text-center">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @foreach ($categories as $category)
            <ul>
                <li>
                    <h2>
                        <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                    </h2>
                </li>
            </ul>
            
        @endforeach
    
    </div>    

@endsection