<?php /* /var/www/resources/views/image.blade.php */ ?>

<!DOCTYPE html>

<html lang="ja">
<head>
<meta charset="utf-8">
<style>

</style>
<title>Image</title>
<link rel="stylesheet" href="<?php echo e(asset('/css/home.css')); ?>">
<?php if(isset($username)): ?>
 <?php include( 'header.php'); ?>
<?php endif; ?>
<?php if(empty($username)): ?>
 <?php include( 'header_out.php'); ?>
<?php endif; ?>


</head>
<body>





    <div  class="post-container" >


    <div class="row-container">

    <div class="column-container">
      <form action="<?php echo e(url('home/profile')); ?>" method="GET" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <button class="username_button" type="submit" name="image-username" value=<?=$image->username?>>
        <h2 class="center"><?= $image->username ?></h2>
        </button>
      </form>
    </div>
    <?php if(isset($username)): ?>
    <?php  if($image->username == $username) { ?>

    <div class="column-container">
        <form action="<?php echo e(url('home/delete')); ?>" method="POST" enctype="multipart/form-data" class="column-container2">
          <?php echo e(csrf_field()); ?>

          <button class="delete_button" type="submit" name="delete-button" value=<?=$image->id?> >
          <a  class="delete_button-a"><p class="center">Delete<p></a>
          </button>
        </form>
      </div>
    <?php  } ?>
    <?php endif; ?>
  </div>

    <div class="row-container">
    <div class="center"><img src="data:image/png;base64,<?= $image->image ?>" width="300" height="300" position="relative"></div>
  </div>

    <div class="row-container">
    <div class="center"><p class="center"><?= $image->comment ?> <p></div>
    </div>

    <div class="row-container">
    <div class="column-container3l">
      <!-- left-->
</div>
    <div class="column-container4r">


        <form action="<?php echo e(url('home/liked')); ?>" method="GET" >
          <?php echo e(csrf_field()); ?>


          <button class="likedusers_button" type="submit" name="liked-users-button" value=<?=$image->id?>>
            <h3 style="color: deeppink"><?=$image->like?></h3>
        </button>
        </form>
      </div>
    <div class="column-container3r">
        <form action="<?php echo e(url('image/like')); ?>" method="POST"  >
          <?php echo e(csrf_field()); ?>


            <input type="hidden" name="like-button" value=<?=$image->id?>   >

            <?php if(isset($username)): ?>
            <?php
            $like = DB::select('select * from likes where post_id = ? and username = ?', [$image->id,$username]);
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


    <form action="<?php echo e(url('liked/profile')); ?>" method="GET"  class="center">
      <?php echo e(csrf_field()); ?>


   <div class="center" width="600px">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="submit" name="image-username" value=<?=$image->username?> class="backtoprofile_button" >

    Back to profile

    </button>
    </div>
    </form>


</body>
