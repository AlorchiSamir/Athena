@if(count($book->comments) == 0)
		<p>Aucun commentaire</p>
@else
	@foreach($book->comments as $comment)
		<div class='comment'>
			<div class='user'>
				<img class='avatar' src="{{  url('images/avatar/'.$comment->user->getAvatar()) }}" />
				<span>{{ $comment->user->name }}</span>
				<p class='date'>Posté le {{ $comment->created_at }}</p>
			</div>
			<div class='content'>{{ $comment->content }}</div>
			<div class='footer'>
				@if($book->isLiked($comment->user->id))
					<i class='fa fa-heart liked'></i>
				@endif
				@if($book->isInterested($comment->user->id))
					<i class='fa fa-bookmark interested'></i>
				@endif
				
			</div>
		</div>
	@endforeach
@endif