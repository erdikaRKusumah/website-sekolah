<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSumatifAkhir extends Model
{
    protected $table = 'nilai_sumatif_akhir';
    protected $guarded = ['id'];

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    public function class_group()
    {
        return $this->belongsTo(ClassGroup::class);
    }
}
