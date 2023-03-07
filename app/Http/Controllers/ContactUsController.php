<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class ContactUsController extends Controller
{

    public function index()
    {
        // $images = [
        //         'image' :{
        //                 'name':'1.JPG',
        //             }
        // ];
        // // $images = json_encode($images);
        // shuffle($images);
        // $file = json_encode($images[0]);
        // dd(gettype(json_decode($file)));
        // $extention = $file->getClientOriginalExtension();
        // $filename = "Image" .  time() . '.' . $extention;
        // $path =  url('/images/seeder/' . $filename);
    }
}