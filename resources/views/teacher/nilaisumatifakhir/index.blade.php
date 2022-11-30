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
                            <h3 class="card-title"><i class="fas fa-list-ol"></i> {{ $title }}</h3>
                            <div class="card-tools">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-success">
                                        <tr>
                                            <th rowspan="2" class="text-center" style="width: 100px;">No</th>
                                            <th rowspan="2" class="text-center">Mata Pelajaran</th>
                                            <th rowspan="2" class="text-center">Kelas</th>
                                            <th colspan="2" class="text-center" style="width: 200px;">Jumlah</th>
                                            <th rowspan="2" class="text-center" style="width: 100px;">Input Nilai
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="width: 100px;">Anggota Kelas</th>
                                            <th class="text-center" style="width: 100px;">Telah Dinilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($data_penilaian as $penilaian)
                                            <?php $no++; ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td>{{ $penilaian->subject->subject_name }}</td>
                                                <td class="text-center">{{ $penilaian->kelas->class_name }}</td>

                                                @if ($penilaian->jumlah_anggota_kelas == 0)
                                                    <td class="text-danger text-center"><b>0</b> Siswa</td>
                                                @else
                                                    <td class="text-success text-center">
                                                        <b>{{ $penilaian->jumlah_anggota_kelas }}</b> Siswa
                                                    </td>
                                                @endif

                                                @if ($penilaian->jumlah_telah_dinilai == 0)
                                                    <td class="text-danger text-center"><b>0</b> Siswa</td>
                                                @else
                                                    <td class="text-success text-center">
                                                        <b>{{ $penilaian->jumlah_telah_dinilai }}</b> Siswa
                                                    </td>
                                                @endif

                                                @if ($penilaian->jumlah_anggota_kelas != 0)
                                                    <td class="text-center">
                                                        <form action="{{ route('nilaisumatifakhir.create') }}"
                                                            method="GET">
                                                            @csrf
                                                            <input type="hidden" name="pembelajaran_id"
                                                                value="{{ $penilaian->id }}">
                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <form action="{{ route('nilaisumatifakhir.create') }}"
                                                            method="GET">
                                                            @csrf
                                                            <input type="hidden" name="pembelajaran_id"
                                                                value="{{ $penilaian->id }}">
                                                            <button type="submit" class="btn btn-sm btn-primary"
                                                                title="Belum ditemukan anggota kelas" disabled>
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
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

@include('layouts.main.footer')
