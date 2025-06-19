@extends('layouts.app')

@section('content')
<div class="author view">
    <header class='shadow-sm'>        

        <div class='container'>

              <ol class="breadcrumb-nav">
                <li class='breadcrumb-item'><a href="{{ url('/') }}">Accueil</a></li>
                <li class='breadcrumb-item' ><a href="{{ url('authors') }}">Auteurs</a></li>
                <li class="breadcrumb-item active">{{ $author->name }}</li>
              </ol>
            <div class='zone-picture'>
                <img class='picture' src="{{ url('images/author/'.$author->getPicture()) }}">
            </div> 
           
                <div class="content">    
                    <h1>{{ $author->name }}</h1>

                    <p class='description'>{{ $author->bio }}</p>
                    
            </div>
        </div>
    </header>
   <div class="container">
    <div class='list-books'>
        <h3>Livres</h3>
        <hr>
        <ul class='row'>
        @foreach($books as $book)
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