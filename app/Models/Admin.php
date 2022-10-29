<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='tb_admin';
    protected $dates =['tgl_lahir'];
    protected $primaryKey = 'id_admin';

    public function setTgl_LahirAttribute($value){
    	$this->attributes['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public $timestamps = false;

    protected $fillable = ['email', 'username', 'pass', 'no_ktp', 'alamat', 'tmpt_lahir', 'tgl_lahir'];

    public function sewa()
    {
        return $this->hasMany(Sewa::class, 'id_admin', 'id_admin');
    }
}
