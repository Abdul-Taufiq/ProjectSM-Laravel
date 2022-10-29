<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mobil::all();
        return view ('CRUD Mobil.Mobil', compact('data'), [
            "tittle" => "Data Mobil"
        ],
        [
            'data'=>$data
        ]);
    }


     // CETAK DATA
    public function cetakdatamobil()
    {
        $data = Mobil::all()->sortBy('no_stnk');
        $pdf = PDF::loadView('CRUD Mobil.cetakdatamobil', ['cetakdatamobil' => $data]);
        return $pdf->stream('laporan-data-mobil.pdf');

    }    

    // CETAK DETAIL
    public function cetakdetaildatamobil(mobil $mobil)
    {
         // $data = mobil::with('sewa')->find($mobil);
       $pdf = PDF::loadView('CRUD Mobil.cetak-detail-datamobil', compact('mobil'));
       return $pdf->stream('laporan-detail-data-mobil.pdf');
    }

    // CETAK Pertanggal
    public function cetakpertanggal($tglawal, $tglakhir)
    {
        $tgl1 = $tglawal;
        $tgl2 = $tglakhir;
        $dateawal = Carbon::createFromFormat('d-m-Y', $tglawal)->format('Y-m-d');
        $dateakhir = Carbon::createFromFormat('d-m-Y', $tglakhir)->format('Y-m-d');

        if ( strtotime($tglakhir) < strtotime($tglawal) ) {
             return redirect('mobil')->with('statuserror', 'GAGAL MENCETAK LAPORAN, PASTIKAN TANGGAL AKHIR LEBIH BESAR DARI TANGGAL AWAL!');
        }
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal = Mobil::with('sewa')->whereBetween('created_at',[$dateawal, $dateakhir])->get()->sortBy('no_stnk');
        // return view('CRUD mobil.cetakdatamobil-pertanggal',  compact('cetakpertanggal'));
        $pdf = PDF::loadView('CRUD Mobil.cetakdatamobil-pertanggal', 
            ['cetakpertanggal' => $cetakpertanggal, 'tgl1' => $tgl1, 'tgl2' => $tgl2]);
        return $pdf->stream('laporan-datamobil-pertanggal.pdf');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('CRUD Mobil.addmobil', [
            "tittle" => "Tambah Data Mobil"
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
            'no_stnk' => 'required|min:000|numeric',
            'no_mesin' => 'required|min:000|numeric',
            'no_plat' => 'required|min:3',
            'merk' => 'required',
            'warna' => 'required',
            'harga' => 'required|numeric',
            'status_mobil' => 'required',
        ], [
            // PESAN ERROR
            'no_stnk.min' => 'Nomor STNK Harus Memiliki 3 Karakter!',
            'no_stnk.numeric' => 'Nomor STNK Harus Menggunakan Angka!',
            'no_mesin.min' => 'Nomor Mesin Harus Memiliki 3 Karakter!',
            'no_mesin.numeric' => 'Nomor Mesin Harus Numerik!',
            'no_plat.min' => 'Nomor Plat Harus Memiliki 3 Karakter!',
            'harga.numeric' => 'Harga Harus Menggunakan Angka!',
        ]);

        \DB::table('tb_mobil')->insert([
            'no_stnk' => $request -> no_stnk ,
            'no_mesin' => $request -> no_mesin ,
            'no_plat' => $request -> no_plat ,
            'merk' => $request -> merk ,
            'warna' => $request -> warna ,
            'harga' => $request -> harga ,
            'status_mobil' => $request -> status_mobil ,
            'created_at' => now(),
        ]);
        return redirect('mobil')->with('status', 'DATA MOBIL BERHASIL DITAMBAH!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        return view ('CRUD Mobil.detailmobil', compact('mobil'),
        [
            "tittle" => "Detail Data Mobil"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil)
    {
        $data = Mobil::all();
        return view ('CRUD Mobil.updatemobil', compact('mobil', 'data'),
        [
            "tittle" => "Edit Data Mobil"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        // FORM VALIDASI
        $request->validate([
            'no_stnk' => 'required|min:000|numeric',
            'no_mesin' => 'required|min:000|numeric',
            'no_plat' => 'required|min:3',
            'merk' => 'required',
            'warna' => 'required',
            'harga' => 'required|numeric',
            'status_mobil' => 'required',
        ], [
            // PESAN ERROR
            'no_stnk.min' => 'Nomor STNK Harus Memiliki 3 Karakter!',
            'no_stnk.numeric' => 'Nomor STNK Harus Menggunakan Angka!',
            'no_mesin.min' => 'Nomor Mesin Harus Memiliki 3 Karakter!',
            'no_mesin.numeric' => 'Nomor Mesin Harus Numerik!',
            'no_plat.min' => 'Nomor Plat Harus Memiliki 3 Karakter!',
            'harga.numeric' => 'Harga Harus Menggunakan Angka!',
        ]);
        
        Mobil::where('id_mobil', $mobil->id_mobil)
        ->update([
            'no_stnk' => $request -> no_stnk ,
            'no_mesin' => $request -> no_mesin ,
            'no_plat' => $request -> no_plat ,
            'merk' => $request -> merk ,
            'warna' => $request -> warna ,
            'harga' => $request -> harga ,
            'status_mobil' => $request -> status_mobil ,
            'updated_at' => now(),
        ]);
        return redirect('mobil')->with('status', 'DATA MOBIL BERHASIL DIUBAH!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        return redirect('mobil')->with('status', 'DATA MOBIL BERHASIL HAPUS!');
    }
}
