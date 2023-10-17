<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function first(){

        $data = [
            'name' , 'rana gaballah', '21'
            
        ];

        return view('welcome',compact('data'));

    }
}
