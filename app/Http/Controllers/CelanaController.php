<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use App\celana;

class CelanaController extends Controller
{

  public function create(Request $request)
  {
    $validation = Validator::make($request->all(), [
      'nama_celana' => 'required',
      'ukuran_celana' => 'required',
      'bahan' => 'required',
      'tipe_celana' => 'required',
      'stok' => 'required',
    ]);

    if ($validation->fails()) {
      $error = $validation->errors();
      return [
        'status'=>'error',
        'message'=>$error,
        'result'=>null
      ];
    }

    $result = \App\Celana::create($request->all());
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil ditambahkan',
        'result'=>$result
      ];
    }else {
      return[
        'status'=>'error',
        'message'=>'Data gagal di tambahkan',
        'result'=>null
      ];
    }
  }

public function read(Request $request)
{
  $result = \App\Celana::all();
  return [
    'status'=>'success',
    'message'=>'',
    'result'=>$result
  ];
}

public function update(Request $request, $id)
{
    $validation = Validator::make($request->all(), [
      'nama_celana' => 'required',
      'ukuran_celana' => 'required',
      'bahan' => 'required',
      'tipe_celana' => 'required',
      'stok' => 'required',
    ]);

    if ($validation->fails()) {
      $errors = $validation->errors();
      return [
        'status'=>'error',
        'message'=>$errors,
        'result'=>null
      ];
    }

    $celana = \App\Celana::find($id);
    if (empty($celana)) {
      return [
        'status'=>'error',
        'message'=>'Data tidak ditemukan',
        'result'=>null
      ];
    }

    $result= $celana->update($request->all());
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil diubah',
        'result'=>$result
      ];
    }else {
      return [
        'status'=>'error',
        'message'=>'Data gagal diubah',
        'result'=>null
      ];
    }
}

public function delete(Request $request, $id)
{

    $celana = \App\Celana::find($id);
    if (empty($celana)) {
      return [
        'status'=>'error',
        'message'=>'Data tidak ditemukan',
        'result'=>null
      ];
    }

    $result= $celana->delete($id);
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil dihapus',
        'result'=>$result
      ];
    }else {
      return [
        'status'=>'error',
        'message'=>'Data gagal dihapus',
        'result'=>null
      ];
    }
}

  public function detail($id)
  {
    $celana = Celana::find($id);

    if(empty($celana)){
      return [
        'status'=>'error',
        'message'=>'Data gagal ditemukan',
        'result'=>null
      ];
    }
      return [
        'status'=>'success',
        'result'=>$celana
      ];

  }

}



?>
