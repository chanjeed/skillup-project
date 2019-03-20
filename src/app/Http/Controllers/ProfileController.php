<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\DB;
use App\Model\Image;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $token = $request->session()->get('github_token', null);

        try {
            $github_user = Socialite::driver('github')->userFromToken($token);
          } catch (\Exception $e) {
          return redirect('login/github');
        }

        $images = Image::orderBy('id', 'desc')->where('username', $github_user->nickname)->get(); // 全データの取り出し

        $icon = DB::select("select image from public.user where github_id = '$github_user->nickname'")->get();

        return view('profile',["image_username" => $github_user->nickname,"images"=>$images,"icon"=> $icon[0]]);
    }





}
