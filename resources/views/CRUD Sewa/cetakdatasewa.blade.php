<!DOCTYPE html>
<html>
<head>
	<title>Sewa Mobil | Cetak Sewa</title>
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
						<h3>LAPORAN DATA SEWA</h3>
					</td>
					<td width="25%"></td>
				</tr>
			</table>
		</div>
		<br>
		{{-- TANGGAL CETAK --}}
		Dicetak Pada Tanggal : <?php echo date("d/m/Y"); ?> <br>
		Jumlah Data : {{ $cetakdatasewa->count('pivot.id_sewa') }}
		<br><br>
		<table class="static" border="1" id="" width="100%" cellspacing="0" style="color: #000;" rules="all">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>No sewa</th>
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
					@foreach ($cetakdatasewa as $item)
					<tr>
						<td style="text-align: center;"> <?=  $i; ?> </td>
						<td> {{ $item -> no_sewa }} </td>
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
