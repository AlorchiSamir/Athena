@extends('layouts.app')

@section('content')
<div class="container books">
    <ol class="breadcrumb-nav">
        <li class='breadcrumb-item'><a href="{{ url('/') }}">Accueil</a></li>
        <li class='breadcrumb-item'><a href="{{ url('/tags') }}">Tags</a></li>
        <li class="breadcrumb-item active">{{ $tag->name }}</li>
    </ol>
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-2 book">                   
            <div class='cover'>
                <!--<div class='category' style='background-color:{{ $book->category->color }}'><a href="{{ url('category/'.$book->category->id.'/'.$book->category->slug) }}">{{ $book->category->name }}</a></div>-->
                <a href="{{ url('book/'.$book->id).'/'.$book->slug }}"><img src="{{ url('images/book/'.$book->getCover()) }}"></a>
                <!--<div class='note'><?php echo (!is_null($book->averageNote())) ? $book->averageNote() : '-' ?></div>-->
            </div>
                    
                   
                <!--<div class='interactions'>
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
                        <div class='zone-comment'>
                            <div class='comment-symbol' id='{{ $book->id }}' data-url="{{ url('book/'.$book->id.'#comments') }}"><i class='fa fa-comment'></i></div>
                            <div class='total'>{{ count($book->comments) }}</div>
                        </div>
                    </div>-->
                </div>

        @endforeach
    </div>
</div>
@endsection