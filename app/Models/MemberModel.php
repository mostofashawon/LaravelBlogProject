<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    use HasFactory;

    protected $table= 'members';

      public function groupInfo(){ 
       return $this->hasOne(GroupModel::class,'group_id');
        //  return $this->belongsTo(GroupModel::class,'group_id');
       // return $this->hasMany(GroupModel::class,'group_id');

    
     }
}
