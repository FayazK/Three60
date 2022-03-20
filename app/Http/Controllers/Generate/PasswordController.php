<?php

namespace App\Http\Controllers\Generate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function simple(){

        return inertia('generate/simple-password');
    }
}
