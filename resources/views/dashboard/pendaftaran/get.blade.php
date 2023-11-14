<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <title>Data Pendaftaran</title>
</head>
<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <table align="center" style="margin-top: 10px; margin-bottom: 2px;">
            <td align="center">
                <h2>DATA PENDAFTARAN</h2>
                <h4>SMK MUTIARA HIKMAH</h4>
				<h5>KELURAHAN KARANGANYAR KECAMATAN KAWALU</h5>
                <p>Alamat : Tamanjaya, Ciemas, Sukabumi Regency, West Java 43177</p>
            </td>
        </table>
        <hr noshade size=4 width="98%">

                <div class="row">
                    <div class="col-lg-4">
                        <!-- Two factor authentication card-->
                        <div class="card mb-4">
                            <div class="card-header">Data pendaftaran</div>
                            <div class="card-body">
                                <p>No Pendaftaran : {{ $pendaftaran->no_pendaftaran }}</p>
                                <p>Asal Sekolah : {{ $pendaftaran->siswa->asal_sekolah }}</p>
                                <p>Tahun Ajaran : {{ $pendaftaran->siswa->tahun_ajaran }}</p>
                                <p>Status : {{ $pendaftaran->status }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Two factor authentication card-->
                        <div class="card mb-4">
                            <div class="card-header">Data Siswa</div>
                            <div class="card-body">
                                <p>Nomor Induk Siswa : {{ $pendaftaran->siswa->nis }}</p>
                                <p>Nama : {{ $pendaftaran->siswa->name }}</p>
                                <p>Jenis Kelamin : {{ $pendaftaran->siswa->jenis_kelamin }}</p>
                                <p>Alamat : {{ $pendaftaran->siswa->alamat }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Two factor authentication card-->
                        <div class="card mb-4">
                            <div class="card-header">Data Pembayaran</div>
                            <div class="card-body">
                                <p>Nomor Pembayaran : {{ $pendaftaran->pembayaran->no_pembayaran }}</p>
                                <p>Nama Bank : {{ $pendaftaran->pembayaran->nama_bank }}</p>
                                <p>Total Bayar : {{ $pendaftaran->pembayaran->total_bayar }}</p>
                                <p>Status : {{ $pendaftaran->pembayaran->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
<script>
    window.onload = function() {
        window.print();
    }
</script>
</body>
</html>

