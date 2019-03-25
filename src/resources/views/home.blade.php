
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

.column-container {
  float: left;
  width: 50.0%;
}

.column-container2 {
  float: right;
  width: 40.0%;
}

.column-container3l {
  float: left;
  width: 15.0%;
}

.column-container3r {
  float: right;
  width: 15.0%;
}

.column-container4r {
  float: right;
  width: 5.0%;
}


.row-container{

}

/* Clear floats after the columns */
.row-container:after {
  content: "";
  display: table;
  clear: both;
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
 <?php include( 'header.php'); ?>


</head>
<body>


<!-- 投稿表示エリア（編集するのはここ！） -->
<h1>Instragram もどき</h1>

<?php

if(!isset($_GET['page-button'])){ // $_GET['page_id'] はURLに渡された現在のページ数
    $start = 0; // 設定されてない場合は1ページ目にする

}else{
    $start = $_GET['page-button'];
}
?>

@isset($images)

<?php
$end = $start+10;
if(sizeof($images)<$end){
  $end=sizeof($images);
}
for ($i = $start; $i < $end; $i++) {

?>



    <div  class="post-container" >


    <div class="row-container">

    <div class="column-container">
      <form action="{{ url('home/profile') }}" method="GET" enctype="multipart/form-data">
        {{ csrf_field() }}
        <button type="submit" name="image-username" value=<?=$images[$i]->username?>>
        <div class="username"><p class="center"><?= $images[$i]->username ?><p></div>
        </button>
      </form>
    </div>
    <?php  if($images[$i]->username == $username) { ?>

    <div class="column-container">
        <form action="{{ url('home/delete') }}" method="POST" enctype="multipart/form-data" class="column-container2">
          {{ csrf_field() }}
          <button type="submit" name="delete-button" value=<?=$images[$i]->id?> >
          <div class="delete-button"><a  class="delete-button-a"><p class="center">Delete<p></a></div>
          </button>
        </form>
      </div>
    <?php  } ?>

  </div>

    <div class="row-container">
    <div class="center"><img src="data:image/png;base64,<?= $images[$i]->image ?>" width="300" height="300" position="relative"></div>
  </div>

    <div class="row-container">
    <div class="center"><p class="center"><?= $images[$i]->comment ?> <p></div>
    </div>

    <div class="row-container">
    <div class="column-container3l">
      <!-- left-->
</div>
    <div class="column-container4r">


        <form action="{{ url('home/liked') }}" method="GET" >
          {{ csrf_field() }}

          <button type="submit" name="liked-users-button" value=<?=$images[$i]->id?>>
            <h3 style="color: deeppink"><?=$images[$i]->like?></h3>
        </button>
        </form>
      </div>
    <div class="column-container3r">
        <form action="{{ url('home/like') }}" method="POST"  >
          {{ csrf_field() }}

            <input type="hidden" name="like-button" value=<?=$images[$i]->id?>   >
            <input type="hidden" name="start" value="<?= $start?>" >

            <?php
            $like = DB::select('select * from likes where post_id = ? and username = ?', [$images[$i]->id,$username]);
            if(empty($like)){
              echo "<input type='image' src='https://www.img.in.th/images/c3dde9ec3e188831992f765d61790b98.png' width='75' height='75' position='relative'>";
            }
            else{
              echo "<input type='image' src='https://www.img.in.th/images/e975130e39ea820e64c753a868ce4b00.png' width='75' height='75' position='relative'>";
            }
            ?>

        </form>
      </div>

    </div>
  </div>


    </div>


    <?php

  }

    ?>

@endisset

<div class="row-container">
  <div class="column-container">
    <form action="{{ url('home') }}" method="GET" enctype="multipart/form-data" class="column-container3r">
      {{ csrf_field() }}
      &emsp;&emsp;

<button type="submit" name="page-button" value="<?php echo $start-10;?>" <?php if($start==0){ ?> style="display: none" <?php } ?>>

  Back
</button>
</form>
    <form action="{{ url('home') }}" method="GET" enctype="multipart/form-data" class="column-container3r">
      {{ csrf_field() }}


    <button type="submit" name="page-button" value=0 <?php if($start<=10 ){ ?> style="display: none" <?php } ?>>

    First

    </button>

    </form>



</div>

<div class="column-container">

  <form action="{{ url('home') }}" method="GET" enctype="multipart/form-data" class="column-container3l" >
    {{ csrf_field() }}
    @isset($images)
    <button type="submit" name="page-button" value="<?php echo $start+10;?>" <?php if(sizeof($images)<=$end){ ?> style="display: none" <?php } ?>>

  Next

</button>
@endisset

</form>

<form action="{{ url('home') }}" method="GET" enctype="multipart/form-data" class="column-container3l" >
  {{ csrf_field() }}
  @isset($images)
  <button type="submit" name="page-button" value="<?php echo sizeof($images)-(sizeof($images)%10);?>" <?php if(sizeof($images)<=$end+10){ ?> style="display: none" <?php } ?>>

Last

</button>
@endisset
</form>



</div>
</div>


</body>
