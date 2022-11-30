<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaBobotPenilaian extends Model
{
    protected $table = 'rencana_bobot_penilaian';
    protected $guarded = ['id'];
    use HasFactory;

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }
}
