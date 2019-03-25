<?php /* /var/www/resources/views/user.blade.php */ ?>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1>Your name is <?php echo e($user->name); ?>. Your mail address is <?php echo e($user->email); ?></h1>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
