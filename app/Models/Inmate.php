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

    public function inmateFingerprint(){
        return $this->hasOne(InmateFingerprint::class);
    }

    public function inmateAttendances(){
        return $this->hasMany(InmateAttendance::class);
    }

    public function personalInformation(){
        return $this->hasOne(PersonalInformation::class);
    }

    public function actions(){
        return $this->hasMany(Action::class);
    }

    public function descriptiveInformation(){
        return $this->hasOne(DescriptiveInformation::class);
    }
}
