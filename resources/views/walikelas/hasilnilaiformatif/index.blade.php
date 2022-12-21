@include('layouts.main.header')
@include('layouts.sidebar.walikelas')

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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 100px;">No</th>
                                            <th rowspan="2" class="text-center">Nama Siswa</th>
                                            <th colspan="2" class="text-center">Kompetensi
                                            </th>
                                        </tr>
                                        <tr>
                                            @foreach ($data_kd_nilai as $kd_nilai)
                                                <input type="hidden" name="rencana_penilaian_formatif_id"
                                                    value="{{ old('rencana_penilaian_formatif_id', $kd_nilai->rencana_penilaian_formatif_id) }}">
                                                <td style="width: 300px;">
                                                    <small><b>{{ $kd_nilai->rencana_penilaian_formatif->kd_mapel->kode_kd }}</b>
                                                        {{ $kd_nilai->rencana_penilaian_formatif->kd_mapel->ringkasan_kompetensi }}</small>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($data_anggota_kelas->sortBy('student.full_name') as $anggota_kelas)
                                            <?php $no++; ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td>{{ $anggota_kelas->student->full_name }}</td>
                                                <input type="hidden" name="class_group_id"
                                                    value="{{ $anggota_kelas->id }}" readonly>

                                                <?php $i = -1; ?>
                                                @foreach ($anggota_kelas->data_nilai as $nilai)
                                                    <?php $i++; ?>
                                                    <td>
                                                        <input type="number" class="form-control" name="nilai"
                                                            value="{{ old('nilai', $nilai->nilai) }}" required
                                                            readonly>
                                                    </td>
                                                @endforeach

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
