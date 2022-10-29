<!DOCTYPE html>
<html>
<head>
	<title>Sewa Mobil | Cetak Detail Data Mobil</title>
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
										<h3>LAPORAN DETAIL DATA MOBIL</h3>
									</td>
									<td width="20%"></td>
								</tr>
							</table>
						</div>
						{{-- TANGGAL CETAK --}}
						<br>
						Dicetak Pada Tanggal : <?php echo date("d/m/Y"); ?> <br>
						<br><br>
						<table class="static" border="" id="" width="100%" cellspacing="0" style="color: #000;" rules="all">
							<tr>
								<th>No STNK</th>
								<td> {{ $mobil -> no_stnk }} </td>
							</tr>
							<tr>
								<th>Nomor Mesin</th>
								<td> {{ $mobil -> no_mesin }} </td>
							</tr>
							<tr>
								<th>Nomor Plat</th>
								<td> {{ $mobil -> no_plat }} </td>
							</tr>
							<tr>
								<th>Merk Mobil</th>
								<td> {{ $mobil -> merk }} </td>
							</tr>
							<tr>
								<th>Warna Mobil</th>
								<td> {{ $mobil -> warna }} </td>
							</tr>
							<tr>
								<th>Harga Sewa</th>
								<td> {{ $mobil -> harga }} /hari </td>
							</tr>
							<tr>
								<th>Status Mobil</th>
								<td> {{ $mobil -> status_mobil }} </td>
							</tr>
						</table>

					</div>

</body>
</html>
