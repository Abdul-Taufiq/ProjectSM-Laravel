<!DOCTYPE html>
<html>
<head>
	<title>Sewa Mobil | Cetak Detail Data pelanggan</title>
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
										<h3>LAPORAN DETAIL DATA pelanggan</h3>
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
								<th>Nama</th>
								<td> {{ $pelanggan -> nama }} </td>
							</tr>
							<tr>
								<th>No KTP</th>
								<td> {{ $pelanggan -> no_ktp }} </td>
							</tr>
							<tr>
								<th>SIM</th>
								<td> {{ $pelanggan -> sim }} </td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td> {{ $pelanggan -> alamat }} </td>
							</tr>
							<tr>
								<th>Tempat Lahir</th>
								<td> {{ $pelanggan -> tmpt_lahir }} </td>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td> {{ $pelanggan -> tgl_lahir->format('d/m/Y') }}</td>
							</tr>
						</table>

					</div>

				</body>
				</html>
