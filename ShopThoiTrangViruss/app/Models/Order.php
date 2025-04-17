<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'id_order';
    public $incrementing = true;
    protected $fillable = [
        'id_user',
        'total_order',
        'address',
        'created_at',
    ]; 
}
