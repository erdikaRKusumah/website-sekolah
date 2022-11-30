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
                    <li class="breadcrumb-item "><a href="{{ route('pembelajaran.index') }}">Data Pembelajaran</a></li>
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
                        <h3 class="card-title"><i class="fas fa-cog"></i> {{ $title }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group row callout callout-info mx-1">
                            <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <form action="{{ route('pembelajaran.settings') }}" method="POST">
                                    @csrf
                                    <select class="form-control select2" name="kelas_id" style="width: 100%;" required
                                        onchange="this.form.submit();">
                                        <option value="" disabled> -- Pilih Kelas --</option>
                                        <option value="" selected>{{ $kelas->class_name }} (
                                            {{ $kelas->tapel->school_year }}
                                            @if ($kelas->tapel->semester == 1)
                                                Ganjil
                                            @else
                                                Genap
                                            @endif)
                                        </option>
                                        @foreach ($data_kelas as $d_kelas)
                                            @if ($d_kelas->id != $kelas->id)
                                                <option value="{{ $d_kelas->id }}">{{ $d_kelas->class_name }} (
                                                    {{ $d_kelas->tapel->school_year }}
                                                    @if ($d_kelas->tapel->semester == 1)
                                                        Ganjil
                                                    @else
                                                        Genap
                                                    @endif)
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('pembelajaran.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Guru</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pembelajaran_kelas as $pembelajaran)
                                            <tr>
                                                <td>{{ $pembelajaran->kelas->class_name }} (
                                                    {{ $d_kelas->tapel->school_year }}
                                                    @if ($d_kelas->tapel->semester == 1)
                                                        Ganjil
                                                    @else
                                                        Genap
                                                    @endif)
                                                </td>
                                                <td>{{ $pembelajaran->subject->subject_name }}
                                                    <input type="hidden" name="pembelajaran_id[]"
                                                        value="{{ $pembelajaran->id }}">
                                                </td>
                                                <td>
                                                    <select class="form-control select2" name="update_teacher_id[]"
                                                        style="width: 100%;">
                                                        <option value="">-- Pilih Guru -- </option>
                                                        @foreach ($data_guru as $guru)
                                                            <option value="{{ $guru->id }}"
                                                                @if ($pembelajaran->teacher->id == $guru->id) selected @endif>
                                                                {{ $guru->full_name }}, {{ $guru->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="update_status[]">
                                                        @if ($pembelajaran->status == 1)
                                                            <option value="0">Tidak Aktif </option>
                                                            <option value="1" selected>Aktif </option>
                                                        @else
                                                            <option value="0" selected>Tidak Aktif </option>
                                                            <option value="1">Aktif </option>
                                                        @endif
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @foreach ($data_mapel as $mapel)
                                            <tr>
                                                <td>{{ $kelas->class_name }} ( {{ $d_kelas->tapel->school_year }}
                                                    @if ($d_kelas->tapel->semester == 1)
                                                        Ganjil
                                                    @else
                                                        Genap
                                                    @endif)
                                                    <input type="hidden" name="kelas_id[]"
                                                        value="{{ $kelas->id }}">
                                                </td>
                                                <td>
                                                    {{ $mapel->subject_name }}
                                                    <input type="hidden" name="subject_id[]"
                                                        value="{{ $mapel->id }}">
                                                </td>
                                                <td>
                                                    <select class="form-control select2" name="teacher_id[]"
                                                        style="width: 100%;">
                                                        <option value="">-- Pilih Guru -- </option>
                                                        @foreach ($data_guru as $guru)
                                                            <option value="{{ $guru->id }}">
                                                                {{ $guru->full_name }}, {{ $guru->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="status[]">
                                                        <option value="0">Tidak Aktif </option>
                                                        <option value="1">Aktif </option>
                                                    </select>
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
