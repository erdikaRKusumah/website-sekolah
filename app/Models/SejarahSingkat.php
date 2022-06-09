<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class SejarahSingkat extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'sejarah_singkat';

    protected $guarded = ['id'];

    public function getRoutekeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
