<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use Illuminate\Support\Facades\DB;
use App\Model\Image;
use App\Model\Like;

class LikesController extends Controller
{
  public function like()
  {
      $postId = $_GET["like-button"];
      $token = $_GET["_token"];

      try {
          $github_user = Socialite::driver('github')->userFromToken($token);
        } catch (\Exception $e) {
        return redirect('login/github');
      }
      $username = $github_user->nickname;



      Like::insert(["post_id" => $postId,"username"=>$username]);

      //$post = Image::findOrFail($postId);
      Image::findOrFail($postId)->increment('like');

      return redirect('home');
  }

  public function delete(Request $request) {
    $postId = $request->input("delete-button");
    Image::findOrFail($postId)->delete();
    //$post->like_by()->findOrFail($likeId)->delete();

    return redirect('home');

  }

  public function profile() {
    $image_username = $_GET['image-username'];
    $images = Image::orderBy('id', 'desc')->where('username', $image_username)->get(); // 全データの取り出し
    $user = DB::select("select * from public.user where github_id = '$image_username'");

    return view('profile',["user" => $user[0],"images"=>$images]);

  }

  public function likedusers() {
    $postId = $_GET["liked-users-button"];
    $likedusers = Like::orderBy('id', 'desc')->where('post_id', $postId)->get(); // 全データの取り出し

    return view('liked',["likedusers" => $likedusers]);

  }
}
