<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use Illuminate\Support\Facades\DB;
use App\Model\Image;
use App\Model\Like;

class NextController extends Controller
{


  public function next() {
    $offset = $_POST["page-button"];
    return redirect('home'.$offset);

  }

  public function back(Request $request) {
    $offset = $request->input("page-button");
    return redirect('home'.$offset);
  }
}
