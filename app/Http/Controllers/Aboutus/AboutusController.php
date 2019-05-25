<?php

namespace App\Http\Controllers\Aboutus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    //关于我们
    public function aboutus(){
        return view('aboutus.abolist');
    }
}
