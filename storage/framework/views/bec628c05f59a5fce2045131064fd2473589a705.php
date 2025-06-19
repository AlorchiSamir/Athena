<?php $__env->startSection('content'); ?>
    <div class="row book">
        <div class="col-md-6 offset-md-2">
            <div class="card">
                <div class="card-header"><?php echo e($book->title); ?></div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class='category' style='background-color:<?php echo e($book->category->color); ?>'><a href="<?php echo e(url('category/'.$book->category->id)); ?>"><?php echo e($book->category->name); ?></a></div>
                        <div class='description'><?php echo e($book->description); ?></div>
                        <ul>
                            <li><span>Date de sortie</span><?php echo e($book->release_date); ?></li>
                            <li><span>Nombre de pages</span><?php echo e($book->pages); ?></li>
                            <li><span>Pays</span><?php echo e($book->country); ?></li>
                        </ul>
                    </div>
                </div>
                <div class='card-footer'>
                    <div class='comments'>
                        <?php echo $__env->make('books.comments.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(!$book->alreadyCommented(Auth::user()->id)): ?>
                            <?php echo $__env->make('books.comments.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card options">
                <div class="card-header">Options</div>
                <div class="card-body">
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
                        <div class='zone-comment'>
                            <div class='comment-symbol'><i class='fa fa-comment'></i></div>
                            <div class='total'><?php echo e(count($book->comments)); ?></div>
                        </div>
                    </div> 
                    <hr>
                    <div class='note'>
                        <div class="stars">
                            <?php
                                $note = $book->note(Auth::user()->id);
                                for($i = 0; $i<$note; $i++){ ?>
                                    <i id='<?php echo $i+1 ?>' class="fa fa-star gold"></i>
                                <?php }
                                for($j = 0; $j<10-$note; $j++){ ?>
                                    <i id='<?php echo $i+$j+1 ?>' class="fa fa-star"></i>
                                <?php }
                            ?>                           
                            <!--<i id='1' class="fa fa-star"></i>
                            <i id='2' class="fa fa-star"></i>
                            <i id='3' class="fa fa-star"></i>
                            <i id='4' class="fa fa-star"></i>
                            <i id='5' class="fa fa-star"></i>
                            <i id='6' class="fa fa-star"></i>
                            <i id='7' class="fa fa-star"></i>
                            <i id='8' class="fa fa-star"></i>
                            <i id='9' class="fa fa-star"></i>
                            <i id='10' class="fa fa-star"></i>-->
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\athena\resources\views/books/view.blade.php ENDPATH**/ ?>