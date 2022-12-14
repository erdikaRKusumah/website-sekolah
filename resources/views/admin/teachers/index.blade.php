{{-- @extends('admin.layouts.main')

@section('container')
@section('teachers', 'active')
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
                                    <form action="{{ route('teachers.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="full_name" class="col-sm-3 col-form-label">Nama
                                                    Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name" placeholder="Nama Lengkap"
                                                        value="{{ old('full_name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="title" class="col-sm-3 col-form-label">Gelar</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="title"
                                                        name="title" placeholder="Gelar" value="{{ old('title') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nip" class="col-sm-3 col-form-label">NIP
                                                    <small><i>(opsional)</i></small></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="nip"
                                                        name="nip" placeholder="NIP" value="{{ old('nip') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-3 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-9 pt-1">
                                                    <label class="form-check-label mr-3"><input type="radio"
                                                            name="gender" value="L"
                                                            @if (old('gender') == 'L') checked @endif required>
                                                        Laki-Laki</label>
                                                    <label class="form-check-label mr-3"><input type="radio"
                                                            name="gender" value="P"
                                                            @if (old('gender') == 'P') checked @endif required>
                                                        Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="birth_place" class="col-sm-3 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="birth_place"
                                                        name="birth_place" placeholder="Tempat Lahir"
                                                        value="{{ old('birth_place') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="birth_date" class="col-sm-3 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="birth_date"
                                                        name="birth_date" value="{{ old('birth_date') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_number"
                                                    class="col-sm-3 col-form-label">No.HP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="phone_number"
                                                        name="phone_number" placeholder="No.HP"
                                                        value="{{ old('phone_number') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="address" name="address" placeholder="Alamat">{{ old('address') }}</textarea>
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
                                            <th>Nama Lengkap</th>
                                            <th>NIP</th>
                                            <th>Tempat Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($teachers as $teacher)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $teacher->full_name }}, {{ $teacher->title }}</td>
                                                <td>{{ $teacher->nip }}</td>
                                                <td>{{ $teacher->birth_place }}</td>
                                                <td>
                                                    @if ($teacher->gender == 'L')
                                                        Laki-Laki
                                                    @else
                                                        Perempuan
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('teachers.destroy', $teacher->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-warning btn-sm mt-1"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit{{ $teacher->id }}">
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
                                            <div class="modal fade" id="modal-edit{{ $teacher->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('teachers.update', $teacher->id) }}"
                                                            method="POST">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="full_name"
                                                                        class="col-sm-3 col-form-label">Nama
                                                                        Lengkap</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="full_name" name="full_name"
                                                                            value="{{ $teacher->full_name }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="title"
                                                                        class="col-sm-3 col-form-label">Gelar</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="title" name="title"
                                                                            value="{{ $teacher->title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="nip"
                                                                        class="col-sm-3 col-form-label">NIP
                                                                        <small><i>(opsional)</i></small></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control"
                                                                            id="nip" name="nip"
                                                                            value="{{ $teacher->nip }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="gender"
                                                                        class="col-sm-3 col-form-label">Jenis
                                                                        Kelamin</label>
                                                                    <div class="col-sm-9 pt-1">
                                                                        <label class="form-check-label mr-3"><input
                                                                                type="radio" name="gender"
                                                                                value="L"
                                                                                @if ($teacher->gender == 'L') checked @endif
                                                                                required> Laki-Laki</label>
                                                                        <label class="form-check-label mr-3"><input
                                                                                type="radio" name="gender"
                                                                                value="P"
                                                                                @if ($teacher->gender == 'P') checked @endif
                                                                                required> Perempuan</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="birth_place"
                                                                        class="col-sm-3 col-form-label">Tempat
                                                                        Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="birth_place" name="birth_place"
                                                                            value="{{ $teacher->birth_place }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="birth_date"
                                                                        class="col-sm-3 col-form-label">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" class="form-control"
                                                                            id="birth_date" name="birth_date"
                                                                            value="{{ $teacher->birth_date }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="phone_number"
                                                                        class="col-sm-3 col-form-label">No.HP</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="input" class="form-control"
                                                                            id="phone_number" name="phone_number"
                                                                            value="{{ $teacher->phone_number }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="address"
                                                                        class="col-sm-3 col-form-label">Alamat</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" id="address" name="address">{{ $teacher->address }}</textarea>
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
