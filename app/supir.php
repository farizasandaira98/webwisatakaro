<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supir extends Model
{
  public function bookings()
  {
    return $this->hasMany(booking::class);
  }

    protected $table = 'supir';
  	protected $fillable = ['id','nama_supir','kartu_anggota','status'];
}
