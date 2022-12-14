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
                                <h3 class="card-title"><i class="fas fa-users"></i> {{ $title }}
                                    {{ $kelas->class_name }} {{ $kelas->tapel->school_year }} Semester
                                    @if ($kelas->tapel->semester == 1)
                                        Ganjil
                                    @else
                                        Genap
                                    @endif
                                </h3>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped table-valign-middle table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Siswa</th>
                                                    <th>L/P</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @foreach ($anggota_kelas as $anggota)
                                                    <?php $no++; ?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $anggota->student->full_name }}</td>
                                                        <td>{{ $anggota->student->gender }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </section>
        </div>

    </section>
    </section>
@endsection
