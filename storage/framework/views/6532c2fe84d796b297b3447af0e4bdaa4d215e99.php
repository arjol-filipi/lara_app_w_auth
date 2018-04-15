<?php $__env->startSection('content'); ?>
    <div class="mt-5">
            <div class="well">
                        <div class="col-md-4 col-sm-4">
                                        <img src="/storage/cover_images/<?php echo e($post->cover_image); ?>" alt="<?php echo e($post->name); ?> image" style="width:100%">
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                                <h3><?php echo e($post->title); ?></h3>
                                                <small>Writen on <?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></small>
                                                <!--  <p><?php echo e($post->body); ?></p> shows the html without parsing -->
                                                <div class="container border">
                                                        <?php echo $post->body; ?>

                                    </div>
                    
                    </div>
            </div>
            <a href="/post" class="btn btn-default">Go back</a>
    </div>
    <hr>
    <?php if(!Auth::guest()): ?>
        <?php if(Auth::user()->id == $post->user_id): ?>
    <div class="btn-group container ">
    <a href="/post/<?php echo e($post->id); ?>/edit" class="btn btn-primary">Edit</a>
    <?php echo Form::open([ 'action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>"pull-right ml-8" ]); ?>

        <?php echo Form::hidden('_method', 'DELETE'); ?>

        <?php echo Form::submit('Delete', ['class'=>'btn pull-right btn-danger']); ?>

<?php echo Form::close(); ?>

    </div>
    <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>