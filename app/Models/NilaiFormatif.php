<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiFormatif extends Model
{
    protected $table = 'nilai_formatif';
    protected $guarded = ['id'];
    use HasFactory;

    public function rencana_penilaian_formatif()
    {
        return $this->belongsTo(RencanaPenilaianFormatif::class);
    }

    public function class_group()
    {
        return $this->belongsTo(ClassGroup::class);
    }
}
