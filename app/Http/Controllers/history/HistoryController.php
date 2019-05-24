<?php

namespace App\Http\Controllers\history;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    /**
     * 浏览历史
     */
    public function history(Request $request){
//        $user_id=session('uid');
        $user_id=1;
        if(empty($user_id)){
            
        }
    }
}
