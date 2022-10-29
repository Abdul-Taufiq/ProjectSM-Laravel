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
<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail Data Mobil</h1>


<!-- DataTales -->
{{-- TOMBOL ATAS CARD TABEL --}}
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<div style="float: left;">
			<a href="{{ url('mobil/cetak/cetak-detail-datamobil/'.$mobil->id_mobil) }}" class="btn btn-primary btn-icon-split btn-sm mb-2" target="_blank">
				<span class="icon text-white-50">
					<i class="fa fa-print" aria-hidden="true"></i>
				</span>
				<span class="text">Cetak Laporan</span>
			</a>
		</div>
		<div style="float: right;">
			<a href=" {{ url('mobil') }} " class="btn btn-warning btn-icon-split btn-sm">
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
  </div>
</div>

@endsection