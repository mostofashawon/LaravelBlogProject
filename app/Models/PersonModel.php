<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{
    use HasFactory;
    protected $table='persons';
        
    public function address(){
        
              return $this->belongsTo(AddressModel::class,'person_id');
              
         }

}
