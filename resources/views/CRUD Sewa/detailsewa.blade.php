@extends('layout.main')
<style type="text/css">
	 tr{
			border-bottom: 1px solid black;
		}
</style>
@section('konten')
<!-- ISI KONTEN -->
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail Data Sewa</h1>


<!-- DataTales -->
{{-- TOMBOL ATAS CARD TABEL --}}
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<div style="float: left;">
			<a href="{{ url('sewa/cetak/cetak-detail-datasewa/'.$sewa->id_sewa) }}" class="btn btn-primary btn-icon-split btn-sm mb-2" target="_blank">
				<span class="icon text-white-50">
					<i class="fa fa-print" aria-hidden="true"></i>
				</span>
				<span class="text">Cetak Laporan</span>
			</a>
		</div>
		<div style="float: right;">
			<a href=" {{ url('sewa') }} " class="btn btn-warning btn-icon-split btn-sm">
				<span class="icon text-white">
					<i class="fa fa-arrow-left" aria-hidden="true"></i> Back
				</span>
			</a>
		</div>
</div>
{{-- TABEL --}}
<div class="card-body">

	<div class="table-responsive" id="detail">
		<table id="" width="100%" cellspacing="0" cellpadding="4">
				<tr>
					<th>No Sewa</th>
					<td> {{ $sewa -> no_sewa }} </td>
				</tr>
				<tr>
					<th>Nama Penyewa</th>
					<td> {{ $sewa->pelanggan -> nama }} </td>
				</tr>
				<tr>
					<th>No KTP</th>
					<td> {{ $sewa->pelanggan -> no_ktp }} </td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td> {{ $sewa->pelanggan -> alamat }} </td>
				</tr>
				<tr>
					<th>TTL</th>
					<td> {{ $sewa->pelanggan -> tmpt_lahir }}, {{ $sewa->pelanggan -> tgl_lahir->format('d/m/Y') }}</td>
				</tr>
				<tr>
					<th>Merk Mobil</th>
					<td> {{ $sewa->mobil -> merk }} </td>
				</tr>
				<tr>
					<th>Warna Mobil</th>
					<td> {{ $sewa->mobil -> warna }} </td>
				</tr>

				<tr>
					<th>Tanggal Sewa </th>
					<td> {{ $sewa -> tgl_sewa ->format('d/m/Y')}} </td>
				</tr>
				<tr>
					<th>Tanggal Kembali</th>
					<td> {{ $sewa -> tgl_kembali ->format('d/m/Y')}} </td>
				</tr>
				<tr>
					<th>Lama Sewa</th>
					<td> {{ $sewa -> lama_sewa }} </td>
				</tr>
				<tr>
					<th>Biaya Sewa</th>
					<td> {{ $sewa -> biaya_sewa }} </td>
				</tr>
				<tr>
					<th>Denda Sewa</th>
					<td> {{ $sewa -> denda }} </td>
				</tr>
				<tr>
					<th>Keterangan Sewa</th>
					<td> {{ $sewa -> keterangan_denda }} </td>
				</tr>
				<tr>
					<th>Total Biaya Sewa</th>
					<td> {{ $sewa -> total_biaya }} </td>
				</tr>
		</table>
	</div>
  </div>
</div>

@endsection