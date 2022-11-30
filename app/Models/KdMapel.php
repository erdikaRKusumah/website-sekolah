<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KdMapel extends Model
{
    protected $table = 'kd_mapel';
    protected $guarded = ['id'];
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function rencana_penilaian_sumatif()
    {
        return $this->hasMany(RencanaPenilaianSumatif::class);
    }

    public function rencana_penilaian_formatif()
    {
        return $this->hasMany(RencanaPenilaianFormatif::class);
    }

    // public function k13_rencana_nilai_keterampilan()
    // {
    //     return $this->hasMany('App\K13RencanaNilaiKeterampilan');
    // }
}
