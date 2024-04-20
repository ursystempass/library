<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('welcome', compact('setting'));
    }
}
