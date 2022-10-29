<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewa = Sewa::all(); 
        $admin = Admin::all();
        $mobil = Mobil::all();
        $pelanggan = Pelanggan::all();
        return view('home', compact('sewa', 'admin', 'mobil', 'pelanggan'),[
            "tittle" => "Dashboard"
        ]);
    }

}
