@extends('admin.layouts.main')

@section('container')
@section('posts', 'active')
@section('berita', 'active')
@section('main', 'menu-is-opening menu-open')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/admin/posts/create" class="btn btn-primary"><span data-feather="plus"></span>
                            Tambah Informasi</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td class="text-center">
                                            <a href="/admin/posts/{{ $post->slug }}" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-eye fa-fw"></i></a>
                                            <a href="/admin/posts/{{ $post->slug }}/edit"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                                            <form action="/admin/posts/{{ $post->slug }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="fas fa-trash fa-fw"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.container-fluid -->
@endsection
