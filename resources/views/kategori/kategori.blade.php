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

            <div class="">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah
                    Data</a>
            </div>

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kategori</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Status Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $row)
                                <tr>
                                    <td>
                                        <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-sm btn-success"><i
                                                class="fa fa-edit"></i></a>

                                        <button class="btn btn-sm btn-danger" onclick="handleDelete({{ $row->id }})"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>{{ $row->status_kategori }}</td>
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
                    Apakah Anda yakin ingin menghapus kategori ini?
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutp</button> --}}
                    <button type="button" class="btn btn-danger" onclick="deleteCategory()">Ya</button>

                </div>
            </div>
        </div>
    </div>
    <form id="delete-form" action="{{ route('kategori.destroy', '') }}" method="POST" style="display: none;">
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
            $('#delete-form').attr('action', '{{ route('kategori.destroy', '') }}/' + categoryId);
            $('#delete-form').submit();
        }
    </script>
@endsection
