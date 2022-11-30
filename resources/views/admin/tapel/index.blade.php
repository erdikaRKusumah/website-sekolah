@extends('admin.layouts.main')

@section('container')
@section('tapel', 'active')
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
                        <h3 class="card-title"><i class="fas fa-calendar-week"></i> {{ $title }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                data-target="#modal-tambah">
                                <i class="fas fa-plus"></i>
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
                                <form action="/admin/tapel" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="school_year" class="col-sm-3 col-form-label">Tahun
                                                Pelajaran</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="school_year"
                                                    name="school_year" placeholder="Tahun Pelajaran"
                                                    value="{{ old('school_year') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="semester" class="col-sm-3 col-form-label">Semester</label>
                                            <div class="col-sm-9 pt-1">
                                                <label class="radio-inline mr-3"><input type="radio" name="semester"
                                                        value="1" @if (old('semester') == '1') checked @endif
                                                        required>
                                                    Semester Ganjil</label>
                                                <label class="radio-inline mr-3"><input type="radio" name="semester"
                                                        value="2" @if (old('semester') == '2') checked @endif
                                                        required>
                                                    Semester Genap</label>
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
                                        <th>Tahun Pelajaran</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($data_tapel as $tapel)
                                        <?php $no++; ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $tapel->school_year }}</td>
                                            <td>
                                                @if ($tapel->semester == 1)
                                                    Semester Ganjil
                                                @else
                                                    Semester Genap
                                                @endif
                                            </td>
                                        </tr>
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
