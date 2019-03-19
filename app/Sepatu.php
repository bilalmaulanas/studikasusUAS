<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

Class Sepatu extends Model
{

  public $table = 't_sepatu';

  protected $fillable = ['nama_sepatu','ukuran_sepatu','warna_sepatu','stok'];

}
