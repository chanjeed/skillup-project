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
        $token = $request->session()->get('github_token', null);

        try {
            $github_user = Socialite::driver('github')->userFromToken($token);
        } catch (\Exception $e) {
            return redirect('login/github');
        }

        $likes = Like::all();
        $images = Image::orderBy('id', 'desc')->get(); // 全データの取り出し
        return view('home', ["images" => $images,"likes"=> $likes,"username"=>$github_user->nickname]); // homeにデータを渡す
    }

    public function show($id) {
      $post = Image::findOrFail($id); // findOrFail 見つからなかった時の例外処理

      $like = $post->likes()->where('user_id', Auth::user()->id)->first();

      return view('home.show')->with(array('post' => $post, 'like' => $like));
    }

}
