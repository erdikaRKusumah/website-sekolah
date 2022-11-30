@extends('admin.layouts.main')

@section('container')
@section('subjects', 'active')
@section('dataMaster', 'active')
@section('akademik', 'menu-is-opening menu-open')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $title }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-book"></i> {{ $title }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                data-target="#modal-tambah">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                data-target="#modal-import">
                                <i class="fas fa-upload"></i>
                            </button>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="col-4 alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="col-4 alert alert-danger alert-dismissible fade show m-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Modal tambah  -->
                    <div class="modal fade" id="modal-tambah">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah {{ $title }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('subjects.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="tapel_id" value="{{ $tapel->id }}">
                                        <div class="form-group row">
                                            <label for="subject_name" class="col-sm-3 col-form-label">Nama Mata
                                                Pelajaran</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="subject_name"
                                                    name="subject_name" placeholder="Nama Mata Pelajaran"
                                                    value="{{ old('subject_name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="subject_description"
                                                class="col-sm-3 col-form-label">Ringkasan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="subject_description"
                                                    name="subject_description" placeholder="Ringkasan subject"
                                                    value="{{ old('subject_description') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-end">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal tambah -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-valign-middle table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Ringkas (Singkatan)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($subjects as $subject)
                                        <?php $no++; ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $subject->subject_name }}</td>
                                            <td>{{ $subject->subject_description }}</td>
                                            <td>
                                                <form action="{{ route('subjects.destroy', $subject->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-warning btn-sm mt-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-edit{{ $subject->id }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger btn-sm mt-1"
                                                        onclick="return confirm('Hapus {{ $title }} ?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal edit  -->
                                        <div class="modal fade" id="modal-edit{{ $subject->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{ $title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('subjects.update', $subject->id) }}"
                                                        method="POST">
                                                        {{ method_field('PATCH') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="subject_name"
                                                                    class="col-sm-3 col-form-label">Nama Mata
                                                                    Pelajaran</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        id="subject_name" name="subject_name"
                                                                        value="{{ $subject->subject_name }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="subject_description"
                                                                    class="col-sm-3 col-form-label">Ringkasan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        id="subject_description"
                                                                        name="subject_description"
                                                                        value="{{ $subject->subject_description }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-end">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal edit -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
