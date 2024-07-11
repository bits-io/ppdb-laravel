<!DOCTYPE html>
<html lang="en">

<head>
<!-- Custom fonts for this template-->
<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="A4">
        <table align="center" style="margin-top: 10px; margin-bottom: 2px;">
            <td align="center">
                <h4>SMK MUTIARA HIKMAH</h4>
				<h5>DESA TAMANJAYA KECAMATAN CIEMAS</h5>
                <p>Alamat : Kp. Cijambe Desa Tamanjaya Kec. Ciemas 43177</p>
            </td>
        </table>
        <hr noshade size=4 width="98%">
        <div style="width:100%" align="center">
            <p>Dari Tanggal : <?= date('d-M-Y', strtotime($dari)) ?> Sampai Tanggal : <?= date('d-M-Y', strtotime($sampai)) ?></p>
        </div>
        <div style="width:90%; margin-left: 25px;" align="center" style="margin:10px;">
            <table id="tabelku" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center align-middle" >No</th>
					<th class="text-center align-middle" >Nama</th>
					<th class="text-center align-middle" >Jenis Kelamin</th>
					<th class="text-center align-middle" >Asal Sekolah</th>
					<th class="text-center align-middle" >Tempat Lahir</th>
					<th class="text-center align-middle" >Tanggal Lahir</th>
					<th class="text-center align-middle" >Tanggal Daftar</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>{{ $siswa->asal_sekolah ?? '-' }}</td>
                        <td>{{ $siswa->tempat_lahir }}</td>
                        <td>{{ $siswa->tanggal_lahir }}</td>
                        <td>{{ $siswa->created_at    }}</td>
                    </tr>
                @endforeach
			</tbody>
            </table>
        </div>
        <table align="right" width="40%"><br><br>
            <tr align="center">
                <td>Tasikmalaya, <?= date('d-m-Y') ?></td>
            </tr>
            <tr align="center">
                <td>Mengetahui</td>
            </tr>
            <tr align="center">
                <td><b>Kepala SMK Mutiara Hikmah</b></td>
            </tr>
            <tr>
                <td><br><br><br><br><br></td>
            </tr>
            <tr align="center">
                <td><b>RAHMAT ZAELANI, S.Pd.I</b></td>
            </tr>
        </table>
    </div>
</body>
<script>
	window.print();
</script>
</html>
