@extends('admin.layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="/dashboard/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- ./row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/admin/profiles/create" class="btn btn-primary"><span data-feather="plus"></span>
                                Tambah Profil</a>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-tie"></i> {{ $title }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                    data-target="#modal-tambah">
                                </button>
                            </div>
                        </div>

                        <!-- Modal tambah  -->
                        <div class="modal fade" id="modal-tambah">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah {{ $title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/profiles" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="title" class="col-sm-3 col-form-label">Profile</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        placeholder="Judul" value="{{ old('title') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="slug" name="slug"
                                                        placeholder="Slug" value="{{ old('slug') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="image" class="col-sm-3 col-form-label">Profile
                                                    Image</label>
                                                <img class="img-preview img-fluid mb-3 col-sm-3">
                                                <input class="form-control @error('image') is-invalid @enderror"
                                                    type="file" id="image" name="image" onchange="previewImage()">
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <label for="body" class="col-sm-3 col-form-label">Body</label>
                                                @error('body')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <div class="col-sm-9">
                                                    <input type="hidden" class="form-control" id="body" name="body"
                                                        value="{{ old('body') }}">
                                                </div>
                                                <trix-editor input="body"></trix-editor>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-end">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal tambah -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1"
                                    class="table table-bordered table-striped table-valign-middle table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="col-4">Profile</th>
                                            <th class="col-4">Deskripsi</th>
                                            <th class="col-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profiles as $profile)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $profile->title }}</td>
                                                <td>{{ $profile->excerpt }}</td>
                                                <td class="text-center">
                                                    <a href="/admin/profiles/{{ $profile->slug }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-eye fa-fw"></i></a>
                                                    <a href="/admin/profiles/{{ $profile->slug }}/edit"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fas fa-edit fa-fw"></i></a>
                                                    <form action="/admin/profiles/{{ $profile->slug }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fas fa-trash fa-fw"></i></button>
                                                    </form>
                                                </td>
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
@endsection

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/admin/profiles/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
