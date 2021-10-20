<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryList extends Model
{
    use HasFactory;


 protected $fillable = ['customer_name','status','queue','total_amount','pay_status','amount_tendered','amount_change','remarks'];

}
