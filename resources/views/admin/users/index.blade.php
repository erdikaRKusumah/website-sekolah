@extends('admin.layouts.main')

@section('container')
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
                            <h3 class="card-title"><i class="fas fa-user-friends"></i> {{ $title }}</h3>
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
                                        <h5 class="modal-title">Tambah {{ $title }} Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('users.store') }}" method="POST">
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
                                                <label for="gender" class="col-sm-3 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-9 pt-1">
                                                    <label class="radio-inline mr-3"><input type="radio" name="gender"
                                                            value="L" @if (old('gender') == 'L') checked @endif
                                                            required>
                                                        Laki-Laki</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="gender"
                                                            value="P" @if (old('gender') == 'P') checked @endif
                                                            required>
                                                        Perempuan</label>
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
                                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_number" class="col-sm-3 col-form-label">Nomor
                                                    HP</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="phone_number"
                                                        name="phone_number" placeholder="Nomor HP"
                                                        value="{{ old('phone_number') }}">
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
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($users as $user)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    @if ($user->role == 1)
                                                        {{ $user->admin->full_name }}
                                                    @elseif($user->role == 2)
                                                        {{ $user->teacher->full_name }}
                                                    @elseif($user->role == 3)
                                                        {{ $user->student->full_name }}
                                                    @endif
                                                </td>
                                                <td>{{ $user->username }}</td>
                                                <td>
                                                    @if ($user->role == 1)
                                                        Administrator
                                                    @elseif($user->role == 2)
                                                        Guru
                                                    @elseif($user->role == 3)
                                                        Siswa
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        data-toggle="modal" data-target="#modal-edit{{ $user->id }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal edit  -->
                                            <div class="modal fade" id="modal-edit{{ $user->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('users.update', $user->id) }}"
                                                            method="POST">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="full_name"
                                                                        class="col-sm-3 col-form-label">Nama
                                                                        Lengkap</label>
                                                                    <div class="col-sm-9">
                                                                        @if ($user->role == 1)
                                                                            <input type="text" class="form-control"
                                                                                id="full_name" name="full_name"
                                                                                value="{{ $user->admin->full_name }}"
                                                                                readonly>
                                                                        @elseif($user->role == 2)
                                                                            <input type="text" class="form-control"
                                                                                id="full_name" name="full_name"
                                                                                value="{{ $user->teacher->full_name }}"
                                                                                readonly>
                                                                        @elseif($user->role == 3)
                                                                            <input type="text" class="form-control"
                                                                                id="full_name" name="full_name"
                                                                                value="{{ $user->student->full_name }}"
                                                                                readonly>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="username"
                                                                        class="col-sm-3 col-form-label">Username</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="username" name="username"
                                                                            value="{{ $user->username }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="password"
                                                                        class="col-sm-3 col-form-label">Password</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="password"
                                                                            placeholder="Password Baru">
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
@endsection
