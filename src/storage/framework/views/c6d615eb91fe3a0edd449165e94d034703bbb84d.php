<?php /* /var/www/resources/views/welcome.blade.php */ ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">

        <title>ログイン画面</title>
    </head>
    <body>
        <a href="/login/github">githubアカウントでログイン</a>
    </body>
</html>
