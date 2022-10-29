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
<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail Data Admin</h1>


<!-- DataTales -->
{{-- TOMBOL ATAS CARD TABEL --}}
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<div style="float: left;">
			<a href="{{ url('admin/cetak/cetak-detail-dataadmin/'.$admin->id_admin) }}" class="btn btn-primary btn-icon-split btn-sm mb-2" target="_blank">
				<span class="icon text-white-50">
					<i class="fa fa-print" aria-hidden="true"></i>
				</span>
				<span class="text">Cetak Laporan</span>
			</a>
		</div>
		<div style="float: right;">
			<a href=" {{ url('admin') }} " class="btn btn-warning btn-icon-split btn-sm">
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
					<th>Email</th>
					<td> {{ $admin -> email }} </td>
				</tr>
				<tr>
					<th>Username</th>
					<td> {{ $admin -> username }} </td>
				</tr>
				<tr>
					<th>Password</th>
					<td> {{ $admin -> pass }} </td>
				</tr>
				<tr>
					<th>No KTP</th>
					<td> {{ $admin -> no_ktp }} </td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td> {{ $admin -> alamat }} </td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td> {{ $admin -> tmpt_lahir }} </td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td> {{ $admin -> tgl_lahir->format('d/m/Y') }}</td>
				</tr>
		</table>
	</div>
  </div>
</div>

@endsection