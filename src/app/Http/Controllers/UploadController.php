<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Model\Image;

class UploadController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload');
    }
    /**
   * ファイルアップロード処理
   */
  public function upload(Request $request)
  {
      $this->validate($request, [
          'file' => [
              // 必須
              'required',
              // アップロードされたファイルであること
              'file',
              // 画像ファイルであること
              'image',
              // MIMEタイプを指定
              'mimes:jpeg,png,gif',
              //size60MB以下
              'max:6000',
          ]
      ]);

      $request->validate([
          'comment' => 'max:200',
      ]);

      if ($request->file('file')->isValid([]) ) {

        // 投稿内容の受け取って変数に入れる
        $image = base64_encode(file_get_contents($request->file->getRealPath()));


        $comment = $request->input('comment');

        Image::insert(["image" => $image,"comment"=>$comment]); // データベーステーブルbbsに投稿内容を入れる

        $images = Image::all(); // 全データの取り出し
        return view('home', ["images" => $images]); // homeにデータを渡

      } else {
          return redirect()
              ->back()
              ->withInput()
              ->withErrors();
      }
  }
}
