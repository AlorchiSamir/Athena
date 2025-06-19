<div class='author-list'>
	<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class='author elem-list'>   
    	<a href="<?php echo e(url('author/'.$author->id.'/'.$author->slug)); ?>">
			<div>
				<div class='picture'>
	        		<img class='cover' src="<?php echo e(url('images/author/'.$author->getPicture())); ?>">
	        	</div>
	        	<div class='body'>
					<div><span class='title'><?php echo e($author->name); ?></span></div>
					<hr>
					<div class='description'><?php echo e($author->bio); ?></div> 		            
		           
	        	</div>
			</div>
		</a>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\wamp\www\athena\resources\views/authors/list.blade.php ENDPATH**/ ?>