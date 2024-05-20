@extends('template')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form Transaksi Keluar</h3>
                        </div>
                        <form id="barangForm" action="{{ route('transaksikeluar.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group @error('kode_barang') has-error @enderror">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" id="product_code_input" onkeyup="fetchData(this)"
                                        name="kode_barang" value="{{ old('kode_barang') }}" class="form-control">
                                    <span class="help-block">
                                        @error('kode_barang')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" value="{{ old('nama_barang') }}" readonly id="nama_barang"
                                        name="nama_barang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" readonly id="kategori" name="kategori"
                                        value="{{ old('kategori') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Sisa Barang</label>
                                    <input type="text" value="{{ old('satuan') }}" readonly id="satuan" name="satuan"
                                        class="form-control">
                                </div>
                                <div class="form-group @error('jumlah') has-error @enderror">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" name="jumlah" value="{{ old('jumlah') }}" class="form-control">
                                    <span class="help-block">
                                        @error('jumlah')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        function fetchData(input) {
            var productCode = input.value;
            if (productCode) {
                $.ajax({
                    url: '/getdata',
                    type: 'GET',
                    data: {
                        product_code: productCode
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            $('#nama_barang').val(response.nama_barang);
                            $('#kategori').val(response.kategori);
                            $('#satuan').val(response.jumlah + " " + response.satuan);
                        } else {
                            kosongkanForm();
                        }
                    },
                    error: function() {
                        kosongkanForm();
                    }
                });
            } else {
                kosongkanForm();
            }
        }

        function kosongkanForm() {
            $('#nama_barang').val('');
            $('#kategori').val('');
            $('#satuan').val('');
        }

        $(document).ready(function() {
            $('#product_code_input').on('keypress', function(e) {
                if (e.which == 13) { // 13 adalah kode untuk Enter
                    e.preventDefault(); // Mencegah submit default
                    var productCode = $(this).val(); // Ambil nilai kode barang
                    fetchData(this); // Pastikan fetchData dijalankan untuk mengisi form
                    setTimeout(function() {
                        if ($('#nama_barang').val() !=
                            '') { // Jika nama barang tidak kosong, submit form
                            $('#barangForm').submit(); // Submit form secara manual
                        }
                    }, 500); // Tunggu setengah detik untuk memastikan fetchData selesai
                }
            });
        });
    </script>
@endsection
