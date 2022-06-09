@extends('dashboard.layouts.main')

@section('container')
    <section>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staf Sekolah</h1>
          </div>
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Berita</li>
            </ol> --}}
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
                <a href="/dashboard/categorys/create" class="btn btn-primary"><span data-feather="plus"></span> Tambah Berita</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $staff->image }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->division }}</td>
                        <td class="text-center">
                            <a href="/dashboard/staffs/{{ $staff->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                            <form action="/dashboard/categories/{{ $staff->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash fa-fw"></i></button>
                            </form>
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
    </section>
      <!-- /.container-fluid -->
@endsection