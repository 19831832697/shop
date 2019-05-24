<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PraiseModel extends Model
{
    //
    protected $table="shop_praise";
    public $timestamps = false;
    protected $primaryKey="praise_id";
}
