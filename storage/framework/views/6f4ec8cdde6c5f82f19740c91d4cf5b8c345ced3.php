<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                </div>
                
            </div>
            <div class="container border">
                    <a class="btn btn-primary " href="/post/create">Make new entry</a>
            </div>
            
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Show</th>
                        <th>Delete</th>
                    </tr>
                    
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($post->title); ?></th>
                            <th> <a href="/post/<?php echo e($post->id); ?>/edit" class="btn btn-success">Edit</a></th>
                            <th><a href="/post/<?php echo e($post->id); ?>" class="btn btn-primary">Show</a></th>
                            <th> <?php echo Form::open([ 'action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>"pull-right ml-8" ]); ?>

        <?php echo Form::hidden('_method', 'DELETE'); ?>

        <?php echo Form::submit('Delete', ['class'=>'btn pull-right btn-danger']); ?>

<?php echo Form::close(); ?></th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </table>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>