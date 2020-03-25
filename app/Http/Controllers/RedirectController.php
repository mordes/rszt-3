<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index($user)
    {
        return view('redirect');
    }
}
