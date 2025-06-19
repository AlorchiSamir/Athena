<?php if(count($book->comments) == 0): ?>
		<p>Aucun commentaire</p>
<?php else: ?>
	<?php $__currentLoopData = $book->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class='comment'>
			<div class='user'>
				<img class='avatar' src="<?php echo e(url('images/avatar/'.$comment->user->getAvatar())); ?>" />
				<span><?php echo e($comment->user->name); ?></span>
				<p class='date'>Posté le <?php echo e($comment->created_at); ?></p>
			</div>
			<div class='content'><?php echo e($comment->content); ?></div>
			<div class='footer'>
				<?php if($book->isLiked($comment->user->id)): ?>
					<i class='fa fa-heart liked'></i>
				<?php endif; ?>
				<?php if($book->isInterested($comment->user->id)): ?>
					<i class='fa fa-bookmark interested'></i>
				<?php endif; ?>
				
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\wamp\www\athena\resources\views/books/comments/index.blade.php ENDPATH**/ ?>