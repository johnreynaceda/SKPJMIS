<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function visitors(){
        return $this->hasMany(Visitor::class);
    }

    public function cellInmate(){
        return $this->hasOne(CellInmate::class);
    }
}
