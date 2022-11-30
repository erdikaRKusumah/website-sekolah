<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function tapel()
    {
        return $this->belongsTo(Tapel::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function class_group()
    {
        return $this->hasMany(ClassGroup::class);
    }

    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class);
    }

    public function kkm_mapel()
    {
        return $this->hasOne(KkmMapel::class);
    }
}
