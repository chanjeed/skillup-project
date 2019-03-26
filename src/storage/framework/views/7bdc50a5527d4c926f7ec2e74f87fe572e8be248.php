<?php /* /var/www/resources/views/profile.blade.php */ ?>

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
<link href="home.css" rel="stylesheet" type="text/css">
<?php if(isset($username)): ?>
 <?php include( 'header.php'); ?>
<?php endif; ?>
<?php if(empty($username)): ?>
 <?php include( 'header_out.php'); ?>
<?php endif; ?>
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

<br>
<hr>
<br>

<div class="row-container">
<?php if(isset($images)): ?>
  <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




    <div class="column-container5">
    <div class="center">
      <form action="<?php echo e(url('home/profile/image')); ?>" method="GET"  class="center">
         <input type="hidden" name="image-id" value="<?=$image->id?>"  >
        <input type="image" src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" position="relative">
    </form>


    </div>
    </div>
    <?php if($loop->iteration%5==0): ?>
    </div>
    <br>
    <div class="row-container">

    <?php endif; ?>






  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>
</body>
