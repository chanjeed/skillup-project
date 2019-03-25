<?php
$postId=$_GET["id"];
$username = $_GET["username"]
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
