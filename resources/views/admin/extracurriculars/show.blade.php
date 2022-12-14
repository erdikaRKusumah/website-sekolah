@include('layouts.main.header')
@include('layouts.sidebar.admin')
<div class="content-wrapper">
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Berita</li>
                <li class="breadcrumb-item active">Show</li>
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
                        <h1 class="mt-3 ml-3">{{ $extracurricular->name }}</h1>
                        <div class="card-body">
                            <div class="col-4" style="max-height: 350px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $extracurricular->image) }}" class="img-fluid mt-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@include('layouts.main.footer')
