@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Visi dan Misi</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/visions/create" class="btn btn-primary mb-3">Create new post</a>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col" class="text-center">Visi dan Misi</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($visions as $vision)
                <tr>
                    <td><article>{{ $vision->vision }}</article></td>
                    <td>
                        <a href="/dashboard/visions/{{ $vision->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/visions/{{ $vision->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection