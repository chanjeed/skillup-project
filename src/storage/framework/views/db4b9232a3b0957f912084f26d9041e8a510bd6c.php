<?php /* /var/www/resources/views/home.blade.php */ ?>

<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<style>


</style>
<title>Home</title>
<link rel="stylesheet" href="<?php echo e(asset('/css/home.css')); ?>">
<?php if(isset($username)): ?>
 <?php include( 'header.php'); ?>
<?php endif; ?>
<?php if(empty($username)): ?>
 <?php include( 'header_out.php'); ?>
<?php endif; ?>




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

<?php if(isset($images)): ?>

<?php
$end=sizeof($images);
for ($i = 0; $i < $end; $i++) {

?>



    <div  class="post-container" >


    <div class="row-container">

    <div class="column-container">
      <form action="<?php echo e(url('home/profile')); ?>" method="GET" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <button type="submit" name="image-username" value=<?=$images[$i]->username?> class="username_button">
        <h2 class="center"><?= $images[$i]->username ?><h2>
        </button>
      </form>
    </div>
    <?php if(isset($username)): ?>
    <?php  if($images[$i]->username == $username) { ?>

    <div class="column-container">
        <form action="<?php echo e(url('home/delete')); ?>" method="POST" enctype="multipart/form-data" class="column-container2">
          <?php echo e(csrf_field()); ?>

          <button class="delete_button" type="submit" name="delete-button" value=<?=$images[$i]->id?> >
          <a  class="delete_button-a"><p class="center">Delete<p></a>
          </button>
        </form>
      </div>
    <?php  } ?>
    <?php endif; ?>
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


        <form action="<?php echo e(url('home/liked')); ?>" method="GET" >
          <?php echo e(csrf_field()); ?>


          <button class="likedusers_button" type="submit" name="liked-users-button" value=<?=$images[$i]->id?>>
            <h3 style="color: deeppink"><?=$images[$i]->like?></h3>
        </button>
        </form>
      </div>
    <div class="column-container3r">
        <form action="<?php echo e(url('home/like')); ?>" method="POST"  >
          <?php echo e(csrf_field()); ?>


            <input type="hidden" name="like-button" value=<?=$images[$i]->id?>   >
            <input type="hidden" name="start" value="<?= $start?>" >

            <?php if(isset($username)): ?>
            <?php

            $like = DB::select('select * from likes where post_id = ? and username = ?', [$images[$i]->id,$username]);
            if(empty($like)){
              echo "<input type='image' src='https://www.img.in.th/images/c3dde9ec3e188831992f765d61790b98.png' width='75' height='75' position='relative'>";
            }
            else{
              echo "<input type='image' src='https://www.img.in.th/images/e975130e39ea820e64c753a868ce4b00.png' width='75' height='75' position='relative'>";
            }
            ?>
            <?php endif; ?>
            <?php if(empty($username)): ?>
            <?php
            echo "<a href='/login/github'><img  src='https://www.img.in.th/images/c3dde9ec3e188831992f765d61790b98.png' width='75' height='75' position='relative'></a>";
            ?>
            <?php endif; ?>
        </form>
      </div>

    </div>
  </div>


    </div>


    <?php

  }

    ?>

<?php endif; ?>

<div class="row-container">
  <div class="column-container">
    <form action="<?php echo e(url('home')); ?>" method="GET" enctype="multipart/form-data" class="column-container3r">
      <?php echo e(csrf_field()); ?>

      &emsp;

<button class="page_button" type="submit" name="page-button" value="<?php echo $start-10;?>" <?php if($start==0){ ?> style="display: none" <?php } ?>>

  Back
</button>
</form>
    <form action="<?php echo e(url('home')); ?>" method="GET" enctype="multipart/form-data" class="column-container3r">
      <?php echo e(csrf_field()); ?>



    <button class="page_button" type="submit" name="page-button" value=0 <?php if($start<=10 ){ ?> style="display: none" <?php } ?>>

    First

    </button>

    </form>



</div>

<div class="column-container">

  <form action="<?php echo e(url('home')); ?>" method="GET" enctype="multipart/form-data" class="column-container3l" >
    <?php echo e(csrf_field()); ?>

    <?php if(isset($images)): ?>
    <button class="page_button" type="submit" name="page-button" value="<?php echo $start+10;?>" <?php if($images_num<=$end){ ?> style="display: none" <?php } ?>>

  Next

</button>
<?php endif; ?>

</form>

<form action="<?php echo e(url('home')); ?>" method="GET" enctype="multipart/form-data" class="column-container3l" >
  <?php echo e(csrf_field()); ?>

  <?php if(isset($images)): ?>
  <button class="page_button" type="submit" name="page-button" value="<?php echo $images_num-($images_num%10);?>" <?php if($images_num<=$end+10){ ?> style="display: none" <?php } ?>>

Last

</button>
<?php endif; ?>
</form>



</div>
</div>


</body>
