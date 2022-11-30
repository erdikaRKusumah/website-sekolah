<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    protected $table = 'pembelajaran';
    protected $guarded = ['id'];
    use HasFactory;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    //

    public function rencana_penilaian_formatif()
    {
        return $this->hasMany(RencanaPenilaianFormatif::class);
    }

    public function rencana_penilaian_sumatif()
    {
        return $this->hasMany(RencanaPenilaianSumatif::class);
    }

    public function rencana_bobot_penilaian()
    {
        return $this->hasOne(RencanaBobotPenilaian::class);
    }

    public function nilai_suamtif_akhir()
    {
        return $this->hasMany(NilaiSumatifAkhir::class);
    }

    public function nilai_akhir_rapot()
    {
        return $this->hasMany(NilaiAkhirRapot::class);
    }
}
