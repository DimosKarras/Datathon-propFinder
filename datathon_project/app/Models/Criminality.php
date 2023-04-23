<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criminality extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'year',
        'homicide',
        'break_in',
        'joyriding',
        'heist'
    ];
}
