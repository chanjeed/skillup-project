
<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<style>
h1 {
border-bottom: solid 3px dodgerblue;
margin-right: auto;
margin-left : auto;
text-align: center;
}

.username{
  width:100px;
  height:25px;

  margin-top:1.5%;
  margin-bottom: 1.5%;
  color: dodgerblue;
  border-bottom: solid 3px dodgerblue;
  padding: 5px;
}
.delete-button{

  width:80px;
  height:25px;
  background-color: #e26478;
  border: 1px solid red;
  margin-left : auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  padding: 5px;
}
.delete-button:hover {
    background-color: #c25667;
}

.delete-button-a:hover {
    color: #fff;
}

.like-button{

  width:50px;
  height:25px;
  background-color: #e264b7;
  border: 1px solid pink;
  margin-left : auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  padding: 5px;
}

.like-button:hover {
    background-color: #cc5aa5;
}

.like-button-a:hover {
    color: #fff;
}

.post-container {

  width:600px;
  margin-right: auto;
  margin-left : auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  background-color: #ddf2f4;
  color: #000;
  padding: 10px;
  border: 3px solid blue;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  width: 50%;
}

.right {
  display: block;
  margin-left: auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  width:100px;
}

.left {
  display: block;
  margin-right: auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  width:100px;
}

.column-container {
  float: left;
  width: 50.0%;
}

.column-container2 {
  float: right;
  width: 40.0%;
}

.column-container3 {
  float: right;
  width: 15.0%;
}

.column-container4 {
  float: left;
  width: 33.33%;
}


.row-container{

}

/* Clear floats after the columns */
.row-container:after {
  content: "";
  display: table;
  clear: both;
}


</style>
<title>Home</title>
<link href="home.css" rel="stylesheet" type="text/css">

<?php include( 'header.php'); ?>
</head>
<body>
<!-- 投稿表示エリア（編集するのはここ！） -->
<h1>Liked users</h1>

<div class="center">
<div class="row-container">
<img src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" class="center">
</div>

@isset($likedusers)
  @foreach ($likedusers as $likeduser)

<div class="row-container">
  <div class="column-container">
    <form action="{{ url('liked/profile') }}" method="GET"  class="center">
       <input type="hidden" name="image-username" value="<?=$likeduser->username?>"  >
      <input type="image" src="<?= $likeduser->image ?>"  name="image-username" value="<?=$likeduser->username?>"  width="200" height="200" position="relative">
  </form>

  </div>

  <div class="column-container">
  <form action="{{ url('liked/profile') }}" method="GET" enctype="multipart/form-data" class="center">
    {{ csrf_field() }}
    <button type="submit" name="image-username" value=<?=$likeduser->username?> class="center" >
    <div class="username" ><h2 class="center"><?= $likeduser->username ?><h2></div>
    </button>
  </form>
  </div>
</div>
  @endforeach
@endisset
</div>

</body>
