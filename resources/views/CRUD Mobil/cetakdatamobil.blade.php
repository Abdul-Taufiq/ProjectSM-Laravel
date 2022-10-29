<!DOCTYPE html>
<html>
<head>
	<title>Sewa Mobil | Cetak Detail Data Mobil</title>
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
						<h3>LAPORAN DATA MOBIL</h3>
					</td>
					<td width="25%"></td>
				</tr>
			</table>
		</div>
		<br>
		{{-- TANGGAL CETAK --}}
		Dicetak Pada Tanggal : <?php echo date("d/m/Y"); ?> <br>
		Jumlah Data : {{ $cetakdatamobil->count('pivot.id_kk') }}
		<br><br>
		<table class="static" border="1" id="" width="100%" cellspacing="0" style="color: #000;" rules="all">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>No STNK</th>
					<th>Nomor Mesin</th>
					<th>Nomor Plat</th>
					<th>Merk Mobil</th>
					<th>Warna Mobil</th>
					<th>Harga Sewa</th>
					<th>Status Mobil</th>
				</tr>
				<tbody>
					<?php $i = 1; ?>
					@foreach ($cetakdatamobil as $item)
					<tr>
						<td style="text-align: center;"> <?=  $i; ?> </td>
						<td> {{ $item -> no_stnk }} </td>
						<td> {{ $item -> no_mesin }} </td>
						<td> {{ $item -> no_plat }} </td>
						<td> {{ $item -> merk }} </td>
						<td> {{ $item -> warna }} </td>
						<td> {{ $item -> harga }} /hari </td>
						<td> {{ $item -> status_mobil }} </td>
						<?php $i++; ?>
						@endforeach     
					</tr>
				</tbody>
			</thead>
		</table>

	</div>



</body>
</html>
