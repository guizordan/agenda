<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Place extends Model
  {
    public $fillable = ['neighborhood', 'street', 'number'];
  }
