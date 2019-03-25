<?php /* /var/www/resources/views/upload.blade.php */ ?>
<header>
<?php include( 'header.php'); ?>
</header>
<body>
<!-- エラーメッセージ。なければ表示しない -->
<?php if($errors->any()): ?>
<ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php endif; ?>

<!-- フォーム -->
<form action="<?php echo e(url('upload')); ?>" method="POST" enctype="multipart/form-data" class="center">
    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <br>
    コメント:<br>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>
    <hr>
    <?php echo e(csrf_field()); ?>

    <button class="btn btn-success"> Upload </button>
</form>
</body>
