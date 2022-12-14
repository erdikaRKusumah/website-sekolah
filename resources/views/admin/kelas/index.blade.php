{{-- @extends('admin.layouts.main')

@section('container')
@section('kelas', 'active')
@section('dataMaster', 'active')
@section('akademik', 'menu-is-opening menu-open') --}}
@include('layouts.main.header')
@include('layouts.sidebar.admin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="/admin/dashboard">Dashboard</a></li>
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
                            <h3 class="card-title"><i class="fas fa-user-tie"></i> {{ $title }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                    data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        {{-- @if (session()->has('success'))
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
                        @endif --}}

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
                                    <form action="/admin/kelas" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="school_year" class="col-sm-3 col-form-label">Tahun
                                                    Pelajaran</label>
                                                <div class="col-sm-9">
                                                    @if ($tapel->semester == 1)
                                                        <input type="text" name="school_year" class="form-control"
                                                            value="{{ $tapel->school_year }} Semester Ganjil" readonly>
                                                    @else
                                                        <input type="text" name="school_year" class="form-control"
                                                            value="{{ $tapel->school_year }} Semester Genap" readonly>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="class_level" class="col-sm-3 col-form-label">Tingkatan
                                                    Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="class_level"
                                                        name="class_level" placeholder="Tingkatan Kelas"
                                                        value="{{ old('class_level') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="class_name" class="col-sm-3 col-form-label">Nama
                                                    Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="class_name"
                                                        name="class_name" placeholder="Nama Kelas"
                                                        value="{{ old('class_name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="teacher_id" class="col-sm-3 col-form-label">Wali
                                                    Kelas</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="teacher_id"
                                                        style="width: 100%;" required>
                                                        <option value="">-- Pilih Wali Kelas --</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">
                                                                {{ $teacher->full_name }},
                                                                {{ $teacher->title }}</option>
                                                        @endforeach
                                                    </select>
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
                                            <th>Semester</th>
                                            <th>Tingkat</th>
                                            <th>Nama Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Jml Anggota</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($data_kelas as $kelas)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $kelas->tapel->school_year }}
                                                    @if ($kelas->tapel->semester == 1)
                                                        Ganjil
                                                    @else
                                                        Genap
                                                    @endif
                                                </td>
                                                <td>{{ $kelas->class_level }}</td>
                                                <td>{{ $kelas->class_name }}</td>
                                                <td>{{ $kelas->teacher->full_name }}, {{ $kelas->teacher->title }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('kelas.show', $kelas->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-list"></i> {{ $kelas->jumlah_anggota }} Siswa
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('kelas.destroy', $kelas->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-warning btn-sm mt-1"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit{{ $kelas->id }}">
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
                                            <div class="modal fade" id="modal-edit{{ $kelas->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('kelas.update', $kelas->id) }}"
                                                            method="POST">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="class_level"
                                                                        class="col-sm-3 col-form-label">Tingkatan
                                                                        Kelas</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="class_level" name="class_level"
                                                                            value="{{ $kelas->class_level }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="class_name"
                                                                        class="col-sm-3 col-form-label">Nama
                                                                        Kelas</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="class_name" name="class_name"
                                                                            value="{{ $kelas->class_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="teacher_id"
                                                                        class="col-sm-3 col-form-label">Wali
                                                                        Kelas</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control select2"
                                                                            name="teacher_id" style="width: 100%;"
                                                                            required>
                                                                            <option value="" disabled>-- Pilih
                                                                                Wali
                                                                                Kelas -- </option>
                                                                            @foreach ($teachers as $teacher)
                                                                                <option value="{{ $teacher->id }}"
                                                                                    @if ($teacher->id == $kelas->teacher->id) selected @endif>
                                                                                    {{ $teacher->full_name }},
                                                                                    {{ $teacher->title }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
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

</div>
@include('layouts.main.footer')
