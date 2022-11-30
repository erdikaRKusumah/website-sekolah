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
                            <h3 class="card-title"><i class="fas fa-paper-plane"></i> {{ $title }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="callout callout-info">
                                <form action="{{ route('kirimnilaiakhir.create') }}" method="GET">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="pembelajaran_id"
                                                style="width: 100%;" required onchange="this.form.submit();">
                                                <option value="" disabled>-- Pilih Pembelajaran --</option>
                                                @foreach ($data_pembelajaran as $mapel)
                                                    <option value="{{ $mapel->id }}"
                                                        @if ($mapel->id == $pembelajaran->id) selected @endif>
                                                        {{ $mapel->subject->subject_name }}
                                                        {{ $mapel->kelas->class_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Interval KKM -->
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h3 class="card-title"><i class="fas fa-greater-than-equal"></i> Interval Predikat
                                        Berdasarkan KKM</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th rowspan="2" class="text-center">KKM</th>
                                                    <th colspan="4" class="text-center">Predikat</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">D = Kurang </th>
                                                    <th class="text-center">C = Cukup </th>
                                                    <th class="text-center">B = Baik </th>
                                                    <th class="text-center">A = Sangat Baik </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">{{ $kkm->kkm }}</td>
                                                    <td class="text-center">
                                                        < {{ $kkm->predikat_c }}</td>
                                                    <td class="text-center">{{ $kkm->predikat_c }}
                                                        <= nilai < {{ $kkm->predikat_b }}</td>
                                                    <td class="text-center">{{ $kkm->predikat_b }}
                                                        <= nilai < {{ $kkm->predikat_a }}</td>
                                                    <td class="text-center">>= {{ $kkm->predikat_a }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Nilai -->

                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title"><i class="fas fa-file-invoice"></i> Nilai Raport</h3>
                                </div>
                                <form action="{{ route('kirimnilaiakhir.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th rowspan="2" class="text-center">No</th>
                                                        <th rowspan="2" class="text-center">Nama Siswa</th>
                                                        <th rowspan="2" class="text-center">KKM</th>
                                                        <th colspan="2" class="text-center">Nilai AKhir</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Nilai</th>
                                                        <th class="text-center">Predikat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" name="pembelajaran_id"
                                                        value="{{ $pembelajaran->id }}">
                                                    <input type="hidden" name="kkm" value="{{ $kkm->kkm }}">

                                                    <?php $no = 0; ?>
                                                    @foreach ($data_anggota_kelas->sortBy('student.full_name') as $anggota_kelas)
                                                        <?php $no++; ?>
                                                        <tr>
                                                            <td class="text-center" style="width: 100px;">
                                                                {{ $no }}</td>

                                                            <td>{{ $anggota_kelas->student->full_name }}</td>
                                                            <input type="hidden" name="class_group_id[]"
                                                                value="{{ $anggota_kelas->id }}">

                                                            <td class="text-center">{{ $kkm->kkm }}</td>

                                                            <td class="text-center">{{ $anggota_kelas->nilai_sumatif }}
                                                            </td>
                                                            <input type="hidden" name="nilai_sumatif[]"
                                                                value="{{ $anggota_kelas->nilai_sumatif }}">

                                                            <td class="text-center">
                                                                @if ($anggota_kelas->nilai_sumatif < $kkm->predikat_c)
                                                                    D
                                                                    <input type="hidden" name="predikat[]"
                                                                        value="D">
                                                                @elseif($anggota_kelas->nilai_sumatif >= $kkm->predikat_c && $anggota_kelas->nilai_sumatif < $kkm->predikat_b)
                                                                    C
                                                                    <input type="hidden" name="predikat[]"
                                                                        value="C">
                                                                @elseif($anggota_kelas->nilai_sumatif >= $kkm->predikat_b && $anggota_kelas->nilai_sumatif < $kkm->predikat_a)
                                                                    B
                                                                    <input type="hidden" name="predikat[]"
                                                                        value="B">
                                                                @elseif($anggota_kelas->nilai_sumatif >= $kkm->predikat_a)
                                                                    A
                                                                    <input type="hidden" name="predikat[]"
                                                                        value="A">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Kirim Nilai
                                        Akhir</button>
                                    <a href="{{ route('kirimnilaiakhir.index') }}"
                                        class="btn btn-default float-right mr-2">Batal</a>
                            </div>
                            </form>
                        </div>

                    </div>
                </div> <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
</div>
<!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
@include('layouts.main.footer')

</body>

</html>
