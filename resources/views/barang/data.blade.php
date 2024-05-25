@extends('template')
@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <h4><i class="icon fa fa-check"></i> Selamat...!!</h4>
                    {{ session('success') }}


                </div>
            @endif

            <div class="mb-4">
                <a href="laporanmasuk" class="btn btn-success btn-sm">
                    <i class="fa fa-file-archive-o"></i>
                    Laporan Masuk</a>
                <a href="laporankeluar" class="btn btn-danger btn-sm">
                    <i class="fa fa-file-archive-o"></i>
                    Laporan Keluar</a>
                @if ($id != 0)
                    <a href="generate-pdf/{{ $id }}" class="btn btn-default btn-sm">
                        <i class="fa fa-print"></i>
                        Cetak Laporan</a>
                @endif

            </div>
            <br>

            <!-- Default box -->
            <div class="box mt-4">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Status Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->kode_barang }}</td>
                                    <td>{{ $row->nama_barang }}</td>
                                    <td>{{ $row->jumlah . ' ' . $row->satuan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <div class="modal modal-daknger fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalHapusLabel">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutp</button> --}}
                    <button type="button" class="btn btn-danger" onclick="deleteCategory()">Ya</button>

                </div>
            </div>
        </div>
    </div>
    <form id="delete-form" action="{{ route('satuan.destroy', '') }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script>
        var categoryId

        function handleDelete(id) {
            categoryId = id;
            $('#modalHapus').modal('show')
        }

        function deleteCategory() {
            $('#delete-form').attr('action', '{{ route('satuan.destroy', '') }}/' + categoryId);
            $('#delete-form').submit();
        }
    </script>
@endsection
