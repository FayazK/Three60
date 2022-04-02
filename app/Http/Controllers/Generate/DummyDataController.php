<?php

namespace App\Http\Controllers\Generate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 *
 */
class DummyDataController extends Controller
{
    public function loremIpsum()
    {
        return inertia( 'generate/lorem-ipsum' );
    }
}// DummyDataController
