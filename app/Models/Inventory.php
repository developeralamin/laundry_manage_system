<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
   
      protected $fillable =['supply_id','qty','sotck_note'];


   public function supply(){
     	return $this->belongsTo(Supply::class,'supply_id','id');
   }

}
