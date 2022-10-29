@extends('layout.main')

@section('konten')
<!-- ISI KONTEN -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-plus-circle"></i> Tambah Data Mobil</h1>

	<div class="card shadow mb-4">
		<div class="card-body">

			<form action="  {{ url('mobil') }} " method="post" enctype="multipart/form-data">
				{{-- CSRF TOKEN --}}
				@csrf
				<div class="form-group">
					<label>Nomor STNK</label>
					<input type="text" name="no_stnk" autocomplete="off" required maxlength="16" value="{{ old('no_stnk') }}"
					class="form-control @error('no_stnk') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('no_stnk')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Nomor Mesin</label>
					<input type="text" name="no_mesin" autocomplete="off" required maxlength="16" value="{{ old('no_mesin') }}"
					class="form-control @error('no_mesin') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('no_mesin')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Nomor Plat</label>
					<input type="text" name="no_plat" autocomplete="off" required maxlength="16" value="{{ old('no_plat') }}"
					class="form-control @error('no_plat') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('no_plat')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Merk mobil</label>
					<input type="text" name="merk" autocomplete="off" required value="{{ old('merk') }}"
					class="form-control @error('merk') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('merk')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Warna mobil</label>
					<input type="text" name="warna" autocomplete="off" required value="{{ old('warna') }}"
					class="form-control @error('warna') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('warna')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Harga Sewa</label>
					<input type="text" name="harga" autocomplete="off" required value="{{ old('harga') }}"
					class="form-control @error('harga') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('harga')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Status Mobil</label>
					<select name="status_mobil" id="status_mobil" name="status_mobil" autocomplete="off"  value="{{ old('status_mobil') }}" class="form-control @error('status_mobil') is-invalid @enderror">
							<option value="" disabled selected hidden>Opsional</option>
							<option value="Kosong">Kosong</option>
							<option value="Telah Disewa">Telah Disewa</option>
					</select>
					{{-- Erorr Message --}}
					@error('status_mobil')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="modal-footer">
					<a href=" /mobil " class="btn btn-danger btn-icon-split">
						<span class="icon text-white">
							Kembali
						</span>
					</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>


	@endsection