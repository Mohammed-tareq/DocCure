<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'user_id',
        'date',
        'time',
        'status',

    ];


    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment()
{
    return $this->hasOne(Payment::class);
}

}

