<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppTestController extends Controller
{


    public function testAuth()
    {
        return auth()->user();
    }
}
