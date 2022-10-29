@extends('layout.main')

@section('konten')

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Cetak Data Pelanggan Pertanggal</h1>

		<label>Tanggal Awal</label>
		 <input name="tglawal" id="tglawal" required data-provide="print" 
		 	class="print" style="width: 150px;" placeholder="DD-MM-YYYY" maxlength="10">
		<label>Tanggal Akhir</label>
		 <input name="tglakhir" id="tglakhir" required data-provide="print" 
		 	class="print" style="width: 150px;" placeholder="DD-MM-YYYY" maxlength="10">
			<a href="" onclick="this.href='/pelanggan/cetak/cetakdatapelanggan-pertanggal/'+ document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value" class="btn btn-primary btn-icon-split btn-sm mb-2" target="_blank" >
				<span class="icon text-white-50">
					<i class="fa fa-print" aria-hidden="true"></i>
				</span>
				<span class="text">Cetak Per Tanggal</span>
			</a>


@endsection