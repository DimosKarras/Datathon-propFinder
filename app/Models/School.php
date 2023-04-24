<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'region' ,
        'management',
        'district',
        'municipality',
        'commune',
        'school',
        'type',
        'name',
        'phone',
        'fax',
        'email',
        'address',
        'zip_code'
    ];
}
