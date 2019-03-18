
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
.post-container {
  width:400px;
  margin-right: auto;
  margin-left : auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  background-color: #ddf2f4;
  color: #000;
  padding: 10px;
  border: 1px solid blue;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top:1.5%;
  margin-bottom: 1.5%;
  width: 50%;
}
</style>
<title>Home</title>
<link href="home.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- 投稿表示エリア（編集するのはここ！） -->
<h1>Instragram もどき</h1>
<table>
@isset($images)
  @foreach ($images as $image)
  <tr>
  <div class="post-container" >
    <img src="data:image/png;base64,<?= $image->image ?>" width="200" height="200" class="center"><br><br>

    <p class="center"><?= $image->comment ?> <p><br><br>

  </div>
</tr>
  @endforeach
@endisset
</table>

</body>
