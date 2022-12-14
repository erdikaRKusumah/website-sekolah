{{-- @extends('admin.layouts.main')

@section('container')
@section('students', 'active')
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
                            <h3 class="card-title"><i class="fas fa-users"></i> {{ $title }}</h3>
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
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah {{ $title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('students.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="full_name" class="col-sm-3 col-form-label">Nama
                                                    Siswa</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name" placeholder="Nama Siswa"
                                                        value="{{ old('full_name') }}">
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
                                                <label for="registration_type" class="col-sm-3 col-form-label">Jenis
                                                    Pendaftaran</label>
                                                <div class="col-sm-3 pt-1">
                                                    <label class="form-check-label mr-3"><input type="radio"
                                                            name="registration_type"
                                                            onchange='CheckPendaftaran(this.value);' value="1"
                                                            @if (old('registration_type') == '1') checked @endif required>
                                                        Siswa Baru</label>
                                                    <label class="form-check-label mr-3"><input type="radio"
                                                            name="registration_type"
                                                            onchange='CheckPendaftaran(this.value);' value="2"
                                                            @if (old('registration_type') == '2') checked @endif required>
                                                        Pindahan</label>
                                                </div>
                                                <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" id="kelas" required>
                                                        <option value="">-- Pilih Kelas --</option>
                                                        <option value="" disabled>Silahkan pilih jenis
                                                            pendaftaran</option>
                                                    </select>

                                                    <select class="form-control" id="kelas_bawah" style='display:none;'>
                                                        <option value="">-- Pilih Kelas --</option>
                                                        @foreach ($data_kelas_terendah as $kelas_rendah)
                                                            <option value="{{ $kelas_rendah->id }}">
                                                                {{ $kelas_rendah->class_name }}</option>
                                                        @endforeach
                                                    </select>

                                                    <select class="form-control" id="kelas_all" style='display:none;'>
                                                        <option value="">-- Pilih Kelas --</option>
                                                        @foreach ($data_kelas_all as $kelas_all)
                                                            <option value="{{ $kelas_all->id }}">
                                                                {{ $kelas_all->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="nis"
                                                        name="nis" placeholder="NIS" value="{{ old('nis') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="birth_place" class="col-sm-3 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="birth_place"
                                                        name="birth_place" placeholder="Tempat Lahir"
                                                        value="{{ old('birth_place') }}">
                                                </div>
                                                <label for="birth_date" class="col-sm-2 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="birth_date"
                                                        name="birth_date" value="{{ old('birth_date') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="religion" class="col-sm-3 col-form-label">Agama</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="religion" required>
                                                        <option value="">-- Pilih Agama --</option>
                                                        <option value="1">Islam</option>
                                                        <option value="2">Protestan</option>
                                                        <option value="3">Katolik</option>
                                                        <option value="4">Hindu</option>
                                                        <option value="5">Budha</option>
                                                        <option value="6">Khonghucu</option>
                                                        <option value="7">Kepercayaan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="address" name="address" placeholder="Alamat lengkap">{{ old('address') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_number" class="col-sm-3 col-form-label">Nomor HP
                                                    <small><i>(opsional)</i></small></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="phone_number"
                                                        name="phone_number" placeholder="Nomor HP"
                                                        value="{{ old('phone_number') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="father_name" class="col-sm-3 col-form-label">Nama
                                                    Ayah</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="father_name"
                                                        name="father_name" placeholder="Nama Ayah"
                                                        value="{{ old('father_name') }}">
                                                </div>
                                                <label for="mother_name" class="col-sm-2 col-form-label">Nama Ibu</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="mother_name"
                                                        name="mother_name" placeholder="Nama Ibu"
                                                        value="{{ old('mother_name') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="father_job" class="col-sm-3 col-form-label">Pekerjaan
                                                    Ayah</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="father_job"
                                                        name="father_job" placeholder="Pekerjaan Ayah"
                                                        value="{{ old('father_job') }}">
                                                </div>
                                                <label for="mother_job" class="col-sm-2 col-form-label">Pekerjaan
                                                    Ibu</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="mother_job"
                                                        name="mother_job" placeholder="Pekerjaan Ibu"
                                                        value="{{ old('mother_job') }}">
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
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Lahir</th>
                                            <th>L/P</th>
                                            <th>Kelas Saat Ini</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($students as $student)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $student->nis }}</td>
                                                <td>{{ $student->full_name }}</td>
                                                <td>{{ $student->birth_date }}</td>
                                                <td>{{ $student->gender }}</td>
                                                <td>
                                                    @if ($student->kelas_id == null)
                                                        <span class="badge light badge-warning">Belum masuk anggota
                                                            kelas</span>
                                                    @else
                                                        {{ $student->kelas->class_name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-warning btn-sm mt-1"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit{{ $student->id }}">
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
                                            <div class="modal fade" id="modal-edit{{ $student->id }}">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('students.update', $student->id) }}"
                                                            method="POST">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="full_name"
                                                                        class="col-sm-3 col-form-label">Nama Siswa</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="full_name" name="full_name"
                                                                            placeholder="Nama Siswa"
                                                                            value="{{ $student->full_name }}" readonly>
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
                                                                                @if ($student->gender == 'L') checked @endif
                                                                                required> Laki-Laki</label>
                                                                        <label class="form-check-label mr-3"><input
                                                                                type="radio" name="gender"
                                                                                value="P"
                                                                                @if ($student->gender == 'P') checked @endif
                                                                                required> Perempuan</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="nis"
                                                                        class="col-sm-3 col-form-label">NIS</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="number" class="form-control"
                                                                            id="nis" name="nis"
                                                                            placeholder="NIS"
                                                                            value="{{ $student->nis }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="birth_place"
                                                                        class="col-sm-3 col-form-label">Tempat
                                                                        Lahir</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control"
                                                                            id="birth_place" name="birth_place"
                                                                            placeholder="Tempat Lahir"
                                                                            value="{{ $student->birth_place }}">
                                                                    </div>
                                                                    <label for="birth_date"
                                                                        class="col-sm-2 col-form-label">Tanggal
                                                                        Lahir</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="date" class="form-control"
                                                                            id="birth_date" name="birth_date"
                                                                            value="{{ $student->birth_date }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="religion"
                                                                        class="col-sm-3 col-form-label">Agama</label>
                                                                    <div class="col-sm-3">
                                                                        <select class="form-control" name="religion"
                                                                            required>
                                                                            <option value="{{ $student->religion }}"
                                                                                selected>
                                                                                @if ($student->religion == 1)
                                                                                    Islam
                                                                                @elseif($student->religion == 2)
                                                                                    Protestan
                                                                                @elseif($student->religion == 3)
                                                                                    Katolik
                                                                                @elseif($student->religion == 4)
                                                                                    Hindu
                                                                                @elseif($student->religion == 5)
                                                                                    Budha
                                                                                @elseif($student->religion == 6)
                                                                                    Khonghucu
                                                                                @elseif($student->religion == 7)
                                                                                    Kepercayaan
                                                                                @endif
                                                                            </option>
                                                                            <option value="1">Islam</option>
                                                                            <option value="2">Protestan</option>
                                                                            <option value="3">Katolik</option>
                                                                            <option value="4">Hindu</option>
                                                                            <option value="5">Budha</option>
                                                                            <option value="6">Khonghucu</option>
                                                                            <option value="7">Kepercayaan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="address"
                                                                        class="col-sm-3 col-form-label">Alamat</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" id="address" name="address" placeholder="Alamat lengkap">{{ $student->address }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="phone_number"
                                                                        class="col-sm-3 col-form-label">Nomor HP
                                                                        <small><i>(opsional)</i></small></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control"
                                                                            id="phone_number" name="phone_number"
                                                                            placeholder="Nomor HP"
                                                                            value="{{ $student->phone_number }}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="father_name"
                                                                        class="col-sm-3 col-form-label">Nama Ayah</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control"
                                                                            id="father_name" name="father_name"
                                                                            placeholder="Nama Ayah"
                                                                            value="{{ $student->father_name }}">
                                                                    </div>
                                                                    <label for="mother_name"
                                                                        class="col-sm-2 col-form-label">Nama Ibu</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control"
                                                                            id="mother_name" name="mother_name"
                                                                            placeholder="Nama Ibu"
                                                                            value="{{ $student->mother_name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="father_job"
                                                                        class="col-sm-3 col-form-label">Pekerjaan
                                                                        Ayah</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control"
                                                                            id="father_job" name="father_job"
                                                                            placeholder="Pekerjaan Ayah"
                                                                            value="{{ $student->father_job }}">
                                                                    </div>
                                                                    <label for="mother_job"
                                                                        class="col-sm-2 col-form-label">Pekerjaan
                                                                        Ibu</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control"
                                                                            id="mother_job" name="mother_job"
                                                                            placeholder="Pekerjaan Ibu"
                                                                            value="{{ $student->mother_job }}">
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
@include('layouts.main.footer')

