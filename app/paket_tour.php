<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paket_tour extends Model
{
  public function mobil_travels()
      {
        return $this->belongsTo(mobil_travel::class,'id_travel');
      }

      public function bookings()
      {
        return $this->hasMany(booking::class);
      }

  protected $table = 'paket_tours';
  protected $fillable = ['namapaket','daftardestinasi','hargapaket','deskripsi','id_travel'];
}
