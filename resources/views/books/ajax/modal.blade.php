<div class="col-md-4 book">
            <div class="card">
                <a class='link-header' href="{{ url('book/'.$book->id) }}"><div class="card-header">{{ $book->title }}</div></a>
                <div class="card-body">                    
                    <div class='cover'>
                        <a href="{{ url('book/'.$book->id) }}"><img src="{{ url('images/book/'.$book->getCover()) }}"></a>
                        <div class='note'><?php echo (!is_null($book->averageNote())) ? $book->averageNote() : '-' ?></div>
                    </div>
                    <div class='category' style='background-color:{{ $book->category->color }}'><a href="{{ url('category/'.$book->category->id) }}">{{ $book->category->name }}</a></div>
                    <div class='description'><div class='content'>{{ $book->description }}</div></div>
                    <ul>
                        <li><span>Date de sortie</span>{{ $book->release_date }}</li>
                        <li><span>Nombre de pages</span>{{ $book->pages }}</li>
                        <li><span>Pays</span>{{ $book->country }}</li>
                    </ul>
                </div>
                <div class='card-footer'>
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
                </div>
            </div>
        </div>