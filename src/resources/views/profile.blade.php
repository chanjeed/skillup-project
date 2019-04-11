
<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<style>

.column-container4 {
  float: left;
  width: 33.3%;
}

.column-container5 {
  float: left;
  width: 16.67%;
}




</style>
<title>Profile</title>
<link rel="stylesheet" href="{{ asset('/css/home.css') }}">
@isset($username)
 <?php include( 'header.php'); ?>
@endisset
@empty($username)
 <?php include( 'header_out.php'); ?>
@endempty
</head>
<body>
  <font size=5>

<!-- 投稿表示エリア（編集するのはここ！） -->


<div class="row-container">
  <div class="column-container4">
<img src="<?= $user->image ?>" width="200" height="200" >
</div>
  <div class="column-container4">
<div class="username">

  <h2 class="center" vertical-align="bottom"><br><br><?= $user->github_id ?></h2>

</div>
</div>
<div class="column-container4">
  <h2>Number of liked!</h2><br><br>
  <h2 style="color: deeppink" class="center"><?= $number_liked ?></h2>
</div>
</div>
<br>
<hr>
<br>
<br>


<div class="row-container">
@isset($images)
  @foreach ($images as $image)

    <div class="column-container5">
    <div class="center">
      <form action="{{ url('home/profile/image') }}" method="GET"  class="center">
         <input type="hidden" name="image-id" value="<?=$image->id?>"  >
        <input type="image" src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" position="relative">
    </form>


    </div>
    </div>
    @if($loop->iteration%5==0)
    </div>
    <br>
    <div class="row-container">

    @endif

  @endforeach
@endisset
</div>
</body>
