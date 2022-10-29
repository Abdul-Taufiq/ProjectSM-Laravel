<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table='tb_mobil';
    protected $dates =['created_at'];
    protected $primaryKey = 'id_mobil';

    public function sewa()
    {
        return $this->hasMany(Sewa::class, 'id_mobil', 'id_mobil');
    }
}
