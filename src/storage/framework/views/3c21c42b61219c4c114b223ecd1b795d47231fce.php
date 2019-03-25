<?php /* /var/www/resources/views/github.blade.php */ ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>github</title>
    </head>
    <body>
        <form action="/user" method="post">
            <?php echo e(csrf_field()); ?>


            <div>お名前 : <input type="text" name="name" value="<?php echo e($user->name); ?>"></div>

            <div>コメント : <input type="text" name="comment" value="<?php echo e($user->comment); ?>"></div>


            <input type="submit" value="Confirm">
        </form>
        <div>ようこそ<?php echo e($nickname); ?>さん</div>
        <div>あなたのトークンは<?php echo e($token); ?>です</div>
        <div>リポジトリ一覧</div>
        <ul>
        <?php $__currentLoopData = $repos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($repo); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <form action="/github/issue" method="post">
            <?php echo e(csrf_field()); ?>


            <div>repo : <input type="text" name="repo"></div>

            <div>title : <input type="text" name="title"></div>

            <div>body : <input type="text" name="body"></div>

            <input type="submit" value="Confirm">
        </form>
    </body>
</html>
