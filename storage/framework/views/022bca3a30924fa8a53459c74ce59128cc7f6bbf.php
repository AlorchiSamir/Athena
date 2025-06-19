<ul class='authors-result'>

<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li class='author' id='<?php echo e($author->id); ?>'>
        <img src="<?php echo e(url('images/author/'.$author->getPicture())); ?>">
        <span class='name'><?php echo e($author->name); ?></span>
        <span><?php echo e($author->description); ?></span>
        <div style='clear: both;' ></div>
    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<script type="text/javascript">
    
    $('.author').click(function(){
    	id = $(this).attr('id');
    	name = $(this).children('.name').html();
    	$('<input>').attr({
		    type: 'hidden',
		    name: 'author['+id+']', 
			value: id 
		}).appendTo('form');
		$('.search-result').html('');

		$('.authors-choice').append("<div class='author' id="+id+">"+name+"</div>");
		$('#author').val('');
    });




</script><?php /**PATH C:\wamp\www\athena\resources\views/authors/ajaxList.blade.php ENDPATH**/ ?>