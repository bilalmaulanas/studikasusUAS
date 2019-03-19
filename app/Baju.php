<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

Class Baju extends Model
{

  public $table = 't_baju';

  protected $fillable = ['nama_baju','ukuran_baju','bahan','tipe_baju','stok'];

}
