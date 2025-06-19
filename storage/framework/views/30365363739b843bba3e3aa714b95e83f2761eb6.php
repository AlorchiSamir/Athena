<?php $__env->startSection('content'); ?>
<div class="book view">
    <header class='shadow-sm'>          

        <div class='container'>

              <ol class="breadcrumb-nav">
                <li class='breadcrumb-item'><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
                <li class='breadcrumb-item' ><a href="<?php echo e(url('category/'.$book->category->id.'/'.$book->category->slug)); ?>"><?php echo e($book->category->name); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e($book->title); ?></li>
              </ol>
            <div class='zone-cover'>
                <img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
            </div> 
           
                <div class="content">    
                    <h1><?php echo e($book->title); ?><span class='average'><?php echo (!is_null($book->getAverageScore())) ? $book->getAverageScore() : '-' ?></span></h1>                
                    <a href="<?php echo e(url('author/'.$book->authors[0]->id).'/'.$book->authors[0]->slug); ?>" class='author'><?php echo e($book->authors[0]->name); ?></a>
                    <ul class='tags'>
                    <?php $__currentLoopData = $book->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class='tag'><a href="<?php echo e(url('tag/'.$tag->id).'/'.$tag->slug); ?>">#<?php echo e($tag->hashtag()); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <p class='description'><?php echo e($book->description); ?></p>
                    <div class='interactions'>                        
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
                        <div class='zone-comment' id='comments'>
                            <div class='comment-symbol'><i class='fa fa-comment'></i></div>
                            <div class='total'><?php echo e(count($book->comments)); ?></div>
                        </div>
                        
                    </div>
               
            </div>
        </div>
    </header>
    <div class='advice-zone container'>
        <div class='note'>
            <?php if(Auth::check()): ?>
            <h4>Note</h4>
            <div class="stars" id='<?php echo e($book->id); ?>' data-url="<?php echo e(url('user/interaction')); ?>" >                            
                <?php if(Auth::check()): ?>
                    <?php $note = $book->note(Auth::user()->id);
                    for($i = 0; $i<$note; $i++){ ?>
                        <i id='<?php echo $i+1 ?>' class="fa fa-star gold star"></i>
                    <?php }
                    for($j = 0; $j<10-$note; $j++){ ?>
                        <i id='<?php echo $i+$j+1 ?>' class="fa fa-star star"></i>
                    <?php } ?>
                <?php else: ?>
                    <?php for($i = 0; $i<10; $i++){ ?>
                        <i id='<?php echo $i+1 ?>' class="fa fa-star star"></i>
                    <?php } ?>
                <?php endif; ?>                            
            </div>
            <hr>
            <?php endif; ?>
        </div> 
        
        <div class='comments'>
            <h4>Avis</h4>
            <?php echo $__env->make('books.comments.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(Auth::check() && !$book->alreadyCommented(Auth::user()->id)): ?>
                <?php echo $__env->make('books.comments.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
      
     <div class='buylink'>
        <?php if(count($book->buyLinks) > 0): ?>
            <div class='link' style='background-image: url(<?php echo e(url("graphics/amazon.png")); ?>)' ><a href="<?php echo e($book->buyLinks[0]->link); ?>">Commandez le livre sur Amazon</a></div>
        <?php endif; ?>
     </div>                      
               
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/books/view.blade.php ENDPATH**/ ?>