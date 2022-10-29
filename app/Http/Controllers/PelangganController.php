<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pelanggan::all();
        return view ('CRUD Pelanggan.Pelanggan', compact('data'), [
            "tittle" => "Data Pelanggan"
        ],
        [
            'data'=>$data
        ]);
    }

    // CETAK DATA
    public function cetakdatapelanggan()
    {
        $data = Pelanggan::all()->sortBy('no_stnk');
        $pdf = PDF::loadView('CRUD Pelanggan.cetakdatapelanggan', ['cetakdatapelanggan' => $data]);
        return $pdf->setPaper('a4','landscape')
                   ->stream('laporan-data-pelanggan.pdf');

    }    

    // CETAK DETAIL
    public function cetakdetaildatapelanggan(pelanggan $pelanggan)
    {
         // $data = pelanggan::with('sewa')->find($pelanggan);
       $pdf = PDF::loadView('CRUD Pelanggan.cetak-detail-datapelanggan', compact('pelanggan'));
       return $pdf->stream('laporan-detail-data-pelanggan.pdf');
    }

    // CETAK Pertanggal
    public function cetakpertanggal($tglawal, $tglakhir)
    {
        $tgl1 = $tglawal;
        $tgl2 = $tglakhir;
        $dateawal = Carbon::createFromFormat('d-m-Y', $tglawal)->format('Y-m-d');
        $dateakhir = Carbon::createFromFormat('d-m-Y', $tglakhir)->format('Y-m-d');

        if ( strtotime($tglakhir) < strtotime($tglawal) ) {
             return redirect('pelanggan')->with('statuserror', 'GAGAL MENCETAK LAPORAN, PASTIKAN TANGGAL AKHIR LEBIH BESAR DARI TANGGAL AWAL!');
        }
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal = pelanggan::with('sewa')->whereBetween('tgl_lahir',[$dateawal, $dateakhir])->get()->sortBy('tgl_lahir');
        // return view('CRUD pelanggan.cetakdatapelanggan-pertanggal',  compact('cetakpertanggal'));
        $pdf = PDF::loadView('CRUD Pelanggan.cetakdatapelanggan-pertanggal', 
            ['cetakpertanggal' => $cetakpertanggal, 'tgl1' => $tgl1, 'tgl2' => $tgl2]);
        return $pdf->setPaper('a4','landscape')
                    ->stream('laporan-datapelanggan-pertanggal.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('CRUD Pelanggan.addpelanggan', [
            "tittle" => "Tambah Data pelanggan"
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
            'no_ktp' => 'required|min:000|max:9999999999999999|numeric',
        ], [
            // PESAN ERROR
            'no_ktp.min' => 'Nomor KTP Harus Memiliki 3 Karakter!',
            'no_ktp.numeric' => 'Nomor KTP Harus Menggunakan Angka!',
        ]);

        // ELOQUEN ORM
        $data = $request->all();
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d');
        $pelanggan  = Pelanggan::create($data);

        return redirect('pelanggan')->with('status', 'DATA PELANGGAN BERHASIL DITAMBAH!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        return view ('CRUD Pelanggan.detailpelanggan', compact('pelanggan'),
        [
            "tittle" => "Detail Data Pelanggan"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        $data = Pelanggan::all();
        return view ('CRUD pelanggan.updatepelanggan', compact('pelanggan', 'data'),
        [
            "tittle" => "Edit Data Pelanggan"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        // FORM VALIDASI
        $request->validate([
            'no_ktp' => 'required|min:000|max:9999999999999999|numeric',
        ], [
            // PESAN ERROR
            'no_ktp.min' => 'Nomor KTP Harus Memiliki 3 Karakter!',
            'no_ktp.numeric' => 'Nomor KTP Harus Menggunakan Angka!',
        ]);

        $pelanggan->nama = $request->nama ;
        $pelanggan->no_ktp = $request->no_ktp ;
        $pelanggan->sim = $request->sim ;
        $pelanggan->alamat = $request->alamat ;
        $pelanggan->tmpt_lahir = $request->tmpt_lahir ;
        $pelanggan->tgl_lahir =  Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d'); ;
        $pelanggan->save();

        return redirect('pelanggan')->with('status', 'DATA PELANGGAN BERHASIL DIUBAH!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('pelanggan')->with('status', 'DATA PELANGGAN BERHASIL DIHAPUS!');
    }
}
