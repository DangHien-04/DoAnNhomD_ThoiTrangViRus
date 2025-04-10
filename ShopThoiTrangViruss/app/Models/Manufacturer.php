<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_manufacturer';

    protected $fillable = [
        'name_manufacturer',
        'image_manufacturer',
    ];
}
