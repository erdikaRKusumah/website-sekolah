<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KkmMapel extends Model
{
    protected $table = 'kkm_mapel';
    protected $guarded = ['id'];
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
