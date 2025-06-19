<ul class='authors-result' data-url="<?php echo e(url('author/ajaxAuthor')); ?>" >

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
        url = $(this).parent().data('url'); 
        console.log(url);
    	$('<input>').attr({
		    type: 'hidden',
		    name: 'author['+id+']', 
            id: 'hidden'+id, 
			value: id 
		}).appendTo('#book-form');
		$('.search-result').html('');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: 'POST',
            url: url,
            data: {
                'id': id
            },
            success: function(response){
                $('.authors-choice').append(response);
                $('#author').val('');        
            }
        });
		
    });




</script><?php /**PATH C:\wamp\www\athena\resources\views/authors/ajax/list.blade.php ENDPATH**/ ?>