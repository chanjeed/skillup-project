<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\DB;
use App\Model\Image;
 use App\Model\Like;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $likes = Like::all();

        if(isset($_GET['page-button'])){
          $start = $_GET['page-button'];
        }
        else{
          $start=0;
        }

        $images = Image::orderBy('id', 'desc')->skip($start)->take(10)->get(); // 全データの取り出し
        $images_num = Image::count();

        $token = $request->session()->get('github_token', null);

        try {
            $github_user = Socialite::driver('github')->userFromToken($token);
        } catch (\Exception $e) {
            //return redirect('login/github');
            return view('home', ["images" => $images,"likes"=> $likes,"images_num"=>$images_num]); // homeにデータを渡す
        }





        return view('home', ["images" => $images,"likes"=> $likes,"username"=>$github_user->nickname,"images_num"=>$images_num]); // homeにデータを渡す
    }



}
