@extends('layouts.app')

@section('content')
<!--<div class='banner' style="background-image: url({{ url('graphics/banner.jpg') }})"></div>-->
<div class='homepage'>
<div class='banner shadow-sm'>
	<a href="{{ url('book/'.$book->id).'/'.$book->slug }}">
		<div class='random-book'>		
			<div class="container">
				<h3>Un livre au hasard</h3>
				<hr>				
				<div>
					<img class='cover' src="{{ url('images/book/'.$book->getCover()) }}">
				</div>           
	            <div class='content'>
	            	<h4>{{ $book->title }} <span class='release-date'>({{ date('Y', strtotime($book->release_date)) }})</span></h4>
	            	<span class='author'>{{ $book->authors[0]->name }}</span>
	            	<p class='description'>{{ $book->description }}</p>
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
		@foreach($last_books as $book)
			<li class='book col-md-2'>
				<a href="{{ url('book/'.$book->id).'/'.$book->slug }}">
					<img class='cover' src="{{ url('images/book/'.$book->getCover()) }}">
				</a>
			</li>
		@endforeach
		</ul>
	</div>
</div>
</div>
@endsection