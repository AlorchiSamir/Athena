<div class='author-list'>
	@foreach($authors as $author)
	<div class='author elem-list'>   
    	<a href="{{ url('author/'.$author->id.'/'.$author->slug) }}">
			<div>
				<div class='picture'>
	        		<img class='cover' src="{{ url('images/author/'.$author->getPicture()) }}">
	        	</div>
	        	<div class='body'>
					<div><span class='title'>{{ $author->name }}</span></div>
					<hr>
					<div class='description'>{{ $author->bio }}</div> 		            
		           
	        	</div>
			</div>
		</a>
	</div>
	@endforeach
</div>