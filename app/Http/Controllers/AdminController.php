<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        return view ('CRUD Admin.Admin', compact('data'), [
            "tittle" => "Data Admin"
        ],
        [
            'data'=>$data
        ]);
    }

    // CETAK DATA
    public function cetakdataadmin()
    {
        $data = Admin::all()->sortBy('no_stnk');
        $pdf = PDF::loadView('CRUD Admin.cetakdataadmin', ['cetakdataadmin' => $data]);
        return $pdf->setPaper('a4','landscape')
                   ->stream('laporan-data-admin.pdf');

    }    

    // CETAK DETAIL
    public function cetakdetaildataadmin(admin $admin)
    {
         // $data = admin::with('sewa')->find($admin);
       $pdf = PDF::loadView('CRUD Admin.cetak-detail-dataadmin', compact('admin'));
       return $pdf->stream('laporan-detail-data-admin.pdf');
    }

    // CETAK Pertanggal
    public function cetakpertanggal($tglawal, $tglakhir)
    {
        $tgl1 = $tglawal;
        $tgl2 = $tglakhir;
        $dateawal = Carbon::createFromFormat('d-m-Y', $tglawal)->format('Y-m-d');
        $dateakhir = Carbon::createFromFormat('d-m-Y', $tglakhir)->format('Y-m-d');

        if ( strtotime($tglakhir) < strtotime($tglawal) ) {
             return redirect('admin')->with('statuserror', 'GAGAL MENCETAK LAPORAN, PASTIKAN TANGGAL AKHIR LEBIH BESAR DARI TANGGAL AWAL!');
        }
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal = Admin::with('sewa')->whereBetween('tgl_lahir',[$dateawal, $dateakhir])->get()->sortBy('tgl_lahir');
        // return view('CRUD admin.cetakdataadmin-pertanggal',  compact('cetakpertanggal'));
        $pdf = PDF::loadView('CRUD Admin.cetakdataadmin-pertanggal', 
            ['cetakpertanggal' => $cetakpertanggal, 'tgl1' => $tgl1, 'tgl2' => $tgl2]);
        return $pdf->setPaper('a4','landscape')
                    ->stream('laporan-dataadmin-pertanggal.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('CRUD Admin.addadmin', [
            "tittle" => "Tambah Data Admin"
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
            'email' => 'email',
        ], [
            // PESAN ERROR
            'no_ktp.min' => 'Nomor KTP Harus Memiliki 3 Karakter!',
            'no_ktp.numeric' => 'Nomor KTP Harus Menggunakan Angka!',
            'email.email' => 'Email Yang Anda Masukan Tidak Valid!',
        ]);

        // ELOQUEN ORM
        $data = $request->all();
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d');
        $admin  = Admin::create($data);

        return redirect('admin')->with('status', 'DATA ADMIN BERHASIL DITAMBAH!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view ('CRUD Admin.detailadmin', compact('admin'),
        [
            "tittle" => "Detail Data Admin"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $data = Admin::all();
        return view ('CRUD Admin.updateadmin', compact('admin', 'data'),
        [
            "tittle" => "Edit Data Admin"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
         // FORM VALIDASI
        $request->validate([
            'no_ktp' => 'required|min:000|max:9999999999999999|numeric',
            'email' => 'email',
        ], [
            // PESAN ERROR
            'no_ktp.min' => 'Nomor KTP Harus Memiliki 3 Karakter!',
            'no_ktp.numeric' => 'Nomor KTP Harus Menggunakan Angka!',
            'email.email' => 'Email Yang Anda Masukan Tidak Valid!',
        ]);

        $admin->email = $request->email ;
        $admin->username = $request->username ;
        $admin->pass = $request->pass ;
        $admin->no_ktp = $request->no_ktp ;
        $admin->alamat = $request->alamat ;
        $admin->tmpt_lahir = $request->tmpt_lahir ;
        $admin->tgl_lahir =  Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d'); ;
        $admin->save();

        return redirect('admin')->with('status', 'DATA ADMIN BERHASIL DIUBAH!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('admin')->with('status', 'DATA ADMIN BERHASIL DIHAPUS!');
    }
}
