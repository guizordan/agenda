<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Appointment extends Model
  {
    public $fillable = ['description','date','time','place_id','people'];

    public function people() {
	    return $this->belongsToMany('App\People', "appointment_people");
    }

    public function place() {
	    return $this->belongsTo('App\Place');
    }
  }
