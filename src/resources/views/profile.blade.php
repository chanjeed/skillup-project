
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
  width:300px;
  height:250px;
  margin-right: auto;
  margin-top: 1.5%;
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

.column-container5 {
  float: left;
  width: 16.67%;
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
<title>Profile</title>
<link href="home.css" rel="stylesheet" type="text/css">
<?php include( 'header.php'); ?>
</head>
<body>
  <font size=5>

<!-- 投稿表示エリア（編集するのはここ！） -->


<div class="row-container">
  <div class="column-container4">
<img src="<?= $user->image ?>" width="300" height="300" position="relative">
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


<hr>
<div class="row-container">
@isset($images)
  @foreach ($images as $image)




    <div class="column-container5">
    <div class="center"><img src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" position="relative"></div>
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
