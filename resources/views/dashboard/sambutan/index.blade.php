@extends('dashboard.layouts.main')

@section('container')
@section('sambutan', 'active')
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
              <li class="breadcrumb-item active">Sambutan</li>
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
                <h3 class="card-title">Sambutan Kepala Sekolah</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Sambutan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($sambutan as $smbtn)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $smbtn->kutipan }}</td>
                        <td class="text-center">
                            <a href="/dashboard/sambutan/{{ $smbtn->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            <a href="/dashboard/sambutan/{{ $smbtn->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
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