@include('layouts.main.header')
@include('layouts.sidebar.admin')
<div class="content-wrapper">
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
                            <h3 class="card-title"><i class="fas fa-greater-than-equal"></i> {{ $title }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                                    data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i>
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
                                    <form action="{{ route('kkm.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="subject_id" class="col-sm-3 col-form-label">Mata
                                                    Pelajaran</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="subject_id"
                                                        style="width: 100%;" required>
                                                        <option value="">-- Pilih Mata Pelajaran -- </option>
                                                        @foreach ($data_mapel as $mapel)
                                                            <option value="{{ $mapel->id }}">
                                                                {{ $mapel->subject_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kelas_id" class="col-sm-3 col-form-label">Kelas</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="kelas_id"
                                                        style="width: 100%;" required>
                                                        <!--  -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kkm" class="col-sm-3 col-form-label">KKM</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="kkm"
                                                        name="kkm">
                                                </div>
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
                                <table id="example1" class="table table-striped table-valign-middle table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Semester</th>
                                            <th>Kelas</th>
                                            <th>KKM</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($data_kkm as $kkm)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $kkm->subject->subject_name }}</td>
                                                <td>{{ $kkm->kelas->tapel->school_year }}
                                                    @if ($kkm->kelas->tapel->semester == 1)
                                                        Ganjil
                                                    @else
                                                        Genap
                                                    @endif
                                                </td>
                                                <td>Tingkat {{ $kkm->kelas->class_level }}
                                                    {{ $kkm->kelas->class_name }}</td>
                                                <td>{{ $kkm->kkm }}</td>
                                                <td>
                                                    <form action="{{ route('kkm.destroy', $kkm->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-warning btn-sm mt-1"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit{{ $kkm->id }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-danger btn-sm mt-1"
                                                            onclick="return confirm('Hapus {{ $title }} ?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal edit  -->
                                            <div class="modal fade" id="modal-edit{{ $kkm->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit {{ $title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('kkm.update', $kkm->id) }}"
                                                            method="POST">
                                                            {{ method_field('PATCH') }}
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="subject_id"
                                                                        class="col-sm-3 col-form-label">Mata
                                                                        Pelajaran</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="subject_id"
                                                                            value="{{ $kkm->subject->subject_name }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="kelas_id"
                                                                        class="col-sm-3 col-form-label">Kelas</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                            id="kelas_id"
                                                                            value="{{ $kkm->kelas->class_name }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="kkm"
                                                                        class="col-sm-3 col-form-label">KKM</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control"
                                                                            id="kkm" name="kkm"
                                                                            value="{{ $kkm->kkm }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-end">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal edit -->
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

</div>
@include('layouts.main.footer')

{{-- <script src="/plugins/jquery/jquery.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="subject_id"]').on('change', function() {
            var subject_id = $(this).val();
            if (subject_id) {
                $.ajax({
                    url: '/admin/getKelas/ajax/' + subject_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="kelas_id"').empty();

                        $('select[name="kelas_id"]').append(
                            '<option value="">-- Pilih Kelas --</option>'
                        );

                        $.each(data, function(i, data) {
                            $('select[name="kelas_id"]').append(
                                '<option value="' +
                                data.kelas_id + '">' + data.class_name +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="kelas_id"').empty();
            }
        });
    });
</script>
