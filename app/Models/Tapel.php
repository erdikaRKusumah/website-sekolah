<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tapel extends Model
{
    protected $table = 'tapel';
    protected $guarded = ['id'];
    use HasFactory;

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
