@extends('layouts.mainProfile')
@section('container')
    <section>

        <div class="row">
            <!-- Tab panes -->
            <!-- Main content -->
            <section class="content mb-5">

                <!-- ./row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-tie"></i> {{ $title }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="callout callout-info">
                                    <form action="{{ route('classes.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tahun Pelajaran</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="tapel_id" style="width: 100%;"
                                                    required onchange="this.form.submit();">
                                                    <option value="">-- Pilih Tahun Pelajaran --</option>
                                                    @foreach ($data_tapel as $tapel)
                                                        <option value="{{ $tapel->id }}">{{ $tapel->school_year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </section>
            {{-- <section class="content">

                <!-- ./row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-cog"></i> {{ $title }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group row callout callout-info mx-1">
                                    <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <form action="{{ route('kelas.showKelas') }}" method="POST">
                                            @csrf
                                            <select class="form-control select2" name="tapel_id" style="width: 100%;"
                                                required onchange="this.form.submit();">
                                                <option value="" disabled> -- Pilih Tahun Pelajaran --</option>
                                                <option value="" selected>{{ $tapel->school_years }}</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
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
                                                            <i class="fas fa-list"></i> {{ $kelas->jumlah_anggota }}
                                                            Siswa
                                                        </a>
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


            </section> --}}
            <!-- /.content -->
        </div>

    </section>
    </section>
@endsection
