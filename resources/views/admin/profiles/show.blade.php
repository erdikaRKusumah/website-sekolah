@extends('admin.layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="/admin/profiles">Profiles Sekolah</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Berita</li>
                <li class="breadcrumb-item active">Show</li>
            </ol> --}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h1 class="mt-3 ml-3">{{ $profile->title }}</h1>
                        <div class="card-body">
                            <div class="col-4" style="max-height: 350px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $profile->image) }}" class="img-fluid mt-3">
                            </div>
                            <article class="col-6 my-3 fs-5">
                                {!! $profile->body !!}

                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
