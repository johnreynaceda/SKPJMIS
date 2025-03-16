<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
   protected $guarded = [];

   public function staffAttendances(){
    return $this->hasMany(StaffAttendance::class);
   }

   public function staffInfo(){
     return $this->hasOne(StaffInfo::class);
   }

   public function user(){
     return $this->belongsTo(User::class);
   }
}
