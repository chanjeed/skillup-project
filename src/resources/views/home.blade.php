
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
  width:150px;
  height:25px;
  margin-right: auto;
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

</style>
<title>Home</title>
<link href="home.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- 投稿表示エリア（編集するのはここ！） -->
<h1>Instragram もどき</h1>

@isset($images)
  @foreach ($images as $image)



    <div  class="post-container" >
    <table>

    <tr width="600">
    <td width="300">
        <div class="username"><p class="center"><?= $image->username ?><p></div>
    </td>
    <td width="300">
        <div class="delete-button"><p class="center">Delete<p></div>
    </td>
    </tr>


    <tr width="600">
    <div class="center"><img src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" position="relative"></div>
    </tr>
    <tr width="600">
    <div class="center"><p class="center"><?= $image->comment ?> <p></div>
    </tr>
    <tr width="600">
    <td width="300">
    <p class="left" style="color:orange;">Liked! users<p>
    </td>
    <td width="300">
    <div class="like-button"><p class="center">Like!</p></div>
    </td>
    </tr>

    </table>
    </div>




  @endforeach
@endisset

</body>
