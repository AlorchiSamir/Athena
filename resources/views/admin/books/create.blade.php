@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <div class="card">
                <div class="card-header">Ajouter livre</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/book/insert') }}" enctype="multipart/form-data" id='book-form'>
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titre</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Catégorie</label>
                            <div class="col-md-6">
                                <select class="form-control" id='category' name='category'>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Langue d'origine</label>
                            <div class="col-md-6">
                                <select class="form-control" id='language' name='language'>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}">
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="cover" class="col-md-4 col-form-label text-md-right">Couverture</label>
                            <div class="col-md-6">
                                <input type="file" id="cover" name="cover" accept="image/*">                                  
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">Auteur</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" placeholder='Chercher auteur...' autocomplete="off" data-url="{{ url('author/ajaxList') }}" required autofocus>  
                                <div class='search-result'></div>   
                                <div class='authors-choice'>                            
                                </div>                           
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="tag" class="col-md-4 col-form-label text-md-right">Tags</label>
                            <div class="col-md-6">
                                @foreach($tags as $tag)
                                    <input type="checkbox" id="tag{{ $tag->id }}" name="tag[{{ $tag->id }}]">
                                    <label for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                @endforeach                                   
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="release_date" class="col-md-4 col-form-label text-md-right">Date de sortie</label>
                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="release_date" autocomplete="off" value="{{ old('release_date') }}">                                
                            </div>
                        </div>                   

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pages" class="col-md-4 col-form-label text-md-right">Pages</label>
                            <div class="col-md-6">
                                <input id="pages" type="number" class="form-control" name="pages" value="{{ old('pages') }}">                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="translated" class="col-md-4 col-form-label text-md-right">Traduit ?</label>
                            <div class="col-md-6">
                                <input type="checkbox" id="translated" name="translated">
                            </div>
                        </div>                         

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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


@endsection