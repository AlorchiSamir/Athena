@extends('admin.layouts.app')

@section('content')

    <div class="row book">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ $book->title }}</div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <img class='cover' src="{{ url('images/book/'.$book->getCover()) }}">
                    </div>
                    <div class="col-md-8">
                        <div class='category' style='background-color:{{ $book->category->color }}'>{{ $book->category->name }}</div>
                        <div class='description'>{{ $book->description }}</div>
                        <ul>
                            <li><span>Date de sortie</span>{{ $book->release_date }}</li>
                            <li><span>Nombre de pages</span>{{ $book->pages }}</li>
                            <li><span>Pays</span>{{ $book->country }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card options">
                <div class="card-header">Options</div>
                <div class="card-body">
                    <div class='status row'>
                        <div  class="col-md-4  offset-md-2">
                        @if($book->status == $book::STATUS_ACCEPTED)
                            <a class='btn btn-danger' href="{{ url('admin/book/status/closed/'.$book->id) }}">Fermer</a>
                        @elseif($book->status == $book::STATUS_CLOSED)
                            <a class='btn btn-success' href="{{ url('admin/book/status/accepted/'.$book->id) }}">Ouvrir</a>     
                        @endif
                        </div> 
                        <div  class="col-md-4">
                            <a class='btn btn-primary' href="{{ url('admin/book/update/'.$book->id) }}">Modifier</a>
                        </div>  
                    </div>   
                    <hr>                 
                    <div class='buylink'>
                        @if(count($book->buyLinks) > 0)
                            <div class='col-md-4  offset-md-2 link' style='background-image: url({{ url("graphics/amazon.png") }})' ><a href="{{ $book->buyLinks[0]->link }}">{{ $book->buyLinks[0]->link }}</a></div>
                        @else
                            <form method="POST" action="{{ url('admin/book/buylink') }}">
                                @csrf
                                <input type="hidden" name="book_id" value='{{ $book->id }}'>
                                <div class="form-group row">
                                    <label for="link" class="col-md-3 col-form-label text-md-right">Lien Amazon</label>
                                    <div class="col-md-6">
                                        <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required>                                
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn">
                                            Valider
                                        </button>
                                    </div>
                                </div>    
                            </form>
                        @endif 
                    </div>
                    <hr>
                    <div class='cover'>
                        <form method="POST" action="{{ url('admin/book/cover') }}">
                            @csrf
                            <input type="hidden" name="book_id" value='{{ $book->id }}'>
                            <div class="form-group row">
                                <label for="cover" class="col-md-3 col-form-label text-md-right">Couverture</label>
                                <div class="col-md-6">
                                    <input type="file" id="cover" name="cover" accept="image/*">                                  
                                </div>                            
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Valider
                                    </button>
                                </div> 
                            </div>                          
                        </form>
                    </div>               
                </div>
            </div>
        </div>
    </div>

@endsection