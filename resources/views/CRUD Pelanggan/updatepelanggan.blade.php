@extends('layout.main')

@section('konten')
<!-- ISI KONTEN -->
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><i class="fa fa-edit"></i> Edit Data Pelanggan</h1>

<div class="card shadow mb-4">
        <div class="card-body">

        <form action="  {{ url('pelanggan/'.$pelanggan->id_pelanggan) }} " method="post" enctype="multipart/form-data">
                {{-- DEKLARASI METHODE ROUTING --}}
                @method('patch')
                {{-- CSRF TOKEN --}}
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" autocomplete="off" required value="{{ old('nama', $pelanggan->nama) }}"
                    class="form-control @error('nama') is-invalid @enderror" autofocus>
                    {{-- Erorr Message --}}
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No KTP</label>
                    <input type="text" name="no_ktp" autocomplete="off" maxlength="16" required value="{{ old('no_ktp', $pelanggan->no_ktp) }}"
                    class="form-control @error('no_ktp') is-invalid @enderror">
                    {{-- Erorr Message --}}
                    @error('no_ktp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>SIM</label>
                    <input type="text" name="sim" autocomplete="off" required maxlength="16" value="{{ old('sim', $pelanggan->sim) }}"
                    class="form-control @error('sim') is-invalid @enderror" autofocus>
                    {{-- Erorr Message --}}
                    @error('sim')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" autocomplete="off" required value="{{ old('alamat', $pelanggan->alamat) }}"
                    class="form-control @error('alamat') is-invalid @enderror">
                    {{-- Erorr Message --}}
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tmpt_lahir" autocomplete="off" required value="{{ old('tmpt_lahir', $pelanggan->tmpt_lahir) }}"
                    class="form-control @error('tmpt_lahir') is-invalid @enderror">
                    {{-- Erorr Message --}}
                    @error('tmpt_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" name="tgl_lahir" id="tgl_lahir" required data-provide="datepicker" required value="{{ old('tgl_lahir', $pelanggan->tgl_lahir->format('d/m/Y')) }}"
                    class="datepicker @error('tgl_lahir') is-invalid @enderror" style="width: 100%;" placeholder="YYYY/MM/DD" maxlength="10">
                    @error('tgl_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                        <a href=" /pelanggan " class="btn btn-danger btn-icon-split">
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