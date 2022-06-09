@extends('dashboard.layouts.main')

@section('container')
    <div class="row my-3">
        <div class="col-lg-8">
            <h2>{{ $sejarah_singkat->title }}</h2>

            <h4>"{{ $sejarah_singkat->sub_title }}"</h4>
            
            <article class="my-3 fs-5">
                {!! $sejarah_singkat->body !!}

            </article>
            

        </div>
    </div>


@endsection