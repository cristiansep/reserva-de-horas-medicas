<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [

        'description',
        'specialty_id',
        'doctor_id',
        'patient_id',
        'schedule_date',
        'schedule_time',
        'type'

    ];

    public function specialty() {

        return $this->belongsTo(Specialty::class);

    }

    public function doctor() {

        return $this->belongsTo(User::class);

    }

    public function patient() {

        return $this->belongsTo(User::class);

    }

    public function getScheduleTimeNewAttribute() {
        return (new Carbon($this->schedule_time))->format('H:i');
    }

    public function getScheduleDateNewAttribute() {
        return (new Carbon($this->schedule_time))->format('d-m-Y');
    }
}
