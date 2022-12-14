@include('layouts.main.header')
@include('layouts.sidebar.admin')

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
                            <h3 class="card-title"><i class="fas fa-check-square"></i> {{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <form action="{{ route('pengelolaannilai.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kelas</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="kelas_id" style="width: 100%;"
                                                required onchange="this.form.submit();">
                                                <option value="" disabled>-- Pilih Kelas --</option>
                                                @foreach ($data_kelas->sortBy('class_level') as $kls)
                                                    <option value="{{ $kls->id }}"
                                                        @if ($kls->id == $kelas->id) selected @endif>
                                                        {{ $kls->class_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">No</th>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama Siswa</th>
                                            <th class="text-center" style="width: 5%;">L/P</th>
                                            <th class="text-center" style="width: 15%;">Lihat Nilai Akhir Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no_urut = 0; ?>
                                        @foreach ($data_anggota_kelas->sortBy('student.full_name') as $anggota_kelas)
                                            <?php $no_urut++; ?>
                                            <tr>
                                                <td class="text-center">{{ $no_urut }}</td>
                                                <td class="text-center">{{ $anggota_kelas->student->nis }}</td>
                                                <td>{{ $anggota_kelas->student->full_name }}</td>
                                                <td class="text-center">{{ $anggota_kelas->student->gender }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-sm mt-1"
                                                        data-toggle="modal"
                                                        data-target="#modal-show{{ $anggota_kelas->id }}">
                                                        <i class="fas fa-eye"></i> Lihat Nilai
                                                    </button>
                                                    <!-- Modal Show -->
                                                    <div class="modal fade text-left"
                                                        id="modal-show{{ $anggota_kelas->id }}">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Nilai Akhir Semester Siswa
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Header Info  -->
                                                                    <div class="row">
                                                                        <div class="col-sm-2"><strong>Nama
                                                                                Sekolah</strong></div>
                                                                        <div class="col-sm-6"><strong>:
                                                                                SMPN 1 CILAMAYA WETAN</strong>
                                                                        </div>
                                                                        <div class="col-sm-2"><strong>Kelas</strong>
                                                                        </div>
                                                                        <div class="col-sm-2"><strong>:
                                                                                {{ $anggota_kelas->kelas->class_name }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-2"><strong>Alamat</strong>
                                                                        </div>
                                                                        <div class="col-sm-6"><strong>:
                                                                                Jalan Cilamaya Girang</strong></div>
                                                                        <div class="col-sm-2"><strong>Semester</strong>
                                                                        </div>
                                                                        <div class="col-sm-2"><strong>:
                                                                                {{ $anggota_kelas->kelas->tapel->semester }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-2"><strong>Nama</strong>
                                                                        </div>
                                                                        <div class="col-sm-6"><strong>:
                                                                                {{ $anggota_kelas->student->full_name }}</strong>
                                                                        </div>
                                                                        <div class="col-sm-2"><strong>Tahun
                                                                                Pelajaran</strong></div>
                                                                        <div class="col-sm-2"><strong>:
                                                                                {{ $anggota_kelas->kelas->tapel->school_year }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-2"><strong>Nomor Induk /
                                                                                NISN</strong></div>
                                                                        <div class="col-sm-10"><strong>:
                                                                                {{ $anggota_kelas->student->nis }} /
                                                                            </strong>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /. Header Info-->

                                                                    <!-- Tabel Nilai  -->
                                                                    <div class="row mt-3">
                                                                        <div class="col-sm-12 text-center mb-3 mt-2">
                                                                            <h3>
                                                                                LAPORAN HASIL BELAJAR
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-bordered">
                                                                                    <thead class="bg-info">
                                                                                        <tr>
                                                                                            <th class="text-center"
                                                                                                rowspan="2"
                                                                                                style="width: 5%;">No
                                                                                            </th>
                                                                                            <th class="text-center"
                                                                                                rowspan="2"
                                                                                                style="width: 50%;">Mata
                                                                                                Pelajaran</th>
                                                                                            <th class="text-center"
                                                                                                rowspan="2"
                                                                                                style="width: 5%;">KKM
                                                                                            </th>
                                                                                            <th class="text-center"
                                                                                                colspan="2"
                                                                                                style="width: 20%;">
                                                                                                Nilai Raport</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="text-center">
                                                                                                Nilai</th>
                                                                                            <th class="text-center">
                                                                                                Predikat</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php $no_a = 0; ?>
                                                                                        @foreach ($anggota_kelas->data_nilai->sortBy('pembelajaran.subject.mapping_mapel.nomor_urut') as $nilai)
                                                                                            <?php $no_a++; ?>
                                                                                            <tr class="bg-white">
                                                                                                <td
                                                                                                    class="text-center">
                                                                                                    {{ $no_a }}
                                                                                                </td>
                                                                                                <td>{{ $nilai->pembelajaran->subject->subject_name }}
                                                                                                </td>
                                                                                                <td
                                                                                                    class="text-center">
                                                                                                    {{ $nilai->kkm }}
                                                                                                </td>
                                                                                                <td
                                                                                                    class="text-center">
                                                                                                    {{ $nilai->nilai_sumatif }}
                                                                                                </td>
                                                                                                <td
                                                                                                    class="text-center">
                                                                                                    {{ $nilai->predikat }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                        <!-- End Nilai Kelompok A  -->
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /. Tabel Nilai  -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Show -->
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

@include('layouts.main.footer')
