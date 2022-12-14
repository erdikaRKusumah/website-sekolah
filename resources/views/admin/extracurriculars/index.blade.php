@include('layouts.main.header')
@include('layouts.sidebar.admin')
<div class="content-wrapper">
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ekstrakurikuler</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Berita</li>
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
                        @if (session()->has('success'))
                            <div class="col-4 alert alert-success alert-dismissible fade show m-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            <a href="/admin/extracurriculars/create" class="btn btn-primary"><span
                                    data-feather="plus"></span>
                                Tambah Ekstrakulikuler</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="col-4">Image</th>
                                        <th class="col-4">Ekstrakulikuler</th>
                                        <th class="col-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($extracurriculars as $extracurricular)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div style="max-height: 150px; max-width:150px; overflow: hidden;">
                                                    <img src="{{ asset('storage/' . $extracurricular->image) }}"
                                                        class="img-fluid">
                                                </div>
                                            </td>
                                            <td>{{ $extracurricular->name }}</td>
                                            <td class="text-center">
                                                <a href="/admin/extracurriculars/{{ $extracurricular->slug }}/edit"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                                                <form action="/admin/extracurriculars/{{ $extracurricular->slug }}"
                                                    method="post" class="d-inline">
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

</div>
@include('layouts.main.footer')
