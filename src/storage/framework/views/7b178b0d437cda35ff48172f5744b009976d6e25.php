<?php /* /var/www/resources/views/upload.blade.php */ ?>
<header>
  <style>
  .custom-file-input::-webkit-file-upload-button {
 visibility: hidden;
}
.custom-file-input::before {
 content: 'Choose image';
 display: inline-block;
 background: -webkit-linear-gradient(top, #ffdf2b, #ddc433);
 border: 1px solid #999;
 border-radius: 3px;
 padding: 5px 8px;
 outline: none;
 white-space: nowrap;
 -webkit-user-select: none;
 cursor: pointer;
 text-shadow: 1px 1px #fff;
 font-weight: 700;
 font-size: 10pt;
}
.custom-file-input:hover::before {
 border-color: black;
}
.custom-file-input:active::before {
 background: -webkit-linear-gradient(top, #f9f9f9, #ffbb02);
}

.button3 {
  background-color: white;
  color: black;
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}
  </style>

  <title>Upload</title>
  <link rel="stylesheet" href="<?php echo e(asset('/css/home.css')); ?>">
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
<div class="row-container">
<!-- フォーム -->
<form action="<?php echo e(url('upload')); ?>" method="POST" enctype="multipart/form-data" class="center">
  <div class="center">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label class="custom-file-input" for="Upload" >

    </label>

    <input id="Upload" type="file" class="form-control" name="file" value="Choose image" style="visibility: hidden">

  </div>
    <br>
    <br>
    <div class="center">

    Caption:<br>
    <textarea name="comment" rows="4" cols="70"></textarea>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <?php echo e(csrf_field()); ?>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="button3"  > Upload </button>
  </div>
</form>

</div>
</body>
