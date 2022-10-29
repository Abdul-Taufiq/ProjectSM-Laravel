<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Mobil;
use Carbon\Carbon;
use App\Models\Sewa;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sewa::all();
        return view ('CRUD Sewa.Sewa', compact('data'), [
            "tittle" => "Data Sewa"
        ],
        [
            'data'=>$data
        ]);
    }


      // CETAK DATA
    public function cetakdatasewa()
    {
        $data = Sewa::all()->sortBy('no_sewa');
        $pdf = PDF::loadView('CRUD Sewa.cetakdatasewa', ['cetakdatasewa' => $data]);
        return $pdf->stream('laporan-data-sewa.pdf');

    }    

    // CETAK DETAIL
    public function cetakdetaildatasewa(Sewa $sewa)
    {
         // $data = sewa::with('penduduk')->find($sewa);
       $pdf = PDF::loadView('CRUD Sewa.cetak-detail-datasewa', compact('sewa'));
       return $pdf->setPaper('a4','landscape')
                  ->stream('laporan-detail-data-sewa.pdf');
    }

    // CETAK Pertanggal
    public function cetakpertanggal($tglawal, $tglakhir)
    {
        $tgl1 = $tglawal;
        $tgl2 = $tglakhir;
        $dateawal = Carbon::createFromFormat('d-m-Y', $tglawal)->format('Y-m-d');
        $dateakhir = Carbon::createFromFormat('d-m-Y', $tglakhir)->format('Y-m-d');

        if ( strtotime($tglakhir) < strtotime($tglawal) ) {
             return redirect('sewa')->with('statuserror', 'GAGAL MENCETAK LAPORAN, PASTIKAN TANGGAL AKHIR LEBIH BESAR DARI TANGGAL AWAL!');
        }
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal = Sewa::with('pelanggan')->whereBetween('created_at',[$dateawal, $dateakhir])->get()->sortBy('no_sewa');
        // return view('CRUD sewa.cetakdatasewa-pertanggal',  compact('cetakpertanggal'));
        $pdf = PDF::loadView('CRUD Sewa.cetakdatasewa-pertanggal', 
            ['cetakpertanggal' => $cetakpertanggal, 'tgl1' => $tgl1, 'tgl2' => $tgl2]);
        return $pdf ->setPaper('a4','landscape')
                    ->stream('laporan-datasewa-pertanggal.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::all();
        $mobil = Mobil::all();
        $pelanggan = Pelanggan::all();
        return view ('CRUD Sewa.addsewa', compact('admin','mobil','pelanggan'), [
            "tittle" => "Tambah Data Sewa"
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // FORM VALIDASI
        $request->validate([
            'no_sewa' => 'required|min:3|unique:tb_sewa',
            'tgl_sewa' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d',
            'lama_sewa' => 'required|min:3',
            'keterangan_denda' => 'required',
            'biaya_sewa' => 'required|numeric',
            'denda' => 'required|numeric',
            'total_biaya' => 'required|numeric',
        ], [
            // PESAN ERROR
            'no_sewa.min' => 'Nomor Sewa Harus Memiliki 3 Karakter!',
            'lama_sewa.min' => 'Lama Sewa Harus Memiliki 3 Karakter!',
            'no_sewa.unique' => 'Nomor Sewa Sudah Tersedia!',
            'tgl_sewa.date_format:Y-m-d' => 'Format Tanggal Tidak Valid!',
            'tgl_kembali.date_format:Y-m-d' => 'Format Tanggal Tidak Valid!',
            'biaya_sewa.numeric' => 'Biaya Sewa Harus Menggunakan Angka!',
            'denda.numeric' => 'Denda Harus Menggunakan Angka!',
            'total_biaya.numeric' => 'Denda Harus Menggunakan Angka!',
        ]);


        \DB::table('tb_sewa')->insert([
            'id_admin' => $request -> admin ,
            'id_mobil' => $request -> mobil ,
            'id_pelanggan' => $request -> pelanggan ,
            'no_sewa' => $request -> no_sewa ,
            'tgl_sewa' => $request -> tgl_sewa ,
            'tgl_kembali' => $request -> tgl_kembali ,
            'lama_sewa' => $request -> lama_sewa ,
            'biaya_sewa' => $request -> biaya_sewa ,
            'denda' => $request -> denda ,
            'keterangan_denda' => $request -> keterangan_denda ,
            'total_biaya' => $request -> total_biaya ,
            'created_at' => now(),
        ]);
        return redirect('sewa')->with('status', 'DATA SEWA BERHASIL DITAMBAH!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function show(Sewa $sewa)
    {
        return view ('CRUD Sewa.detailsewa', compact('sewa'),
        [
            "tittle" => "Detail Data Sewa"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Sewa $sewa)
    {
        $data = Sewa::all();
        $admin = Admin::all();
        $mobil = Mobil::all();
        $pelanggan = Pelanggan::all();
        return view ('CRUD Sewa.updatesewa', compact('sewa', 'data','admin','mobil','pelanggan'),
        [
            "tittle" => "Edit Data Sewa"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sewa $sewa)
    {
        // FORM VALIDASI
        $request->validate([
            'no_sewa' => 'required|min:3|unique:tb_sewa',
            'tgl_sewa' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d',
            'lama_sewa' => 'required|min:3',
            'keterangan_denda' => 'required',
            'biaya_sewa' => 'required|numeric',
            'denda' => 'required|numeric',
            'total_biaya' => 'required|numeric',
        ], [
            // PESAN ERROR
            'no_sewa.min' => 'Nomor Sewa Harus Memiliki 3 Karakter!',
            'lama_sewa.min' => 'Lama Sewa Harus Memiliki 3 Karakter!',
            'no_sewa.unique' => 'Nomor Sewa Sudah Tersedia!',
            'tgl_sewa.date_format:Y-m-d' => 'Format Tanggal Tidak Valid!',
            'tgl_kembali.date_format:Y-m-d' => 'Format Tanggal Tidak Valid!',
            'biaya_sewa.numeric' => 'Biaya Sewa Harus Menggunakan Angka!',
            'denda.numeric' => 'Denda Harus Menggunakan Angka!',
            'total_biaya.numeric' => 'Denda Harus Menggunakan Angka!',
        ]);

        Sewa::where('id_sewa', $sewa->id_sewa)
        ->update([
            'id_admin' => $request -> admin ,
            'id_mobil' => $request -> mobil ,
            'id_pelanggan' => $request -> pelanggan ,
            'no_sewa' => $request -> no_sewa ,
            'tgl_sewa' => $request -> tgl_sewa ,
            'tgl_kembali' => $request -> tgl_kembali ,
            'lama_sewa' => $request -> lama_sewa ,
            'biaya_sewa' => $request -> biaya_sewa ,
            'denda' => $request -> denda ,
            'keterangan_denda' => $request -> keterangan_denda ,
            'total_biaya' => $request -> total_biaya ,
            'updated_at' => now(),
        ]);
        return redirect('sewa')->with('status', 'DATA SEWA BERHASIL DIUBAH!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sewa $sewa)
    {
        $sewa->delete();
        return redirect('sewa')->with('status', 'DATA SEWA BERHASIL HAPUS!');
    }
}
