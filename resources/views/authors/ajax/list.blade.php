<ul class='authors-result' data-url="{{ url('author/ajaxAuthor') }}" >

@foreach($authors as $author)

    <li class='author' id='{{ $author->id }}'>
        <img src="{{ url('images/author/'.$author->getPicture()) }}">
        <span class='name'>{{ $author->name }}</span>
        <span>{{ $author->description }}</span>
        <div style='clear: both;' ></div>
    </li>

@endforeach
</ul>

<script type="text/javascript">

    

    $('.author').click(function(){
    	id = $(this).attr('id');
    	name = $(this).children('.name').html();
        url = $(this).parent().data('url');
    	$('<input>').attr({
		    type: 'hidden',
		    name: 'author['+id+']', 
            id: 'hidden'+id, 
			value: id 
		}).appendTo('#product');
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
                $('.products').append(response);
            }
        });
		
    });




</script>