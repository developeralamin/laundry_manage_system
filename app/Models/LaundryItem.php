<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryItem extends Model
{
    use HasFactory;
     protected $fillable = ['laundry_category_id','weight','laundry_id','unit_price','amount'];
}
