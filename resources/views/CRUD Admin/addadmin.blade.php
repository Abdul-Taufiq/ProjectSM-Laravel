@extends('layout.main')

@section('konten')
<!-- ISI KONTEN -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-plus-circle"></i> Tambah Data Admin</h1>

	<div class="card shadow mb-4">
		<div class="card-body">

			<form action="  {{ url('admin') }} " method="post" enctype="multipart/form-data">
				{{-- CSRF TOKEN --}}
				@csrf
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" autocomplete="off" required value="{{ old('email') }}"
					class="form-control @error('email') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('email')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" autocomplete="off" required maxlength="16" value="{{ old('username') }}"
					class="form-control @error('username') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('username')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" name="pass" autocomplete="off" required maxlength="16" value="{{ old('pass') }}"
					class="form-control @error('pass') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('pass')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>No KTP</label>
					<input type="text" name="no_ktp" autocomplete="off" maxlength="16" required value="{{ old('no_ktp') }}"
					class="form-control @error('no_ktp') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('no_ktp')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" autocomplete="off" required value="{{ old('alamat') }}"
					class="form-control @error('alamat') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('alamat')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tmpt_lahir" autocomplete="off" required value="{{ old('tmpt_lahir') }}"
					class="form-control @error('tmpt_lahir') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('tmpt_lahir')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" name="tgl_lahir" id="tgl_lahir" required data-provide="datepicker" required value="{{ old('tgl_lahir') }}"
					class="datepicker @error('tgl_lahir') is-invalid @enderror" style="width: 100%;" placeholder="DD/MM/YYYY" maxlength="10">
					@error('tgl_lahir')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="modal-footer">
					<a href=" /admin " class="btn btn-danger btn-icon-split">
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