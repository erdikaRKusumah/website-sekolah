<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSumatif extends Model
{
    protected $table = 'nilai_sumatif';
    protected $guarded = ['id'];
    use HasFactory;

    public function rencana_penilaian_sumatif()
    {
        return $this->belongsTo(RencanaPenilaianSumatif::class);
    }

    public function class_group()
    {
        return $this->belongsTo(ClassGroup::class);
    }
}
