<!DOCTYPE html>
<html>
<head>
	<title>Sewa Pelanggan | Cetak Data Pelanggan</title>
	<style type="text/css">
		body{
			font-family: Times New Roman;
		}
		div.form-group{
			padding-left: 10px;
			padding-right: 10px;
		}
		h1{
			text-align: center;
		}
		table.static {
			position: relative;
		}
		table.static th{
			background-color: aqua;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		table.static td{
			padding: 5px;
		}
		
		table.header {
			border-bottom: double;
			width: 100%;
		}

		div.c {
			text-align: right;
		} 
	</style>
</head>
<body>
	<div class="form-group">
		<div>
			<br>
			<table class="header">
				<tr>
					<td width="25%">	
					</td>
					<td width="50%" style="text-align: center;">
						<h3>LAPORAN DATA PELANGGAN</h3>
					</td>
					<td width="25%"></td>
				</tr>
			</table>
		</div>
		<br>
		{{-- TANGGAL CETAK --}}
		
		Data Pada Tanggal : {{ Carbon\Carbon::parse($tgl1)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($tgl2)->format('d/m/Y') }} <br>
	
		Dicetak Pada Tanggal : <?php echo date("d/m/Y"); ?> <br>
		Jumlah Data : {{ $cetakpertanggal->count('pivot.id_pelanggan') }}
		<br><br>
		<table class="static" border="1" id="" width="100%" cellspacing="0" style="color: #000;" rules="all">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>Nama</th>
					<th>no_ktp</th>
					<th>SIM</th>
					<th>Alamat</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
				</tr>
				<tbody>
					<?php $i = 1; ?>
					@foreach ($cetakpertanggal as $item)
					<tr>
						<td style="text-align: center;"> <?=  $i; ?> </td>
						<td> {{ $item -> nama }} </td>
						<td> {{ $item -> no_ktp }} </td>
						<td> {{ $item -> sim }} </td>
						<td> {{ $item -> alamat }} </td>
						<td> {{ $item -> tmpt_lahir }} </td>
						<td> {{ $item -> tgl_lahir ->format('d/m/Y') }}</td>
						<?php $i++; ?>
						@endforeach     
					</tr>
				</tbody>
			</thead>
		</table>

	</div>

</body>
</html>
