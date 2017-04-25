<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requets;

class StaticsController extends Controller
{
    public function profile() {

      return view('statics/profile');

    }
}
