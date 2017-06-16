<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class People extends Model
  {
    public $fillable = ['fullName','phone', 'email'];

    public function appointments() {
	    return $this->belongsToMany('App\Appointment', "appointment_people");
    }
  }
