<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rut','address','phone','role','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function specialties() {


        return $this->belongsToMany(Specialty::class)->withTimestamps();
    }


    public function scopePatients($query){

        return $query->where('role', 'patient');
    }

    public function scopeDoctors($query){

        return $query->where('role', 'doctor');
    }

    public function asDoctorAppointments() {

        return $this->hasMany(Appointment::class, 'doctor_id');

    }


    public function attendedAppointments() {

        return $this->asDoctorAppointments()->where('status', 'Atendida');

    }

    public function cancelledAppointments() {

        return $this->asDoctorAppointments()->where('status', 'Cancelada');

    }

    public function asPatientAppointments() {

        return $this->hasMany(Appointment::class, 'patient_id');

    }
}
