<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobil_travel extends Model
{
  protected $table = 'mobil_travels';
  protected $fillable = ['namamobil','kapasitas','gambarmobil'];

  public function paket_tours()
  {
    return $this->hasMany(paket_tour::class);
  }
}
