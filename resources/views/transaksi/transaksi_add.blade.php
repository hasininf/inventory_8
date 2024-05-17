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
                            <h3 class="box-title">Form Tambah Barang</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        {{-- @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach --}}
                        <form action="{{ route('transaksimasuk.store') }}" method="post">
                            @csrf
                            <div class="box-body">


                                <div class="form-group @error('kode_barang') has-error @enderror">
                                    <label for="exampleInputFile">Kode_Barang</label>
                                    <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"
                                        class="form-control">
                                    <span class="help-block">
                                        @error('kode_barang')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div class="form-group @error('nama_barang') has-error @enderror">
                                    <label for="exampleInputFile">Nama_Barang</label>
                                    <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"
                                        class="form-control">
                                    <span class="help-block">
                                        @error('nama_barang')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div class="form-group {{ $errors->has('kategori_barang') ? 'has-error' : '' }}">
                                    <label for="kategori_barang">Kategori Barang</label>
                                    <select name="kategori_barang" id="kategori_barang"
                                        class="form-control select2 has-error">
                                        <option value="">Pilih Kategori Barang</option>
                                        @foreach ($kategoris as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('kategori_barang') == $row->id ? 'selected' : '' }}>
                                                {{ $row->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_barang')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('jumlah') has-error @enderror">
                                    <label for="exampleInputFile">Jumlah</label>
                                    <input type="text" name="jumlah" value="{{ old('jumlah') }}" class="form-control">
                                    <span class="help-block">
                                        @error('jumlah')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div class="form-group @error('satuan_barang') has-error @enderror">
                                    <label for="exampleInputFile">Satuan Barang</label>
                                    <select name="satuan_barang" id="" class="form-control select2">
                                        <option value="">Satuan Barang</option>
                                        @foreach ($satuans as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('satuan_barang') == $row->id ? 'selected' : '' }}>
                                                {{ $row->satuan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        @error('satuan_barang')
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
