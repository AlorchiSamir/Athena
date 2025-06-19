<?php if(count($book->comments) == 0): ?>
		<p>Aucun commentaire</p>
		<hr>
<?php else: ?>
	<?php $__currentLoopData = $book->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class='comment'>
			<div class='content'><?php echo e($comment->content); ?></div>
			<div class='footer'>
				<?php if($book->isLiked($comment->user->id)): ?>
					<i class='fa fa-heart liked'></i>
				<?php endif; ?>
				<?php if($book->isInterested($comment->user->id)): ?>
					<i class='fa fa-bookmark interested'></i>
				<?php endif; ?>
				<span>Posté par <?php echo e($comment->user->name); ?> le <?php echo e($comment->created_at); ?></span>
			</div>
		</div>
		<hr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\athena\resources\views/books/comments/index.blade.php ENDPATH**/ ?>