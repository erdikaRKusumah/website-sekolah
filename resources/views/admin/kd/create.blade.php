@include('layouts.main.header')
@include('layouts.sidebar.admin')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('kd.index') }}">Data Kompetensi Dasar</a></li>
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
                            <h3 class="card-title"><i class="fas fa-clipboard-list"></i> {{ $title }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="callout callout-info">
                                <form action="{{ route('kd.create') }}" method="GET">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="subject_id" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                        <div class="col-sm-4">
                                            <select class="form-control select2" name="subject_id" style="width: 100%;"
                                                required onchange="this.form.submit();">
                                                <option value="" disabled>-- Pilih Mapel --</option>
                                                @foreach ($data_mapel as $mapel)
                                                    <option value="{{ $mapel->id }}"
                                                        @if ($mapel->id == $mapel_id) selected @endif>
                                                        {{ $mapel->subject_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="class_level" class="col-sm-2 col-form-label">Tingkatan Kelas</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="class_level" style="width: 100%;"
                                                required onchange="this.form.submit();">
                                                <option value="" disabled>-- Pilih Tingkatan Kelas --</option>
                                                @foreach ($data_kelas as $kelas)
                                                    <option value="{{ $kelas->class_level }}"
                                                        @if ($kelas->class_level == $tingkatan_kelas) selected @endif>
                                                        {{ $kelas->class_level }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <form id="dynamic_form" action="{{ route('kd.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="subject_id" value="{{ $mapel_id }}">
                                <input type="hidden" name="class_level" value="{{ $tingkatan_kelas }}">
                                <input type="hidden" name="semester" value="{{ $tapel->semester }}">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 250px;">Tipe</th>
                                                <th style="width: 100px;">Kode KD</th>
                                                <th>Kompetensi Dasar</th>
                                                <th>Ringkasan Kompetensi</th>
                                                <th style="width: 40px;">Baris</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--  -->
                                        </tbody>
                                    </table>
                                </div>
                        </div>

                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            <a href="{{ route('kd.index') }}" class="btn btn-default float-right mr-2">Batal</a>
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

</div>
@include('layouts.main.footer')
<!-- Content Header (Page header) -->
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number) {
            html = '<tr>';
            html += `<td>
                  <select class="form-control" name="tipe[]" style="width: 100%;" required oninvalid="this.setCustomValidity('silakan pilih item dalam daftar')" oninput="setCustomValidity('')">
                    <option value="">-- Pilih Kompetensi -- </option>
                    <option value="1">Tujuan Pembelajaran</option>
                    <option value="2">Lingkup Materi</option>
                    <option value="3">Capaian Pembelajaran</option>
                  </select>
              </td>`;
            html += `<td>
                  <input type="text" class="form-control" name="kode_kd[]" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
              </td>`;
            html += `<td>
                  <textarea class="form-control" name="kompetensi_dasar[]" rows="2" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
              </td>`;
            html += `<td>
                  <textarea class="form-control" name="ringkasan_kompetensi[]" rows="2" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
              </td>`;

            if (number > 1) {
                html +=
                    '<td><button type="button" name="remove" class="btn btn-danger shadow btn-xs sharp remove"><i class="fa fa-trash"></i></button></td></tr>';
                $('tbody').append(html);
            } else {
                html +=
                    '<td><button type="button" name="add" id="add" class="btn btn-primary shadow btn-xs sharp"><i class="fa fa-plus"></i></button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function() {
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function() {
            count--;
            $(this).closest("tr").remove();
        });

    });
</script>
