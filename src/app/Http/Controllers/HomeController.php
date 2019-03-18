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
        $images = Image::all(); // 全データの取り出し
        return view('home', ["images" => $images]); // homeにデータを渡す
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
              'mimes:jpeg,png',
          ]
      ]);

      if ($request->file('file')->isValid([])) {

        // 投稿内容の受け取って変数に入れる
        $image = base64_encode(file_get_contents($request->file->getRealPath()));


        //$comment = $request->input('comment');

        Image::insert(["image" => $image]); // データベーステーブルbbsに投稿内容を入れる

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
