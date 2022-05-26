<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
}
