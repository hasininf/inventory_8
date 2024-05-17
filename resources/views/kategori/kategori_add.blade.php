@extends('template')
@section('content')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content">




            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Tambah Kategori</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        {{-- @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach --}}
                        <form action="{{ url('kategori') }}" method="post">
                            @csrf
                            <div class="box-body">


                                <div class="form-group @error('nama_kategori') has-error @enderror">
                                    <label for="exampleInputFile">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                                        class="form-control">
                                    <span class="help-block">
                                        @error('nama_kategori')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">

                                <button type="submit" class="btn btn-success" name="preview"><i class="fa fa-check"></i>
                                    Simpan</button>
                                <button type="reset" class="btn btn-danger" name="preview"><i class="fa fa-close"></i>
                                    Batal</button>

                        </form>
                    </div>
                    <!-- /.box -->

                    <!-- Form Element sizes -->

                    <!-- /.box -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div>
            <!-- /.row -->
        </section>
        <!-- Main content -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
