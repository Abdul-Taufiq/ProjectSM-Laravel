<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table='tb_pelanggan';
    protected $dates =['tgl_lahir'];
    protected $primaryKey = 'id_pelanggan';

    public function setTgl_LahirAttribute($value){
    	$this->attributes['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public $timestamps = false;

    protected $fillable = ['nama', 'no_ktp', 'sim', 'alamat', 'tmpt_lahir', 'tgl_lahir'];


    public function sewa()
    {
        return $this->hasMany(Sewa::class, 'id_pelanggan', 'id_pelanggan');
    }
}
