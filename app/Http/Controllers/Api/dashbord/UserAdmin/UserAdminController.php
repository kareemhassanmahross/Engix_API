<?php

namespace App\Http\Controllers\Api\dashbord\UserAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index()
    {
        $Users = Admin::get();
        return response($Users, 200);
    }
}