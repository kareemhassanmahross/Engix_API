<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        if (auth()->guard('users')->check()) {
            echo "this is User YA Kareem " . auth()->guard('users')->user()->name;
        } elseif (auth()->guard('admins')->check()) {
            "this is Admin YA Kareem " . auth()->guard('users')->user()->name;
        }
    }
}