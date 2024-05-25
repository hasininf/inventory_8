<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <table width="100%" border="1" style="border-collapse: collapse;" cellpadding="5px">
        <thead>
            <tr style="background-color: cadetblue">
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>KD Brg</th>
                <th>Nama Brg</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($users as $row)
                <tr>
                    <td align="center">{{ $no++ }}</td>
                    <td>{{ $row->tanggal_transaksi }}</td>
                    <td>{{ $row->kode_barang }}</td>
                    <td>{{ $row->nama_barang }}</td>
                    <td align="center">{{ $row->jumlah }}</td>
                    <td>{{ $row->status_transaksi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
