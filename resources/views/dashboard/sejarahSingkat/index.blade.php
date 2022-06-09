@extends('dashboard.layouts.main')

@section('container')
@section('sejarahSingkat', 'active')
@section('profil', 'active')
@section('main', 'menu-is-opening menu-open')

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sejarah Singkat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sejarah Singkat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Sejarah Singkat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($sejarah_singkat as $ss)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ss->excerpt }}</td>
                        <td class="text-center">
                            <a href="/dashboard/sejarahSingkat/{{ $ss->slug }}" class="btn btn-primary btn-sm"><i class="fas fa-eye fa-fw"></i></a>
                            <a href="/dashboard/sejarahSingkat/{{ $ss->slug }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
@endsection