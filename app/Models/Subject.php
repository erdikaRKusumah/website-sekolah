<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function tapel()
    {
        return $this->belongsTo(Tapel::class);
    }

    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class);
    }

    public function mapping_mapel()
    {
        return $this->hasOne(MappingMapel::class);
    }

    public function kkm_mapel()
    {
        return $this->hasOne(KkmMapel::class);
    }

    public function kd_mapel()
    {
        return $this->hasMany(KdMapel::class);
    }

}
