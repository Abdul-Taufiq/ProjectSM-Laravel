<!DOCTYPE html>
<html>
<head>
	<title>Sewa Mobil | Cetak Data Sewa</title>
	<style type="text/css">
		body{
			font-family: Times New Roman;
		}
		div.form-group{
			padding-left: 2px;
			padding-right: 2px;
		}
		h1{
			text-align: center;
		}
		table.static {
			position: relative;
		}
		table.static th{
			background-color: aqua;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		table.static td{
			padding: 2px;
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
						<h3>LAPORAN DATA SEWA MOBIL</h3>
					</td>
					<td width="25%"></td>
				</tr>
			</table>
		</div>
		<br>
		{{-- TANGGAL CETAK --}}
		
		Data Pada Tanggal : {{ Carbon\Carbon::parse($tgl1)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($tgl2)->format('d/m/Y') }} <br>
	
		Dicetak Pada Tanggal : <?php echo date("d/m/Y"); ?> <br>
		Jumlah Data : {{ $cetakpertanggal->count('pivot.id_kk') }}
		<br><br>
		<table class="static" border="1" id="" width="100%" cellspacing="0" style="color: #000;" rules="all">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>No sewa</th>
					<th>Nama</th>
					<th>No KTP</th>
					<th>Alamat</th>
					<th>TTL</th>
					<th>Merk Mobil</th>
					<th>Warna Mobil</th>
					<th>Tanggal Sewa </th>
					<th>Tanggal Kembali</th>
					<th>Lama Sewa</th>
					<th>Biaya Sewa</th>
					<th>Denda Sewa</th>
					<th>Keterangan Sewa</th>
					<th>Total Biaya Sewa</th>
				</tr>
				<tbody>
					<?php $i = 1; ?>
					@foreach ($cetakpertanggal as $item)
					<tr>
						<td style="text-align: center;"> <?=  $i; ?> </td>
						<td> {{ $item -> no_sewa }} </td>
						@if ($item->pelanggan)
						<td> {{ $item->pelanggan -> nama }} </td>
						<td> {{ $item->pelanggan -> no_ktp }} </td>
						<td> {{ $item->pelanggan -> alamat }} </td>
						<td> {{ $item->pelanggan -> tmpt_lahir }}, {{ $item->pelanggan -> tgl_lahir->format('d/m/Y') }}</td>
						@endif
						@if ($item->mobil)
						<td> {{ $item->mobil -> merk }} </td>
						<td> {{ $item->mobil -> warna }} </td>
						@endif
						<td> {{ $item -> tgl_sewa ->format('d/m/Y')}} </td>
						<td> {{ $item -> tgl_kembali ->format('d/m/Y')}} </td>
						<td> {{ $item -> lama_sewa }} </td>
						<td> {{ $item -> biaya_sewa }} </td>
						<td> {{ $item -> denda }} </td>
						<td> {{ $item -> keterangan_denda }} </td>
						<td> {{ $item -> total_biaya }} </td>
						<?php $i++; ?>
						@endforeach     
					</tr>
				</tbody>
			</thead>
		</table>

	</div>
	{{-- MEMINCULKAN PRINT --}}
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>
