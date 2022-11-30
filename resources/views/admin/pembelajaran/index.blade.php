@extends('admin.layouts.main')

@section('container')
@section('pembelajaran', 'active')
@section('dataMaster', 'active')
@section('akademik', 'menu-is-opening menu-open')

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
                        <h3 class="card-title"><i class="fas fa-book-open"></i> {{ $title }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                data-target="#modal-settings">
                                <i class="fas fa-cog"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Modal settings  -->
                    <div class="modal fade" id="modal-settings">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Setting Pembelajaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
                                        <div class="col-sm-10">
                                            <form action="{{ route('pembelajaran.settings') }}" method="POST">
                                                @csrf
                                                <select class="form-control select2" name="kelas_id"
                                                    style="width: 100%;" required onchange="this.form.submit();">
                                                    <option value="">-- Pilih Kelas --</option>
                                                    @foreach ($data_kelas as $kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->class_name }} (
                                                            {{ $kelas->tapel->school_year }}
                                                            @if ($kelas->tapel->semester == 1)
                                                                Ganjil
                                                            @else
                                                                Genap
                                                            @endif)
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </div>
                                    </div>
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
                                        <th>Semester</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($data_pembelajaran as $pembelajaran)
                                        <?php $no++; ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $pembelajaran->kelas->tapel->school_year }}
                                                @if ($pembelajaran->kelas->tapel->semester == 1)
                                                    Ganjil
                                                @else
                                                    Genap
                                                @endif
                                            </td>
                                            <td>{{ $pembelajaran->kelas->class_name }}</td>
                                            <td>{{ $pembelajaran->subject->subject_name }}</td>
                                            <td>{{ $pembelajaran->teacher->full_name }},
                                                {{ $pembelajaran->teacher->title }}</td>
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
@endsection
