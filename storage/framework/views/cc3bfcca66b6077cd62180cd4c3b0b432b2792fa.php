<div class='book-list'>
	<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class='book elem-list'>   
    	<a href="<?php echo e(url('book/'.$book->id.'/'.$book->slug)); ?>">
			<div>
				<div class='picture'>
	        		<img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
	        	</div>
	        	<div class='body'>
					<div><span class='title'><?php echo e($book->title); ?></span></div>
					<hr>
					<div class='description'><?php echo e($book->description); ?></div> 	
		            <div class='score'>
		            	<?php if(!is_null($book->getAverageScore())): ?>	
		            		<span class='average'><?php echo e($book->getAverageScore()); ?></span>		          
			            <?php endif; ?>
		            </div>
		            	<div class='zone-interactions'>
		            	<?php if(Auth::check()): ?>
			            	<?php if($book->isLiked(Auth::user()->id)): ?>
			            		<div class='liked'>
		                        	<i class='fa fa-heart'></i>
		                    	</div>
			            	<?php endif; ?>
			            	<?php if($book->isInterested(Auth::user()->id)): ?>
			            		<div class='interested'>
		                        	<i class='fa fa-bookmark'></i>
		                    	</div>
			            	<?php endif; ?>
		            	<?php endif; ?>
		            </div>
	        	</div>
			</div>
		</a>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\wamp\www\athena\resources\views/books/list.blade.php ENDPATH**/ ?>