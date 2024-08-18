<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellInmate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inmate(){
        return $this->belongsTo(Inmate::class);
    }

    public function cellBlock(){
        return $this->hasMany(CellBlock::class);
    }
}
