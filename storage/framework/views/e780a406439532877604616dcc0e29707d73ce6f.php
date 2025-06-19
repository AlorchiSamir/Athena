<?php $__env->startSection('content'); ?>
<!--<div class='banner' style="background-image: url(<?php echo e(url('graphics/banner.jpg')); ?>)"></div>-->
<div class='homepage'>
<div class='banner shadow-sm'>
	<a href="<?php echo e(url('book/'.$book->id).'/'.$book->slug); ?>">
		<div class='random-book'>		
			<div class="container">
				<h3>Un livre au hasard</h3>
				<hr>				
				<div>
					<img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
				</div>           
	            <div class='content'>
	            	<h4><?php echo e($book->title); ?> <span class='release-date'>(<?php echo e(date('Y', strtotime($book->release_date))); ?>)</span></h4>
	            	<span class='author'><?php echo e($book->authors[0]->name); ?></span>
	            	<p class='description'><?php echo e($book->description); ?></p>
	            </div>            
	        </div>        
		</div> 
	</a>
</div>  
<div class="container">
	<div class='list-books'>
		<h3>Derniers livres</h3>
		<hr>
		<ul class='row'>
		<?php $__currentLoopData = $last_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class='book col-md-2'>
				<a href="<?php echo e(url('book/'.$book->id).'/'.$book->slug); ?>">
					<img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
				</a>
			</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/home/index.blade.php ENDPATH**/ ?>