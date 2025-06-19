<div class='author' id="{{ $author->id }}"><span>{{ $author->name }}</span><div>X</div></div>

<script type="text/javascript">
	
	$('.author div').click(function(){
		var id = $(this).parent().attr('id');
		$("#hidden"+id).remove();
		$(this).parent().remove();
	});

</script>
