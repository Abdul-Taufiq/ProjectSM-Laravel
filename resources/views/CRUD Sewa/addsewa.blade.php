@extends('layout.main')

@section('konten')
<!-- ISI KONTEN -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-plus-circle"></i> Tambah Data Sewa</h1>

	<div class="card shadow mb-4">
		<div class="card-body">

			<form action="  {{ url('sewa') }} " method="post" enctype="multipart/form-data">
				{{-- CSRF TOKEN --}}
				@csrf

			<div class="form-group">
			<a class="collapsed" href="#" data-toggle="collapse" data-target="#opsional"
			aria-expanded="true" aria-controls="opsional">
			<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
			<span style="font-weight: bold; ">OPSIONAL</span>
			<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
			</a>
				<div id="opsional" class="collapse" aria-labelledby="opsional">
				<div class="form-group">
				<div class="form-group">
					<label>Admin</label><br>
					<select id="admin" name="admin" autocomplete="off" class="form-control combobox
					@error('admin') is-invalid @enderror" style="width: 100%">
						<option value="" selected>- Nama Admin -</option>
            			@foreach ($admin as $item)
						<option value="{{ $item->id_admin }}" {{ old('admin') == $item->id_admin ? 'selected' : null }}>{{ $item->username }} ( {{ $item->no_ktp }} )
						</option>
			            @endforeach 
					</select>
					{{-- Erorr Message --}}
					@error('admin')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Mobil</label>
					<select id="mobil" name="mobil" autocomplete="off" class="form-control combobox
					@error('mobil') is-invalid @enderror" style="width: 100%">
						<option value="" selected>- Nama Mobil -</option>
            			@foreach ($mobil as $item)
						<option value="{{ $item->id_mobil }}" {{ old('mobil') == $item->id_mobil ? 'selected' : null }}>{{ $item->no_stnk }} ( {{ $item->merk }} {{ $item->warna }}, {{ $item->status_mobil }}  )
						</option>
			            @endforeach 
					</select>
					{{-- Erorr Message --}}
					@error('mobil')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Pelanggan</label>
					<select id="pelanggan" name="pelanggan" autocomplete="off" class="form-control combobox
					@error('pelanggan') is-invalid @enderror" style="width: 100%">
						<option value="" selected>- Nama Pelanggan -</option>
            			@foreach ($pelanggan as $item)
						<option value="{{ $item->id_pelanggan }}" {{ old('pelanggan') == $item->id_pelanggan ? 'selected' : null }}>{{ $item->nama }} ( {{ $item->no_ktp }} )
						</option>
			            @endforeach 
					</select>
					{{-- Erorr Message --}}
					@error('pelanggan')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
			</div>
			</div>
			</div>
				<div class="form-group">
					<label>Nomor Sewa</label>
					<input type="text" name="no_sewa" autocomplete="off" required maxlength="16" value="{{ old('no_sewa') }}"
					class="form-control @error('no_sewa') is-invalid @enderror" autofocus>
					{{-- Erorr Message --}}
					@error('no_sewa')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
				<label>Tanggal Sewa</label>
					<input type="text" name="tgl_sewa" id="tgl_sewa" required data-provide="inputdate" required value="{{ old('tgl_sewa') }}"
					class="inputdate @error('tgl_sewa') is-invalid @enderror" style="width: 100%;" placeholder="DD/MM/YYYY" maxlength="10">
					@error('tgl_sewa')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
				<label>Tanggal Kembali</label>
					<input type="text" name="tgl_kembali" id="tgl_kembali" required data-provide="inputdate" required value="{{ old('tgl_kembali') }}"
					class="inputdate @error('tgl_kembali') is-invalid @enderror" style="width: 100%;" placeholder="DD/MM/YYYY" maxlength="10">
					@error('tgl_kembali')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Lama Sewa</label>
					<input type="text" name="lama_sewa" autocomplete="off" required value="{{ old('lama_sewa') }}"
					class="form-control @error('lama_sewa') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('lama_sewa')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Biaya Sewa</label>
					<input type="text" name="biaya_sewa" autocomplete="off" required value="{{ old('biaya_sewa') }}"
					class="form-control @error('biaya_sewa') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('biaya_sewa')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Denda</label>
					<input type="text" name="denda" autocomplete="off" required value="{{ old('denda') }}"
					class="form-control @error('denda') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('denda')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Keterangan Denda</label>
					<input type="text" name="keterangan_denda" autocomplete="off" required value="{{ old('keterangan_denda') }}"
					class="form-control @error('keterangan_denda') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('keterangan_denda')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label>Total Biaya</label>
					<input type="text" name="total_biaya" autocomplete="off" required value="{{ old('total_biaya') }}"
					class="form-control @error('total_biaya') is-invalid @enderror">
					{{-- Erorr Message --}}
					@error('total_biaya')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
				<div class="modal-footer">
					<a href=" /sewa " class="btn btn-danger btn-icon-split">
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