@extends('layouts.mainProfile')
@section('container')
    <section>

        <div class="row">
            <div class="col-md-4">
                <h2 class="event-title">{{ $title }}</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <!-- Tab panes -->
            <section class="content">
                <!-- ./row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-book"></i> {{ $title }}</h3>

                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-valign-middle table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Ringkas (Singkatan)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($subjects as $subject)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $subject->subject_name }}</td>
                                                    <td>{{ $subject->subject_description }}</td>

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
                <!--/. container-fluid -->
            </section>
        </div>

    </section>
    </section>
@endsection
