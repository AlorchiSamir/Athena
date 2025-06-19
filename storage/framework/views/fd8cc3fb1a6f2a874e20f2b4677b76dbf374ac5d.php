<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row books">
        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 book">
            <div class="card">
                <a class='link-header' href="<?php echo e(url('author/'.$author->id)); ?>"><div class="card-header"><?php echo e($author->name); ?></div></a>
                <div class="card-body">                    
                    <div class='cover'>
                        <a href="<?php echo e(url('author/'.$author->id)); ?>"><img src="<?php echo e(url('images/author/'.$author->getPicture())); ?>"></a>                     
                    </div>                  
                    <div class='description'><div class='content'><?php echo e($author->bio); ?></div></div>
                    <ul>
                        <li><span>Pays</span><?php echo e($author->country); ?></li>
                    </ul>
                </div>
                <div class='card-footer'>
                                   
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/authors/index.blade.php ENDPATH**/ ?>