<?php /* /var/www/resources/views/liked.blade.php */ ?>

<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<style>

.username{
  width:100px;
  height:25px;

  margin-top:1.5%;
  margin-bottom: 1.5%;
  color: dodgerblue;
  border-bottom: solid 3px dodgerblue;
  padding: 5px;
}

.column-container3 {
  float: right;
  width: 15.0%;
}

.column-container4 {
  float: left;
  width: 33.33%;
}




</style>
<title>Liked users</title>
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
<h1>Liked users</h1>

<div class="center">
<div class="row-container">
<img src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" class="center" position="absolute">
</div>

<?php if(isset($likedusers)): ?>
  <?php $__currentLoopData = $likedusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likeduser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row-container">
  <div class="column-container">
    <form action="<?php echo e(url('liked/profile')); ?>" method="GET"  class="center">
       <input type="hidden" name="image-username" value="<?=$likeduser->username?>"  >
      <input type="image" src="<?= $likeduser->image ?>"   width="200" height="200" position="relative">
  </form>

  </div>

  <div class="column-container">
  <form action="<?php echo e(url('liked/profile')); ?>" method="GET" enctype="multipart/form-data" class="center">
    <?php echo e(csrf_field()); ?>

    <button class="username_button" type="submit" name="image-username" value=<?=$likeduser->username?> class="center" >
  <h2 class="center"><?= $likeduser->username ?><h2>
    </button>
  </form>
  </div>
</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>

</body>
