<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{

  protected $table = 'bookings';
  protected $fillable = ['tanggaltourberangkat','tanggaltourbalik','batasbayar','haritour','name','no_telp','lokasi_jemput','idtour','status_bayar','totalbayar','idsopir'];

  public function paket_tours()
      {
        return $this->belongsTo(paket_tour::class,'idtour');
      }

      public function supir()
          {
            return $this->belongsTo(supir::class,'idsopir');
          }

}
