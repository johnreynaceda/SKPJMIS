<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inmate()
    {
        return $this->belongsTo(Inmate::class);
    }
}
