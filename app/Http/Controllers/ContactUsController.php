<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index()
    {
        // dd(Auth::guard('admins'));
        if (Auth::guard('admins')) {
            dd("this is Admin YA Kareem ");
        } elseif (Auth::guard('users')) {
            dd("this is Admin YA Kareem " . auth()->guard('users')->user()->name);
        }
    }
}