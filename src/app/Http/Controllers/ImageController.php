<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\DB;
use App\Model\Image;
use App\Model\Like;

class ImageController extends Controller
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
        $image_id = $_GET['image-id'];

        $image = Image::findOrFail($image_id);


        return view('image',["image"=>$image,"username"=>$github_user->nickname]);
    }

    public function like(Request $request)
    {
        //$postId = $_GET["like-button"];
        //$token = $_GET["_token"];
        $postId = $request->input("like-button");
        $token = $request->session()->get('github_token', null);


        try {
            $github_user = Socialite::driver('github')->userFromToken($token);
          } catch (\Exception $e) {
          return redirect('login/github');
        }
        $username = $github_user->nickname;

        $now = date("Y/m/d H:i:s");

        $like = DB::select('select * from likes where post_id = ? and username = ?', [$postId,$username]);
        if (empty($like)) {
            Like::insert(["post_id" => $postId,"username"=>$username,"created_at"=>$now,"updated_at"=>$now]);
            Image::findOrFail($postId)->increment('like');
        }
        else{
          Like::where('post_id',$postId)->where('username',$username)->delete();
          Image::findOrFail($postId)->decrement('like');
        }




        return redirect('home/profile/image?image-id='.$postId);

    }




}
