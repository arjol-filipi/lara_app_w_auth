<?php $__env->startSection('content'); ?>
    <div class="mt-5">
            <div class="well">
                    <h2>Create a post</h2>
            </div>
            <div class="container">
                    <?php echo Form::open(['action' => 'PostController@store','method' => 'POST','enctype'=>'multipart/form-data']); ?>

                        <div class="form-group ">
                            <?php echo e(Form::label('title','Title')); ?>

                            <?php echo e(Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])); ?>


                        </div>
                        <div class="form-group ">
                                <?php echo e(Form::label('body','Body')); ?>

                                <?php echo e(Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor'])); ?>

                                
                        </div>
                        <div class="form-group">
                                 
                                <?php echo Form::file('cover_image'); ?>

                                 
                        </div>
                        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary'])); ?>

                    <?php echo Form::close(); ?>

            </div>
            <a href="/post" class="btn btn-default">Go back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>