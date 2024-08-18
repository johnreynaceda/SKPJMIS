<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellBlock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cellInmates(){
        return $this->hasMany(CellInmate::class);
    }
}
