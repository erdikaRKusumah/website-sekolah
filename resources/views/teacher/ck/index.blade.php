@include('layouts.main.header')
@include('layouts.sidebar.teacher')
<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                            <h3 class="card-title"><i class="fas fa-clipboard-list"></i> {{ $title }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                    data-target="#modal-settings">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal settings  -->
                        <div class="modal fade" id="modal-settings">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Kompetensi Dasar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('ck.create') }}" method="GET">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="subject_id" class="col-sm-3 col-form-label">Mata
                                                    Pelajaran</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="subject_id"
                                                        style="width: 100%;" required>
                                                        <option value="">-- Pilih Mapel --</option>
                                                        @foreach ($data_mapel_diampu as $mapel)
                                                            <option value="{{ $mapel->id }}">
                                                                {{ $mapel->subject_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="class_level" class="col-sm-3 col-form-label">Tingkatan
                                                    Kelas</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="class_level" style="width: 100%;"
                                                        required onchange="this.form.submit();">
                                                        <option value="">-- Pilih Tingkatan Kelas --</option>
                                                        @foreach ($tingkatan_kelas_diampu as $kelas)
                                                            <option value="{{ $kelas->class_level }}">
                                                                {{ $kelas->class_level }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal settings -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-valign-middle table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tipe</th>
                                            <th>Tingkatan Kelas</th>
                                            <th>Semester</th>
                                            <th>Kode</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($data_kd as $kd)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $kd->subject->subject_name }}</td>
                                                <td>
                                                    @if ($kd->tipe == 1)
                                                        Tujuan Pembelajaran
                                                    @elseif($kd->tipe == 2)
                                                        Lingkup Materi
                                                    @elseif($kd->tipe == 3)
                                                        Capaian Pembelajaran
                                                    @endif
                                                </td>
                                                <td>{{ $kd->class_level }}</td>
                                                <td>
                                                    @if ($kd->semester == 1)
                                                        Ganjil
                                                    @elseif($kd->semester == 2)
                                                        Genap
                                                    @endif
                                                </td>
                                                <td>{{ $kd->kode_kd }}</td>
                                                <td>{{ $kd->kompetensi_dasar }}</td>
                                                <td>
                                                    <form action="{{ route('ck.destroy', $kd->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-warning btn-sm mt-1"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit{{ $kd->id }}">
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
                                            <div class="modal fade" id="modal-edit{{ $kd->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('ck.update', $kd->id) }}"
                                                            method="POST">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="subject"
                                                                        class="col-sm-3 col-form-label">Mata
                                                                        Pelajaran</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="subject"
                                                                            value="{{ $kd->subject->subject_name }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="kode_kd"
                                                                        class="col-sm-3 col-form-label">Kode</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="kode_kd"
                                                                            value="{{ $kd->kode_kd }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="kompetensi_dasar"
                                                                        class="col-sm-3 col-form-label">Kompetensi
                                                                        Dasar</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea name="kompetensi_dasar" class="form-control" rows="2">{{ $kd->kompetensi_dasar }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="ringkasan_kompetensi"
                                                                        class="col-sm-3 col-form-label">Ringkasan
                                                                        Kompetensi</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea name="ringkasan_kompetensi" class="form-control" rows="2">{{ $kd->ringkasan_kompetensi }}</textarea>
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
