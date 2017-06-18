<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Goal extends Model
  {
    public $fillable = ['name','accomplished'];

    protected $attributes = array(
      'accomplished' => false,
    );
  }
