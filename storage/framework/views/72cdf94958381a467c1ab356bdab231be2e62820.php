<?php $__env->startSection('content'); ?>
<div class="container books">
    <ol class="breadcrumb-nav">
        <li class='breadcrumb-item'><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
        <li class='breadcrumb-item'><a href="<?php echo e(url('/tags')); ?>">Tags</a></li>
        <li class="breadcrumb-item active"><?php echo e($tag->name); ?></li>
    </ol>
    <div class="row">
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2 book">                   
            <div class='cover'>
                <!--<div class='category' style='background-color:<?php echo e($book->category->color); ?>'><a href="<?php echo e(url('category/'.$book->category->id.'/'.$book->category->slug)); ?>"><?php echo e($book->category->name); ?></a></div>-->
                <a href="<?php echo e(url('book/'.$book->id).'/'.$book->slug); ?>"><img src="<?php echo e(url('images/book/'.$book->getCover())); ?>"></a>
                <!--<div class='note'><?php echo (!is_null($book->averageNote())) ? $book->averageNote() : '-' ?></div>-->
            </div>
                    
                   
                <!--<div class='interactions'>
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
                            <div class='comment-symbol' id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('book/'.$book->id.'#comments')); ?>"><i class='fa fa-comment'></i></div>
                            <div class='total'><?php echo e(count($book->comments)); ?></div>
                        </div>
                    </div>-->
                </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/tags/view.blade.php ENDPATH**/ ?>