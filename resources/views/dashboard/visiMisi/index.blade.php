@extends('dashboard.layouts.main')

@section('container')
@section('visiMisi', 'active')
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
          <li class="breadcrumb-item active">Visi Misi</li>
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
            <h3 class="card-title">Visi dan Misi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Visi dan Misi</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
            @foreach ($visiMisi as $vm)
                
                <tr>
                    <td>{{ $vm->kategori }}</td>
                    <td class="text-center">
                        <a href="/dashboard/visiMisi/{{ $vm->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/visiMisi/{{ $vm->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
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
@endsection