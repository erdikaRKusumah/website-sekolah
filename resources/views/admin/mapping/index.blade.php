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
                        </div>

                        <div class="card-body">

                            <form action="{{ route('mapping.store') }}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="bg-info">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Mata Pelajaran</th>
                                                <th class="text-center">No Urut Raport</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($data_mapel as $mapel)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td>{{ $mapel->subject_name }}
                                                        <input type="hidden" name="subject_id[]"
                                                            value="{{ $mapel->id }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" name="nomor_urut[]"
                                                            value="{{ $mapel->nomor_urut }}" required>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>

                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                        </form>
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
