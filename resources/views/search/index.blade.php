@extends('layouts.app')

@section('content')
<div class="container">
   <div class='search-header'>
      <p>Résultat de recherches pour : <span>{{ $query }}</span></p>
      <div>
         @if(count($books) > 0)
            <div class='btn-search button-books'>Livres ({{ count($books) }})</div>
         @endif
         @if(count($authors) > 0)
            <div class='btn-search button-authors'>Auteurs ({{ count($authors) }})</div>
         @endif
      </div>
   </div>
   <div class='search-books'>
   	@include('books.list')
   </div>
   <div class='search-authors' <?php echo (count($books)>0) ? 'style="display:none"' : '' ?>>
      @include('authors.list')
   </div>
</div>


<script>
   $(function(){
       $('.button-books').click(function(){
         $('.search-books').show();
         $('.search-authors').hide();
       });
       $('.button-authors').click(function(){
         $('.search-authors').show();
         $('.search-books').hide();
       });
   });
</script>
@endsection