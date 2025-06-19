@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row books">
        @foreach($authors as $author)
        <div class="col-md-4 book">
            <div class="card">
                <a class='link-header' href="{{ url('author/'.$author->id) }}"><div class="card-header">{{ $author->name }}</div></a>
                <div class="card-body">                    
                    <div class='cover'>
                        <a href="{{ url('author/'.$author->id) }}"><img src="{{ url('images/author/'.$author->getPicture()) }}"></a>                     
                    </div>                  
                    <div class='description'><div class='content'>{{ $author->bio }}</div></div>
                    <ul>
                        <li><span>Pays</span>{{ $author->country }}</li>
                    </ul>
                </div>
                <div class='card-footer'>
                                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection