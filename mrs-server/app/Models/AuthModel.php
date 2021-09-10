<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	protected $table                = 'users';
  public function cek_login($username)
  {
    $query =  $this->table($this->table)
    ->where('username', $username)
    ->countAll();

    // cek ada data atau tidak
    if($query > 0){
      $hasil = $this->table($this->table)
               ->where('username', $username)
               ->limit(1)
               ->get()
               ->getRowArray();
    } else {
      $hasil = array();
    }
    return $hasil;
  }




}
