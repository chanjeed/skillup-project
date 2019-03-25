<?php /* /var/www/resources/views/bbs/index.blade.php */ ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>掲示板</h1>

<!-- エラーメッセージエリア -->
<?php if($errors->any()): ?>
    <h2>エラーメッセージ</h2>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>

<!-- 投稿表示エリア（編集するのはここ！） -->
<?php if(isset($bbs)): ?>
<?php $__currentLoopData = $bbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2><?php echo e($d->name); ?>さんの投稿</h2>
    <?php echo e($d->comment); ?>

    <br><hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<!-- フォームエリア -->
<h2>フォーム</h2>
<form action="/bbs" method="POST">
    名前:<br>
    <input name="name">
    <br>
    コメント:<br>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>
    <?php echo e(csrf_field()); ?>

    <button class="btn btn-success"> 送信 </button>
</form>

</body>
</html>
