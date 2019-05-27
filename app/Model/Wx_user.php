<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wx_user extends Model
{
    //
    protected $table="wx_user";
    public $timestamps = false;
    protected $primaryKey="wx_id";
}
