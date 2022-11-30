<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingMapel extends Model
{
    protected $table = 'mapping_mapel';
    protected $guarded = ['id'];
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
