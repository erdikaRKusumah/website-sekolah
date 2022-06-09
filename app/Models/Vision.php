<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vision extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function getRoutekeyName()
    // {
    //     return 'slug';
    // }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}


