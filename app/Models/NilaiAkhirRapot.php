<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkhirRapot extends Model
{
    protected $table = 'nilai_akhir_rapot';
    protected $guarded = ['id'];
    use HasFactory;

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    public function class_group()
    {
        return $this->belongsTo(ClassGroup::class);
    }

    // public function k13_deskripsi_nilai_siswa()
    // {
    //     return $this->hasOne('App\K13DeskripsiNilaiSiswa');
    // }
}
