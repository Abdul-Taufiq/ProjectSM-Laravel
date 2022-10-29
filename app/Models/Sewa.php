<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table='tb_sewa';
    protected $dates =['tgl_sewa','tgl_kembali'];
    protected $primaryKey = 'id_sewa';
    protected $fillable = ['id_admin', 'id_mobil', 'id_pelanggan', 'no_sewa', 'tgl_sewa', 'tgl_kembali', 'lama_sewa', 'biaya_sewa', 'denda', 'keterangan_denda', 'total_biaya'];

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function Mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil', 'id_mobil');
    }

    public function Admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
