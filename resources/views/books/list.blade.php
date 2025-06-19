<div class='book-list'>
	@foreach($books as $book)
	<div class='book elem-list'>   
    	<a href="{{ url('book/'.$book->id.'/'.$book->slug) }}">
			<div>
				<div class='picture'>
	        		<img class='cover' src="{{ url('images/book/'.$book->getCover()) }}">
	        	</div>
	        	<div class='body'>
					<div><span class='title'>{{ $book->title }}</span></div>
					<hr>
					<div class='description'>{{ $book->description }}</div> 	
		            <div class='score'>
		            	@if(!is_null($book->getAverageScore()))	
		            		<span class='average'>{{ $book->getAverageScore() }}</span>		          
			            @endif
		            </div>
		            	<div class='zone-interactions'>
		            	@if(Auth::check())
			            	@if($book->isLiked(Auth::user()->id))
			            		<div class='liked'>
		                        	<i class='fa fa-heart'></i>
		                    	</div>
			            	@endif
			            	@if($book->isInterested(Auth::user()->id))
			            		<div class='interested'>
		                        	<i class='fa fa-bookmark'></i>
		                    	</div>
			            	@endif
		            	@endif
		            </div>
	        	</div>
			</div>
		</a>
	</div>
	@endforeach
</div>