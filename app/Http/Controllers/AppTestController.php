<?php

namespace App\Http\Controllers;

use App\Lib\FastResponse;
use Illuminate\Http\Request;

class AppTestController extends Controller
{
    public function testAuth()
    {
        return FastResponse::success(auth()->user());
    }
}
