<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use Illuminate\Support\Facades\DB;
use App\Model\Image;
use App\Model\Like;

class LikesController extends Controller
{
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
    $number_liked = Image::where('username',$image_username)->sum("like");
    return view('profile',["user" => $user[0],"images"=>$images,"number_liked"=>$number_liked]);

  }

  public function likedusers() {
    $postId = $_GET["liked-users-button"];
    $likedusers = Like::orderBy('id', 'desc')->join('public.user', 'likes.username', '=', 'public.user.github_id')->where('likes.post_id', $postId)->select('likes.*', 'public.user.image')->get(); // 全データの取り出し

    $image = Image::where('id',$postId)->get();

    return view('liked',["likedusers" => $likedusers,"image" => $image[0]]);

  }
}
