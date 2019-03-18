<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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

        $image = base64_encode(file_get_contents($request->file->getRealPath()));
        return view('home')->with('image', $image);
      } else {
          return redirect()
              ->back()
              ->withInput()
              ->withErrors();
      }
  }
}
