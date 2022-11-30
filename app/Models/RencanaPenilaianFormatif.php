<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaPenilaianFormatif extends Model
{
    protected $table = 'rencana_penilaian_formatif';
    protected $guarded = ['id'];
    use HasFactory;

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    public function kd_mapel()
    {
        return $this->belongsTo(KdMapel::class);
    }

    public function nilai_formatif()
    {
        return $this->hasMany(NilaiSumatif::class);
    }
}
