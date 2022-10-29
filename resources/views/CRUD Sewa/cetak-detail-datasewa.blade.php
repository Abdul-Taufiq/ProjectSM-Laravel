<!DOCTYPE html>
<html>
<head>
	<title>Sewa Mobil | Cetak Detail Data Sewa</title>
	<style type="text/css">
		body{
			font-family: Times New Roman;
			font-size: 16px;
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
			width: 100%;
			border-bottom: double;
		}

		p{
			font-style: bold;
			font-family: Times New Roman;
			font-size: 20px;
		}
	</style>
</head>
<body>
	{{-- @php
					dd($data);
					@endphp --}}
					<div class="form-group">
						<div>
							<br>
							<table class="header">
								<tr>
									<td width="20%">
									</td>
									<td width="60%" style="text-align: center;">
										<h3>LAPORAN DETAIL DATA SEWA</h3>
									</td>
									<td width="20%"></td>
								</tr>
							</table>
						</div>
						{{-- TANGGAL CETAK --}}
						<br>
						Dicetak Pada Tanggal : <?php echo date("d/m/Y"); ?> <br>
						<br><br>
						<table class="static" border="1" id="" width="100%" cellspacing="0" style="color: #000;" rules="all">
							<thead>
								<tr>
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
							</thead>
							<tbody>
								<?php $i = 1; ?>
					<tr>
						<td style="text-align: center;"> <?=  $i; ?> </td>
						<td> {{ $sewa -> no_sewa }} </td>
						<td> {{ $sewa->pelanggan -> nama }} </td>
						<td> {{ $sewa->pelanggan -> no_ktp }} </td>
						<td> {{ $sewa->pelanggan -> alamat }} </td>
						<td> {{ $sewa->pelanggan -> tmpt_lahir }}, {{ $sewa->pelanggan -> tgl_lahir->format('d/m/Y') }}</td>
						<td> {{ $sewa->mobil -> merk }} </td>
						<td> {{ $sewa->mobil -> warna }} </td>
						<td> {{ $sewa -> tgl_sewa ->format('d/m/Y')}} </td>
						<td> {{ $sewa -> tgl_kembali ->format('d/m/Y')}} </td>
						<td> {{ $sewa -> lama_sewa }} </td>
						<td> {{ $sewa -> biaya_sewa }} </td>
						<td> {{ $sewa -> denda }} </td>
						<td> {{ $sewa -> keterangan_denda }} </td>
						<td> {{ $sewa -> total_biaya }} </td>
						<?php $i++; ?>
					
					</tr>
							</tbody>
						</table>

					</div>
					<!-- muncul -->
{{-- <script type="text/javascript">
	window.print();
</script>
--}}


</body>
</html>
