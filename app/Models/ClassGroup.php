<?php

namespace App\Models;

use App\Http\Controllers\Teacher\nilaisumatifController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    //

    public function nilai_formatif()
    {
        return $this->hasOne(NilaiFormatif::class);
    }

    public function nilai_sumatif()
    {
        return $this->hasOne(NilaiSumatif::class);
    }

    public function nilai_sumatif_akhir()
    {
        return $this->hasOne(NilaiSumatifAkhir::class);
    }

    public function nilai_akhir_rapot()
    {
        return $this->hasMany(NilaiAkhirRapot::class);
    }
}
