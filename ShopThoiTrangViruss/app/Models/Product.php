<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'id_category',
        'id_manufacturer',
        'name_product',
        'quantity_product',
        'price_product',
        'image_address_product',
        'describe_product',
        'specifications',
    ];
}
