@extends('layouts.main')
@section('container')
    <div class="container">
        <h1>Categories </h1>
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