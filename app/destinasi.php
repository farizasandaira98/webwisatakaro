<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destinasi extends Model
{
  protected $table = 'destinasis';
  protected $fillable = ['namadestinasi','lokasidestinasi','deskripsi','gambardestinasi'];
}
