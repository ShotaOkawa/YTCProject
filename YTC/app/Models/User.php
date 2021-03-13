<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DB;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    public function getData($name,$pass)
    {
      $data = DB::table($this->table)->where('name', '=', $name)->where('password', '=', $pass)->get();
  
      return $data;
    }
}
