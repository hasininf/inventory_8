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
                                    <input type="text" id="product_code_input" name="kode_barang"
                                        value="{{ old('kode_barang') }}" class="form-control">
                                    <span class="help-block">
                                        @error('kode_barang')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div id="product_name_display"></div>

                                <div class="form-group @error('nama_barang') has-error @enderror">
                                    <label for="exampleInputFile">Nama_Barang</label>
                                    <select name="nama_barang" id="nama_barang" class="form-control select2 has-error">
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barangs as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('nama_barang') == $row->id ? 'selected' : '' }}>
                                                {{ $row->nama_barang }}
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#product_code_input').on('keyup', function() {
                var productCode = $(this).val();
                $.ajax({
                    url: '/getdata',
                    type: 'GET',
                    accepts: {
                        mycustomtype: 'application/json'
                    },
                    converters: {
                        'text mycustomtype': function(result) {
                            // Manipulasi respons sesuai kebutuhan
                            var newResult = result.toUpperCase();
                            return newResult;
                        }
                    },
                    data: {
                        product_code: productCode
                    },
                    dataType: 'mycustomtype',
                    success: function(response) {
                        var jsonData = JSON.parse(response);
                        $('#product_name_display').text(response);
                    },
                    error: function(xhr) {
                        $('#product_name_display').text('Product not found');
                    }
                });
            });
        });
    </script>
@endsection
