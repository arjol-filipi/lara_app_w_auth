<?php $__env->startSection('content'); ?>
<div class="mt-1">
        <h1>Posts</h1>
        <?php if(count($posts)>0): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="well p-1">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img src="/storage/cover_images/<?php echo e($post->cover_image); ?>" alt="<?php echo e($post->name); ?> image" style="width:100%">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="/post/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h3>
                            <small>Writen on <?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></small>
                            <p><?php echo $post->body; ?></p>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($posts->links()); ?>

        <?php else: ?>
            <p>No posts to show</p>
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>