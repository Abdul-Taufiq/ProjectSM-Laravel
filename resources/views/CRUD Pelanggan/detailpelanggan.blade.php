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
<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail Data Pelanggan</h1>


<!-- DataTales -->
{{-- TOMBOL ATAS CARD TABEL --}}
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<div style="float: left;">
			<a href="{{ url('pelanggan/cetak/cetak-detail-datapelanggan/'.$pelanggan->id_pelanggan) }}" class="btn btn-primary btn-icon-split btn-sm mb-2" target="_blank">
				<span class="icon text-white-50">
					<i class="fa fa-print" aria-hidden="true"></i>
				</span>
				<span class="text">Cetak Laporan</span>
			</a>
		</div>
		<div style="float: right;">
			<a href=" {{ url('pelanggan') }} " class="btn btn-warning btn-icon-split btn-sm">
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
  </div>
</div>

@endsection