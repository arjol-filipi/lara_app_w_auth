<?php $__env->startSection('content'); ?>
    <div class="mt-5">
            <div class="well">
                    <h2>Edit post</h2>
            </div>
            <div class="container">
                    <?php echo Form::open(['action' => ['PostController@update',$post->id],'method' => 'POST','enctype'=>'multipart/form-data']); ?>

                        <div class="form-group ">
                            <?php echo e(Form::label('title','Title')); ?>

                            <?php echo e(Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])); ?>


                        </div>
                        <div class="form-group ">
                                <?php echo e(Form::label('body','Body')); ?>

                                <?php echo e(Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor'])); ?>

                                
                        </div>
                        <div class="form-group">
                                 
                                        <?php echo Form::file('cover_image'); ?>

                                         
                                </div>
                        <!-- hidden submit to simulate put request -->
                        <?php echo e(Form::hidden('_method','PUT')); ?>

                        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary'])); ?>

                    <?php echo Form::close(); ?>

            </div>
            <a href="/post" class="btn btn-default">Go back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>