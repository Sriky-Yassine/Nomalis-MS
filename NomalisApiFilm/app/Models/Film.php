<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Film extends Model 
{

use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','year', 'actors'
    ];

  
    // public $timestamps = false;

    //Tell laravel to fetch text values and set them as arrays
protected $casts = [
    'actors' => 'array',
    
    ];
}
