<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

Class Celana extends Model
{

  public $table = 't_celana';

  protected $fillable = ['nama_celana','ukuran_celana','bahan','tipe_celana','stok'];

}
