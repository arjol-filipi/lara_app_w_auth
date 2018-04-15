<?php $__env->startSection('content'); ?>    
<div class="jumbotron text-center">
    <div class="container">
      <h1 class="display-3">Welcome to Laravel</h1>
      <p>This is a simple laravel app for show</p>
      <p><a class="btn btn-primary btn-lg mr-3" href="/login" role="button">Login</a><a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>