@extends('layouts.app')

@section('content')
<div class="book view">
    <header class='shadow-sm'>          

        <div class='container'>

              <ol class="breadcrumb-nav">
                <li class='breadcrumb-item'><a href="{{ url('/') }}">Accueil</a></li>
                <li class='breadcrumb-item' ><a href="{{ url('category/'.$book->category->id.'/'.$book->category->slug) }}">{{ $book->category->name }}</a></li>
                <li class="breadcrumb-item active">{{ $book->title }}</li>
              </ol>
            <div class='zone-cover'>
                <img class='cover' src="{{ url('images/book/'.$book->getCover()) }}">
            </div> 
           
                <div class="content">    
                    <h1>{{ $book->title }}<span class='average'><?php echo (!is_null($book->getAverageScore())) ? $book->getAverageScore() : '-' ?></span></h1>                
                    <a href="{{ url('author/'.$book->authors[0]->id).'/'.$book->authors[0]->slug }}" class='author'>{{ $book->authors[0]->name }}</a>
                    <ul class='tags'>
                    @foreach($book->tags as $tag)
                        <li class='tag'><a href="{{ url('tag/'.$tag->id).'/'.$tag->slug }}">#{{ $tag->hashtag() }}</a></li>
                    @endforeach
                    </ul>
                    <p class='description'>{{ $book->description }}</p>
                    <div class='interactions'>                        
                        <div class='zone-like'>
                            @if(Auth::check())
                                @if($book->isLiked(Auth::user()->id))
                                    <div class='like liked' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}"><i class='fa fa-heart'></i></div>
                                    <div class='like noliked' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}" style='display: none;'><i class='fa fa-heart'></i></div>
                                @else
                                    <div class='like liked' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}" style='display: none;'><i class='fa fa-heart'></i></div>
                                    <div class='like noliked' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}"><i class='fa fa-heart'></i></div>
                                @endif                                        
                            @else
                                <div class='like'><i class='fa fa-heart'></i></div>
                            @endif
                            <div class='total'>{{ $book->likes() }}</div>
                        </div>
                        <div class='zone-interest'>
                            @if(Auth::check())
                                @if($book->isInterested(Auth::user()->id))
                                    <div class='interest interested' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}"><i class='fa fa-bookmark'></i></div>
                                    <div class='interest nointerested' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}" style='display: none;'><i class='fa fa-bookmark'></i></div>                            
                                @else
                                    <div class='interest interested' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}" style='display: none;'><i class='fa fa-bookmark'></i></div>
                                    <div class='interest nointerested' id='{{ $book->id }}' data-url="{{ url('user/interaction') }}"><i class='fa fa-bookmark'></i></div>
                                @endif
                            @else
                                <div class='interest'><i class='fa fa-bookmark'></i></div>
                            @endif
                            <div class='total'>{{ $book->interests() }}</div>
                        </div>
                        <div class='zone-comment' id='comments'>
                            <div class='comment-symbol'><i class='fa fa-comment'></i></div>
                            <div class='total'>{{ count($book->comments) }}</div>
                        </div>
                        
                    </div>
               
            </div>
        </div>
    </header>
    <div class='advice-zone container'>
        <div class='note'>
            @if(Auth::check())
            <h4>Note</h4>
            <div class="stars" id='{{ $book->id }}' data-url="{{ url('user/interaction') }}" >                            
                @if(Auth::check())
                    <?php $note = $book->note(Auth::user()->id);
                    for($i = 0; $i<$note; $i++){ ?>
                        <i id='<?php echo $i+1 ?>' class="fa fa-star gold star"></i>
                    <?php }
                    for($j = 0; $j<10-$note; $j++){ ?>
                        <i id='<?php echo $i+$j+1 ?>' class="fa fa-star star"></i>
                    <?php } ?>
                @else
                    <?php for($i = 0; $i<10; $i++){ ?>
                        <i id='<?php echo $i+1 ?>' class="fa fa-star star"></i>
                    <?php } ?>
                @endif                            
            </div>
            <hr>
            @endif
        </div> 
        
        <div class='comments'>
            <h4>Avis</h4>
            @include('books.comments.index')
            @if(Auth::check() && !$book->alreadyCommented(Auth::user()->id))
                @include('books.comments.create')
            @endif
        </div>
    </div>
      
     <div class='buylink'>
        @if(count($book->buyLinks) > 0)
            <div class='link' style='background-image: url({{ url("graphics/amazon.png") }})' ><a href="{{ $book->buyLinks[0]->link }}">Commandez le livre sur Amazon</a></div>
        @endif
     </div>                      
               
    </div>
@endsection