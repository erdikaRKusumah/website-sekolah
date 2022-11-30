<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilNilaiFormatif extends Model
{
    protected $table = 'hasil_nilai_formatif';
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
}
