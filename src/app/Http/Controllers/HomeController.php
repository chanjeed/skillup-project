<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Model\Image;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('id', 'desc')->get(); // 全データの取り出し
        return view('home', ["images" => $images]); // homeにデータを渡す
    }

}
