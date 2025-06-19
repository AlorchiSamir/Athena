<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row books">
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 book">
            <div class="card">
                <a class='link-header' href="<?php echo e(url('book/'.$book->id)); ?>"><div class="card-header"><?php echo e($book->title); ?><div class='note'><?php echo (!is_null($book->averageNote())) ? $book->averageNote() : '-' ?></div></div></a>
                <div class="card-body">                    
                    <a href="<?php echo e(url('book/'.$book->id)); ?>"><img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>"></a>
                    <div class='category' style='background-color:<?php echo e($book->category->color); ?>'><a href="<?php echo e(url('category/'.$book->category->id)); ?>"><?php echo e($book->category->name); ?></a></div>
                    <div class='description'><?php echo e($book->description); ?></div>
                    <ul>
                        <li><span>Date de sortie</span><?php echo e($book->release_date); ?></li>
                        <li><span>Nombre de pages</span><?php echo e($book->pages); ?></li>
                        <li><span>Pays</span><?php echo e($book->country); ?></li>
                    </ul>
                </div>
                <div class='card-footer'>
                    <div class='zone-like'>
                        <?php if(Auth::check()): ?>
                            <?php if($book->isLiked(Auth::user()->id)): ?>
                                <div class='like liked' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>"><i class='fa fa-heart'></i></div>
                                <div class='like noliked' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>" style='display: none;'><i class='fa fa-heart'></i></div>
                            <?php else: ?>
                                <div class='like liked' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>" style='display: none;'><i class='fa fa-heart'></i></div>
                                <div class='like noliked' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>"><i class='fa fa-heart'></i></div>
                            <?php endif; ?>                                        
                        <?php else: ?>
                            <div class='like'><i class='fa fa-heart'></i></div>
                        <?php endif; ?>
                        <div class='total'><?php echo e($book->likes()); ?></div>
                    </div>
                    <div class='zone-interest'>
                        <?php if(Auth::check()): ?>
                            <?php if($book->isInterested(Auth::user()->id)): ?>
                                <div class='interest interested' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>"><i class='fa fa-bookmark'></i></div>
                                <div class='interest nointerested' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>" style='display: none;'><i class='fa fa-bookmark'></i></div>                            
                            <?php else: ?>
                                <div class='interest interested' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>" style='display: none;'><i class='fa fa-bookmark'></i></div>
                                <div class='interest nointerested' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>"><i class='fa fa-bookmark'></i></div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class='interest'><i class='fa fa-bookmark'></i></div>
                        <?php endif; ?>
                        <div class='total'><?php echo e($book->interests()); ?></div>
                    </div>
                    <div class='zone-comment'>
                        <div class='comment-symbol'><i class='fa fa-comment'></i></div>
                        <div class='total'><?php echo e(count($book->comments)); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\athena\resources\views/books/index.blade.php ENDPATH**/ ?>