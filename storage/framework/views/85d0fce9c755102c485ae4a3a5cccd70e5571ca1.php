<div class='author' id="<?php echo e($author->id); ?>"><span><?php echo e($author->name); ?></span><div>X</div></div>

<script type="text/javascript">
	
	$('.author div').click(function(){
		var id = $(this).parent().attr('id');
		$("#hidden"+id).remove();
		$(this).parent().remove();
	});

</script>
<?php /**PATH C:\wamp\www\athena\resources\views/authors/ajax/author.blade.php ENDPATH**/ ?>